<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Consulta la cotización actual del Dólar Blue en Argentina y realiza conversiones de moneda.">
    <meta name="robots" content="index, follow">
    <title>Calculadora de dólar blue a peso argentino - Cotización Dólar Blue Hoy - Precio Dólar Blue Hoy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .center-box {
        text-align: center;
    }

    .med-text {
        font-size: 24px;
        font-weight: bold;
    }

    .big-text {
        font-size: 32px;
        font-weight: bold;
    }
    </style>    
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header alert alert-success">
                <h5 class="m-0">Cotización Dólar Blue Hoy - Calculadora de dólar blue a peso argentino</h5>
            </div>
            <div class="card-body">            
                <div class="center-box">
                    <div class="alert alert-primary" role="alert">
                        <span class="med-text">Cotización actual Dólar Blue</span><br>
                        <span class="big-text">
                        Compra: $<span id="compra"></span>
                        Venta: $<span id="venta"></span>
                        </span><br>
                        Última actualización: <span id="fechaActualizacion"></span><br>
                        Nota: Hora de Buenos Aires, Argentina (GMT-3).
                    </div>
                </div>
                
                <div class="card bg-light mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Calculadora de Conversión Dólar Blue a Peso Argentino</h4>
                        <p>
                        Emplea la herramienta de conversión que sigue para estimar el valor del dólar Blue o paralelo en moneda local argentina y al revés. El tipo de cambio del dólar paralelo se renueva cada día.
                        </p>
                        <form>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="amount" placeholder="Ingrese la cantidad">
                            </div>
                            <div class="mb-3">
                                <label for="conversionDirection" class="form-label">Dirección de Conversión</label>
                                <select class="form-select" id="conversionDirection">
                                    <option value="usdToArs">USD a ARS</option>
                                    <option value="arsToUsd">ARS a USD</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" id="convert">Convertir!</button>
                        </form>
                    </div>
                </div>
                
                <!-- Tabla de conversiones populares -->
                <div class="card bg-light mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Conversiones Populares</h4>
                        <table class="table">

                            <tbody>
                                <tr>
                                    <td><span id="conversion1"></span></td>
                                </tr>
                                <tr>
                                    <td><span id="conversion10"></span></td>
                                </tr>
                                <tr>
                                    <td><span id="conversion20"></span></td>
                                </tr>
                                <tr>
                                    <td><span id="conversion50"></span></td>
                                </tr>
                                <tr>
                                    <td><span id="conversion100"></span></td>
                                </tr>
                                <tr>
                                    <td><span id="conversion200"></span></td>
                                </tr>
                                <tr>
                                    <td><span id="conversion500"></span></td>
                                </tr>
                                <tr>
                                    <td><span id="conversion1000"></span></td>
                                </tr>
                                <tr>
                                    <td><span id="conversion5000"></span></td>
                                </tr>
                                <tr>
                                    <td><span id="conversion10000"></span></td>
                                </tr>
                                <!-- Agrega más filas para otras conversiones populares aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body">
                    <p id="result"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        fetch("https://dolarapi.com/v1/dolares/blue")
            .then(response => response.json())
            .then(data => {
                const compra = data.compra;
                const venta = data.venta;

                document.getElementById("compra").textContent = compra;
                document.getElementById("venta").textContent = venta;

                // Actualizar las conversiones populares
                const conversionTable = [
                    { amount: 1, label: "1 dólar blue" },
                    { amount: 10, label: "10 dólares blue" },
                    { amount: 20, label: "20 dólares blue" },
                    { amount: 50, label: "50 dólares blue" },
                    { amount: 100, label: "100 dólares blue" },
                    { amount: 200, label: "200 dólares blue" },
                    { amount: 500, label: "500 dólares blue" },
                    { amount: 1000, label: "1000 dólares blue" },
                    { amount: 5000, label: "5000 dólares blue" },
                    { amount: 10000, label: "10000 dólares blue" },
                    // Agrega más conversiones populares aquí
                ];

                conversionTable.forEach(conversion => {
                    const arsAmount = Math.floor(conversion.amount * compra);
                    document.getElementById(`conversion${conversion.amount}`).textContent = `${conversion.label} son $${arsAmount.toLocaleString()} pesos argentinos`;
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
            });

        document.getElementById("convert").addEventListener("click", function() {
            const amount = parseFloat(document.getElementById("amount").value);
            const conversionDirection = document.getElementById("conversionDirection").value;

            let result = "";
            if (conversionDirection === "usdToArs") {
                const arsAmount = Math.floor(amount * parseFloat(document.getElementById("compra").textContent));
                const usdAmount = amount.toFixed(2);
                result = `Con $${usdAmount} Dólares de Estados Unidos obtienes $${arsAmount.toLocaleString()} Pesos de Argentina.`;
            } else if (conversionDirection === "arsToUsd") {
                const usdAmount = Math.floor(amount / parseFloat(document.getElementById("venta").textContent));
                const arsAmount = amount.toLocaleString();
                result = `Con $${arsAmount} Pesos de Argentina obtienes $${usdAmount.toFixed(2)} Dólares de Estados Unidos.`;
            }

            if (result !== "") {
                result = `<div class="mt-4 alert alert-success">${result}</div>`;
            }

            document.getElementById("result").innerHTML = result;
        });
    </script>
</body>
</html>