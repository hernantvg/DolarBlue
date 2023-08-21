from flask import Flask, render_template, request
import requests
import datetime
import pytz

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
        currency_symbol = 'dólares'
    elif direction == 'ars_to_usd':
        result = amount / data['venta']
        currency_symbol = 'pesos'

    formatted_amount = '{:,.2f}'.format(amount)
    formatted_result = '{:,.2f}'.format(result)


    fecha_actualizacion = datetime.datetime.strptime(data['fechaActualizacion'], "%Y-%m-%dT%H:%M:%S.%fZ")
    
    # Convertir la fecha y hora a la zona horaria de Argentina
    argentina_tz = pytz.timezone('America/Argentina/Buenos_Aires')
    fecha_actualizacion = fecha_actualizacion.replace(tzinfo=pytz.utc).astimezone(argentina_tz)
    fecha_actualizacion_str = fecha_actualizacion.strftime("%d-%m-%Y %I:%M %p %Z")

    return render_template('index.html', formatted_amount=formatted_amount, formatted_result=formatted_result, currency_symbol=currency_symbol, compra=data['compra'], venta=data['venta'], fecha_actualizacion=fecha_actualizacion_str, direction=direction)


if __name__ == '__main__':
    app.run(debug=True)
