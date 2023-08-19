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
            <div class="card-header bg-success text-white">
                <h5 class="m-0">Cotización Dólar Blue Hoy</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <img src="ruta_del_logo.png" alt="Logo" height="50">
                    <div class="alert alert-primary" role="alert">
                        Cotización actual Dólar Blue:<br>
                        Compra: $<?php echo $compra ?> Venta: $<?php echo $venta ?><br>
                        Última actualización: <?php echo $fechaFormateada ?><br>
                        Nota: Hora de Buenos Aires, Argentina (GMT-3).
                    </div>
                </div>
                
                <div class="card bg-light mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Calculadora de Conversión</h4>
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
                    </div>
                </div>

                <div class="card bg-success mt-3">
                    <div class="card-body text-white">
                        <p id="result"></p>
                        <p>Con <span id="inputAmount">$4.00 Dólares</span> obtienes <span id="outputAmount">$2,880 Pesos</span>.</p>
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
                document.getElementById("inputAmount").textContent = `$${amount.toFixed(2)} Dólares`;
                document.getElementById("outputAmount").textContent = `$${arsAmount.toLocaleString()} Pesos`;
            } else if (conversionDirection === "arsToUsd") {
                const usdAmount = Math.floor(amount / ventaRate);
                result = `USD: ${usdAmount.toLocaleString()}`;
                document.getElementById("inputAmount").textContent = `$${amount.toLocaleString()} Pesos`;
                document.getElementById("outputAmount").textContent = `$${usdAmount.toFixed(2)} Dólares`;
            }

            document.getElementById("result").innerText = result;
        });
    </script>
</body>
</html>
