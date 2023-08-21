<!DOCTYPE html>
<html lang="en">
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
                        Emplea la herramienta de conversión que sigue para estimar el valor del dólar paralelo en moneda local argentina y al revés. El tipo de cambio del dólar paralelo se renueva cada día.
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

                <div class="mt-4 alert alert-success">
                    <div class="card-body">
                        <p id="result"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Obtener la cotización actual del dólar blue usando AJAX
            $.getJSON("https://dolarapi.com/v1/dolares/blue", function(data) {
                const compra = data.compra;
                const venta = data.venta;
                const fechaActualizacion = data.fechaActualizacion;

                $("#compra").text(compra);
                $("#venta").text(venta);

                const fecha = new Date(fechaActualizacion);
                const fechaFormateada = fecha.toLocaleString("es-AR", { timeZone: "America/Argentina/Buenos_Aires" });
                $("#fechaActualizacion").text(fechaFormateada);
            });

            // Manejar la conversión en tiempo real usando AJAX al hacer clic en el botón "Convertir"
            $("#convert").click(function() {
                const amount = parseFloat($("#amount").val());
                const conversionDirection = $("#conversionDirection").val();

                $.getJSON("https://dolarapi.com/v1/dolares/blue", function(data) {
                    const compra = data.compra;
                    const venta = data.venta;

                    let result = "";
                    if (conversionDirection === "usdToArs") {
                        const arsAmount = Math.floor(amount * compra);
                        const usdAmount = amount.toFixed(2);
                        result = `Con $${usdAmount} Dólares de Estados Unidos obtienes $${arsAmount.toLocaleString()} Pesos de Argentina.`;
                    } else if (conversionDirection === "arsToUsd") {
                        const usdAmount = Math.floor(amount / venta);
                        const arsAmount = amount.toLocaleString();
                        result = `Con $${arsAmount} Pesos de Argentina obtienes $${usdAmount.toFixed(2)} Dólares de Estados Unidos.`;
                    }

                    $("#result").text(result);
                });
            });
        });
    </script>
</body>
</html>