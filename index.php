<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Conversión</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a310e3974d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h2 class="card-title">Calculadora Dolar Blue a Peso Argentino</h2>

                        <?php
                        // Ruta principal y lógica de conversión
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['amount'], $_POST['direction'])) {
                            $amount = floatval($_POST['amount']);
                            $direction = $_POST['direction'];

                            $response = file_get_contents("https://dolarapi.com/v1/dolares/blue");
                            $data = json_decode($response, true);

                            if ($direction === 'usd_to_ars') {
                                $result = $amount * $data['venta'];
                                $currency_symbol = 'dólares';
                            } elseif ($direction === 'ars_to_usd') {
                                $result = $amount / $data['venta'];
                                $currency_symbol = 'pesos';
                            }

                            $formatted_amount = number_format($amount, 2, '.', ',');
                            $formatted_result = number_format($result, 2, '.', '');

                            $fecha_actualizacion = new DateTime($data['fechaActualizacion'], new DateTimeZone('UTC'));
                            $argentina_tz = new DateTimeZone('America/Argentina/Buenos_Aires');
                            $fecha_actualizacion->setTimezone($argentina_tz);
                            $fecha_actualizacion_str = $fecha_actualizacion->format('d-m-Y h:i A T');

                            echo '
                            <div class="alert alert-warning">
                                <p class="mb-1"><strong>Cotización actual Dolar Blue:</strong></p>
                                <h3><span class="text-success">Compra: <strong>' . $data['compra'] . '</strong></span> <span class="text-danger">Venta: <strong>' . $data['venta'] . '</strong></span></h3>
                                <p class="mb-0"><span class="text-secondary">Última actualización:</span> ' . $fecha_actualizacion_str . '</p>
                                <p><em>Nota: Hora de Buenos Aires, Argentina.</em></p>
                            </div>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Cantidad:</label>
                                    <input type="number" step="0.01" class="form-control" name="amount" id="amount" required>
                                </div>
                                <div class="mb-3">
                                    <label for="direction" class="form-label">Dirección:</label>
                                    <select class="form-select" name="direction" id="direction">
                                        <option value="usd_to_ars">Dolar Blue a Peso Argentino</option>
                                        <option value="ars_to_usd">Peso Argentino a Dolar Blue</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Convertir!</button>
                            </form>
                            ';
                            
                            if (isset($formatted_result)) {
                                echo '
                                <div class="mt-4 alert alert-success">
                                    <h6>';
                                if ($direction === 'ars_to_usd') {
                                    echo '
                                        Con ' . str_replace(',', '.', $formatted_amount) . ' Pesos <img src="' . url_for('static', 'img/flags/argentina.png') . '" alt="Bandera Argentina" style="width: 25px;"><br><hr><br> obtienes ' . str_replace('.00', '', $formatted_result) . ' Dolares <img src="' . url_for('static', 'img/flags/usa.png') . '" alt="Bandera Estados Unidos" style="width: 25px;">';
                                } elseif ($direction === 'usd_to_ars') {
                                    echo '
                                        Con ' . str_replace(',', '.', $formatted_amount) . ' Dolares <img src="' . url_for('static', 'img/flags/usa.png') . '" alt="Bandera Estados Unidos" style="width: 25px;"><br><hr><br> obtienes ' . str_replace('.00', '', $formatted_result) . ' Pesos <img src="' . url_for('static', 'img/flags/argentina.png') . '" alt="Bandera Argentina" style="width: 25px;">';
                                }
                                echo '
                                    </h6>
                                </div>';
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlace a Bootstrap JS (opcional, para interacciones) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
