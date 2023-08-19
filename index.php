<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización Dolar Blue</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        $api_url = "https://dolarapi.com/v1/dolares/blue";
        $data = json_decode(file_get_contents($api_url), true);

        $compra = $data["compra"];
        $venta = $data["venta"];
        $fechaActualizacion = $data["fechaActualizacion"];
        ?>
        <div class="alert alert-primary" role="alert">
            Cotización actual Dolar Blue:
            <br>
            Compra: $<?php echo $compra ?> Venta: $<?php echo $venta ?>
            <br>
            Última actualización: <?php echo $fechaActualizacion ?>
            <br>
            Nota: Hora de Buenos Aires, Argentina.
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

    <script>
        const compraRate = <?php echo $compra ?>;
        const ventaRate = <?php echo $venta ?>;

        document.getElementById("convert").addEventListener("click", function() {
            const amount = parseFloat(document.getElementById("amount").value);
            const conversionDirection = document.getElementById("conversionDirection").value;

            let result = "";
            if (conversionDirection === "usdToArs") {
                result = `ARS: ${(amount * compraRate).toFixed(2)}`;
            } else if (conversionDirection === "arsToUsd") {
                result = `USD: ${(amount / ventaRate).toFixed(2)}`;
            }

            document.getElementById("result").innerText = result;
        });
    </script>
</body>
</html>
