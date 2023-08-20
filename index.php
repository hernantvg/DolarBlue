<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Consulta la cotización actual del Dólar Blue en Argentina y realiza conversiones de moneda.">
    <meta name="robots" content="index, follow">
    <title>Cotización Dólar Blue Hoy - Precio Dólar Blue Hoy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
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
                <h5 class="m-0">Cotización Dólar Blue Hoy</h5>
            </div>
            <div class="card-body">
                <div class="center-box">
                    <div class="alert alert-primary" role="alert">
                        <span class="med-text">Cotización actual Dólar Blue</span><br>
                        <span class="big-text">Compra: $<span id="compra"></span> Venta: $<span id="venta"></span></span><br>
                        Última actualización: <span id="fechaActualizacion"></span><br>
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
                            <button type="button" class="btn btn-primary" id="convert">Convertir!</button>
                        </form>
                    </div>
                </div>

                <div class="mt-4 alert alert-success">
                    <div class="card-body">
                        <p id="result"></p>
                    </div>
                </div>

                <div class="mt-4">
                    <h4>Últimas Noticias de Economía</h4>
                    <ul id="newsList"></ul>
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

            document.getElementById("result").textContent = result;
        });

    <h1>Últimas Noticias de Economía</h1>
    <ul id="newsList"></ul>

    <script>
        fetch("https://www.ambito.com/rss/pages/economia.xml")
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const xmlDoc = parser.parseFromString(data, "text/xml");

                const items = xmlDoc.querySelectorAll("item");
                const newsList = document.getElementById("newsList");

                items.forEach(item => {
                    const title = item.querySelector("title").textContent;
                    const link = item.querySelector("link").textContent;
                    const description = item.querySelector("description").textContent;

                    const listItem = document.createElement("li");
                    const linkElement = document.createElement("a");
                    linkElement.textContent = title;
                    linkElement.href = link;
                    linkElement.target = "_blank";

                    const descriptionElement = document.createElement("p");
                    descriptionElement.textContent = description;

                    listItem.appendChild(linkElement);
                    listItem.appendChild(descriptionElement);
                    newsList.appendChild(listItem);
                });
            })
            .catch(error => {
                console.error("Error fetching news:", error);
            });
    </script>
</body>
</html>
