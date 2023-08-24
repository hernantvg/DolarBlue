<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Consulta la cotización actual del Dólar Blue en Argentina y realiza conversiones de moneda.">
    <meta name="keywords" content="valor,precio,cotizacion,cuanto,costo,importe,dolar,blue,paralelo,alternativo,informal,negro,mercado,venta,compra,cambio,moneda,peso,argentina,hoy,minuto,actualizado,conversor,online,convertir,calculadora,u$s,usd">
    <meta name="robots" content="index, follow">
    <title>USD a ARS | Calculadora de dólar blue a peso argentino - Cotización Dólar Blue Hoy - Precio Dólar Blue Hoy</title>
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
            <div class="card-header alert alert-secondary">
                <h1 class="m-0">Cotización Dólar Blue Hoy</h1>
                    <h6>USD a ARS | Calculadora de dólar blue a peso argentino</h6>
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
                        <div role="alert" id="estadoAPI">
                         Estado de la API: Cargando...
                        </div>
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
                            <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary" id="convert">Convertir!</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Muestro resultado de conversion -->
                <div class="card-body">
                <button type="button" class="btn-close" aria-label="Close"></button>
                    <p id="result"></p>
                </div>

                <div class="card bg-light mt-4"">

                    <table class="table table-striped" id="cotizaciones">
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

        document.getElementById("convert").addEventListener("click", function() {
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
                result = `<div class="mt-4 alert alert-success"><h5>${result}</h5></div>`;
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
            document.getElementById("estadoAPI").textContent = `Status del servicio: ${estado}`;
        })
        .catch(error => {
            console.error("Error fetching API state:", error);
            document.getElementById("estadoAPI").textContent = "Status del servicio: Error al cargar";
        });
    </script>
</body>
</html>
