<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Consulta la cotización actual del Dólar Blue en Argentina y realiza conversiones de moneda.">
    <meta name="keywords"
        content="valor,precio,cotizacion,cuanto,costo,importe,dolar,blue,paralelo,alternativo,informal,negro,mercado,venta,compra,cambio,moneda,peso,argentina,hoy,minuto,actualizado,conversor,online,convertir,calculadora,u$s,usd">
    <meta name="robots" content="index, follow">
    <meta name="author" content="cotizaciondolarblue.com">
    <title>USD a ARS | Calculadora de dólar blue a peso argentino - Cotización Dólar Blue Hoy - Precio Dólar Blue Hoy
    </title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-capable" content="yes">
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

        .card,
        .alert,
        .btn {
            margin: 5px;
        }

        #installBox {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
    </style>
    <script>
        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', (event) => {
            event.preventDefault();
            deferredPrompt = event;

            const installButton = document.getElementById('installButton');
            installButton.style.display = 'block';

            installButton.addEventListener('click', () => {
                installButton.style.display = 'none';
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('La PWA ha sido instalada');
                    } else {
                        console.log('La instalación de la PWA fue rechazada');
                    }
                    deferredPrompt = null;
                });
            });
        });

        window.addEventListener('appinstalled', (event) => {
            console.log('La PWA ha sido instalada');
        });
    </script>
    <!-- Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3153959022319427"
        crossorigin="anonymous"></script>
    <!-- Google analytics tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W8ZC9M9NYJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-W8ZC9M9NYJ');
    </script>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <button id="installButton" class="btn btn-primary">
                <i class="bi bi-file-arrow-down"></i> Instalar como aplicación
            </button>
            <div class="card-header alert alert-secondary">
                <h1 class="m-0">Cotización Dólar Blue Hoy</h1>
                <h6>USD a ARS | Calculadora de dólar blue a peso argentino</h6>
            </div>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div class="center-box">
                    <h5>Cotización actual Dólar Blue</h5>
                    <hr>
                    <span class="big-text">
                        Compra: $<span id="compra"></span>
                        Venta: $<span id="venta"></span>
                    </span>
                    <br>
                    actualización: <span id="fechaActualizacion"></span> (GMT-3)
                    <br>
                </div>
            </div>

            <div class="card bg-light mt-4">
                <div class="card-body">
                    <h4 class="card-title">Calculadora de Conversión Dólar Blue a Peso Argentino</h4>
                    <p>
                        Emplea la herramienta de conversión que sigue para estimar el valor del dólar Blue o
                        paralelo en moneda local argentina y al revés. El tipo de cambio del dólar paralelo se
                        renueva cada hora.
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
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-success" id="convert">
                                <h4>CONVERTIR <i class="bi bi-currency-dollar"></i></h4>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Muestro resultado de conversion -->
            <div class="card-body">
                <p id="result"></p>
            </div>

            <div class="card bg-light mt-4"">
    
                        <table class=" table table-striped" id="cotizaciones">
                <thead>
                    <tr>
                        <th>Cotizacion de Todos los tipos de Dólar</th>
                        <th>Compra</th>
                        <th>Venta</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los datos de la API se agregarán aquí automáticamente por JavaScript -->
                </tbody>
                </table>

            </div>

            <!-- Tabla de conversiones populares -->
            <div class="card bg-light mt-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Conversiones Populares</th>
                        </tr>
                    </thead>
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
                        <tr>
                            <td><span id="conversion100000"></span></td>
                        </tr>
                        <!-- Agrega más filas para otras conversiones populares aquí -->
                    </tbody>
                </table>
            </div>
            <!-- API status -->
            <br>
            <div class="alert alert-light" role="alert" id="estadoAPI">
                Estado de la API: Cargando...
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
                const fechaActualizacion = data.fechaActualizacion;

                document.getElementById("compra").textContent = compra;
                document.getElementById("venta").textContent = venta;

                const fecha = new Date(fechaActualizacion);
                const fechaFormateada = fecha.toLocaleString("es-AR", { timeZone: "America/Argentina/Buenos_Aires" });
                document.getElementById("fechaActualizacion").textContent = fechaFormateada;

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
                    { amount: 100000, label: "100000 dólares blue" }
                ];

                conversionTable.forEach(conversion => {
                    const arsAmount = (conversion.amount * venta).toFixed(2);
                    document.getElementById(`conversion${conversion.amount}`).textContent = `${conversion.label} son $${arsAmount} pesos argentinos`;
                });
            })
            .catch(error => {
                console.error("Error fetching data:", error);
            });

        document.getElementById("convert").addEventListener("click", function () {
            const amount = parseFloat(document.getElementById("amount").value);
            const conversionDirection = document.getElementById("conversionDirection").value;

            let result = "";
            if (conversionDirection === "usdToArs") {
                const arsAmount = (amount * parseFloat(document.getElementById("venta").textContent)).toFixed(2);
                const usdAmount = amount.toFixed(2);
                result = `Con $${usdAmount} Dólares de Estados Unidos obtienes $${arsAmount} Pesos de Argentina.`;
            } else if (conversionDirection === "arsToUsd") {
                const usdAmount = (amount / parseFloat(document.getElementById("compra").textContent)).toFixed(2);
                const arsAmount = amount.toFixed(2);
                result = `Con $${arsAmount} Pesos de Argentina obtienes $${usdAmount} Dólares de Estados Unidos.`;
            }

            if (result !== "") {
                result = `<div class="alert alert-success"><h5>${result}</h5></div>`;
            }

            document.getElementById("result").innerHTML = result;
        });

        // Función para actualizar la tabla de cotizaciones
        function actualizarTabla() {
            fetch("https://dolarapi.com/v1/dolares")
                .then(response => response.json())
                .then(data => {
                    // Obtener el elemento de la tabla donde se agregarán los datos
                    const cotizacionesTable = document.getElementById("cotizaciones").querySelector("tbody");

                    // Limpiar la tabla existente
                    cotizacionesTable.innerHTML = '';

                    // Iterar sobre los datos y agregar filas a la tabla
                    data.forEach(item => {
                        const row = cotizacionesTable.insertRow();
                        const casaCell = row.insertCell(0);
                        const compraCell = row.insertCell(1);
                        const ventaCell = row.insertCell(2);

                        casaCell.textContent = item.nombre;
                        compraCell.textContent = item.compra ? `$${item.compra.toFixed(2)}` : 'N/A';
                        ventaCell.textContent = `$${item.venta.toFixed(2)}`;
                    });
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });
        }

        // Actualizar la tabla cada 5 minutos (300,000 milisegundos)
        setInterval(actualizarTabla, 300000);

        // Llamar a la función de actualización al cargar la página
        actualizarTabla();

        // Obtener el estado de la API
        fetch("https://dolarapi.com/v1/estado")
            .then(response => response.json())
            .then(data => {
                const estado = data.estado;
                document.getElementById("estadoAPI").textContent = `servicio: ${estado}`;
            })
            .catch(error => {
                console.error("Error fetching API state:", error);
                document.getElementById("estadoAPI").textContent = "servicio: Error al cargar";
            });

        // PWA
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('Service Worker registrado con éxito:', registration);
                    })
                    .catch(error => {
                        console.log('Fallo en el registro del Service Worker:', error);
                    });
            });
        }
    </script>
    </div>
</body>

</html>