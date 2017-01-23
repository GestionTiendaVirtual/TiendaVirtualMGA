

var count2 = document.getElementById('count').value;
function addInputFileImage(input) {    //Se crean las etiquetas HTML

    var fileImage = document.createElement('tr');
    if (count2 < 6 && count2 < 5) {
        count2++;
        fileImage.innerHTML = "<td><label id='lblColor'>Imagen:</label></td><td>\n\
    <input type='file' id='fileImage" + count2 + "' name='fileImage" + count2 + "'/></td></tr> ";

        //Se carga el HTML generado con js a la etiqueta indicada
        document.getElementById(input).appendChild(fileImage);
    } else {
        document.getElementById('btnAdd').style.display = 'none';
    }
    document.getElementById('count').value = count2;
    //------------------------------------------------------
    // función para ocultar mensajes de error
    return false;
}//fin addInput
