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
                    <label for="usdAmount" class="form-label">Cantidad en USD</label>
                    <input type="number" class="form-control" id="usdAmount" placeholder="Ingrese la cantidad en USD">
                </div>
                <button type="button" class="btn btn-primary" id="convertToArs">Convertir a ARS</button>
                <button type="button" class="btn btn-primary" id="convertToUsd">Convertir a USD</button>
            </form>
            <div class="mt-3">
                <p id="result"></p>
            </div>
        </div>
    </div>

    <script>
        const compraRate = <?php echo $compra ?>;
        const ventaRate = <?php echo $venta ?>;

        document.getElementById("convertToArs").addEventListener("click", function() {
            const usdAmount = parseFloat(document.getElementById("usdAmount").value);
            const arsAmount = usdAmount * compraRate;
            document.getElementById("result").innerText = `ARS: ${arsAmount.toFixed(2)}`;
        });

        document.getElementById("convertToUsd").addEventListener("click", function() {
            const arsAmount = parseFloat(document.getElementById("usdAmount").value);
            const usdAmount = arsAmount / ventaRate;
            document.getElementById("result").innerText = `USD: ${usdAmount.toFixed(2)}`;
        });
    </script>
</body>
</html>
