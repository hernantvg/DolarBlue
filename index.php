<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Consulta la cotización actual del Dólar Blue en Argentina y realiza conversiones de moneda.">
    <meta name="robots" content="index, follow">
    <title>Cotización Dólar Blue Hoy - Precio Dólar Blue Hoy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <?php
                $api_url = "https://dolarapi.com/v1/dolares/blue";
                $data = json_decode(file_get_contents($api_url), true);

                $compra = $data["compra"];
                $venta = $data["venta"];
                $fechaActualizacion = $data["fechaActualizacion"];

                $fecha = new DateTime($fechaActualizacion, new DateTimeZone('UTC'));
                $fecha->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
                $fechaFormateada = $fecha->format('Y-m-d H:i:s');
                ?>
                <div class="alert alert-primary" role="alert">
                    Cotización actual Dólar Blue:
                    <br>
                    Compra: $<?php echo $compra ?> Venta: $<?php echo $venta ?>
                    <br>
                    Última actualización: <?php echo $fechaFormateada ?>
                    <br>
                    Nota: Hora de Buenos Aires, Argentina (GMT-3).
                </div>

                <div class="mt-4">
                    <h4>Calculadora de Conversión</h4>
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
                        <button type="button" class="btn btn-primary" id="convert">Convertir</button>
                    </form>
                    <div class="mt-3">
                        <p id="result"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const compraRate = <?php echo $compra ?>;
        const ventaRate = <?php echo $venta ?>;

        document.getElementById("convert").addEventListener("click", function() {
            const amount = parseFloat(document.getElementById("amount").value);
            const conversionDirection = document.getElementById("conversionDirection").value;

            let result = "";
            if (conversionDirection === "usdToArs") {
                const arsAmount = Math.floor(amount * compraRate);
                result = `ARS: ${arsAmount.toLocaleString()}`;
            } else if (conversionDirection === "arsToUsd") {
                const usdAmount = Math.floor(amount / ventaRate);
                result = `USD: ${usdAmount.toLocaleString()}`;
            }

            document.getElementById("result").innerText = result;
        });
    </script>
</body>
</html>