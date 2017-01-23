<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if(!isset($_SESSION["idUser"])){
            header("location: ../index.php");
        }
        ?>

    	<h1>Search</h1>
        <br>
        <hr>
    	<a href="../index.php"><h3>Inicio</h3></a>
        <hr>

        <!--Form para busquedas-->
        <input type="text" id="termSearch" placeholder="termino de busqueda">
        <button onclick="ajax();" >buscar</button>
        <!-- Fin del form para busqueda -->

        <div id="tableDiv"></div>


        <script type="text/javascript">
            function ajax() {
                // De esta forma se obtiene la instancia del objeto XMLHttpRequest
                if(window.XMLHttpRequest) {
                    connection = new XMLHttpRequest();
                }
                else if(window.ActiveXObject) {
                    connection = new ActiveXObject("Microsoft.XMLHTTP");
                }
                 
                var param = document.getElementById("termSearch").value;
                 
                // Preparando la función de respuesta
                connection.onreadystatechange = response;
                 
                // Realizando la petición HTTP con método POST
                connection.open('POST', '../Business/Search/SearchProduct.php');
                connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                connection.send("termSearch=" + param);
            }
             
            function response() {
                if(connection.readyState == 4) {
                    var d = document.getElementById("tableDiv");
                    while (d.hasChildNodes())
                        d.removeChild(d.firstChild);


                    var text = String(connection.responseText);

                    // Obtener la referencia del elemento tabla (donde se creara la tabla)
                    var body = document.getElementById("tableDiv");
                    // Crea un elemento <table>
                    var tabla   = document.createElement("table");
                    var tblBody = document.createElement("tbody");

                    /*Se separa por producto*/
                    var listProduct = text.split("&");

                    /******* Se crean th ********/
                    var nameTh = document.createElement("th");
                    var brandTh = document.createElement("th");
                    var modelTh = document.createElement("th");
                    var priceTh = document.createElement("th");
                    var colorTh = document.createElement("th");
                    var descriptionTh = document.createElement("th");

                    /********** Se crean los textos de th *********/
                    var nameValueTh = document.createTextNode("Nombre");
                    var brandValueTh = document.createTextNode("Marca");
                    var modelValueTh = document.createTextNode("Modelo");
                    var priceValueTh = document.createTextNode("Precio");
                    var colorValueTh = document.createTextNode("Color");
                    var descriptionValueTh = document.createTextNode("Descrición");

                    /************* Se agregan los textos a los titulos ************/
                    nameTh.appendChild(nameValueTh);
                    brandTh.appendChild(brandValueTh);
                    modelTh.appendChild(modelValueTh);
                    priceTh.appendChild(priceValueTh);
                    colorTh.appendChild(colorValueTh);
                    descriptionTh.appendChild(descriptionValueTh);

                    /*Se agregan los titulos a la tabla*/
                    tabla.appendChild(nameTh);
                    tabla.appendChild(brandTh);
                    tabla.appendChild(modelTh);
                    tabla.appendChild(priceTh);
                    tabla.appendChild(colorTh);
                    tabla.appendChild(descriptionTh);


                    for (var i = 0, len = listProduct.length; i < len; i++) {
                        var item = listProduct[i].split(";");
                        // Crea las hileras de la tabla
                        var hilera = document.createElement("tr");

                        /******** Se crean ********/
                        var name = document.createElement("td");
                        var brand = document.createElement("td");
                        var model = document.createElement("td");
                        var price = document.createElement("td");
                        var color = document.createElement("td");
                        var description = document.createElement("td");

                        /* Se incertan los datos en las celdas */
                        var nameValue = document.createTextNode(item[0]);
                        var brandValue = document.createTextNode(item[1]);
                        var modelValue = document.createTextNode(item[2]);
                        var priceValue = document.createTextNode(item[3]);
                        var colorValue = document.createTextNode(item[4]);
                        var descriptionValue = document.createTextNode(item[5]);

                        /*Se agrega el texto a cada celda*/
                        name.appendChild(nameValue);
                        brand.appendChild(brandValue);
                        model.appendChild(modelValue);
                        price.appendChild(priceValue);
                        color.appendChild(colorValue);
                        description.appendChild(descriptionValue);

                        /*Se agrega cada celda a la hilera*/
                        hilera.appendChild(name);
                        hilera.appendChild(brand);
                        hilera.appendChild(model);
                        hilera.appendChild(price);
                        hilera.appendChild(color);
                        hilera.appendChild(description);


                        var hileraImg = document.createElement("tr");
                        for (var p = 6, lenImg = item.length; p < lenImg; p++) {
                            var imgProduct = item[p];
                            var imgTd = document.createElement("td");
                            
                            var img = document.createElement("img");
                            img.src = imgProduct;
                            img.width = 100;
                            img.height = 100;
                            

                            imgTd.appendChild(img);
                            hileraImg.appendChild(imgTd);
                        }

                        /*Se incertan las hileras*/
                        tblBody.appendChild(hilera);
                        tblBody.appendChild(hileraImg);

                        // posiciona el <tbody> debajo del elemento <table>
                        tabla.appendChild(tblBody);
                        // appends <table> into <body>
                        body.appendChild(tabla);
                        // modifica el atributo "border" de la tabla y lo fija a "2";
                        //tabla.setAttribute("border", "1");
                    }
                }
            }
        </script>
    </body>
</html>
