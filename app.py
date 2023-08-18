from flask import Flask, render_template, request, jsonify
import requests
import datetime

app = Flask(__name__)

# Ruta principal
@app.route('/')
def index():
    response = requests.get("https://dolarapi.com/v1/dolares/blue")
    data = response.json()

    return render_template('index.html', compra=data['compra'], venta=data['venta'], fecha_actualizacion=data['fechaActualizacion'])


# Ruta para realizar la conversión
@app.route('/convert', methods=['POST'])
def convert():
    amount = float(request.form['amount'])
    direction = request.form['direction']

    response = requests.get("https://dolarapi.com/v1/dolares/blue")
    data = response.json()

    if direction == 'usd_to_ars':
        result = amount * data['venta']
    else:
        result = amount / data['venta']

    fecha_actualizacion = datetime.datetime.strptime(data['fechaActualizacion'], "%Y-%m-%dT%H:%M:%S.%fZ")
    fecha_actualizacion_str = fecha_actualizacion.strftime("%d-%m-%Y %I:%M %p")

    return render_template('index.html', result=result, compra=data['compra'], venta=data['venta'], fecha_actualizacion=fecha_actualizacion_str)



if __name__ == '__main__':
    app.run(debug=True)
