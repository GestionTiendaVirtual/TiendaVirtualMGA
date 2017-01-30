
/*Función encargada de generar los campos dinámicos que corresponden a los datos
 del actor input corresponde al id de un div vacío donde se generará el nuevo html*/
var counter = 1;
function addInput(input) {
    //Se crean las etiquetas HTML
    var fileImage = document.createElement('tr');
    //-------------------------------------------------
    if (counter < 6) {
        fileImage.innerHTML = "<td><label id='lblColor'>Imagen:</label></td><td>\n\
    <input type='file' id='fileImage" + counter + "' name='fileImage" + counter + "'/></td></tr> ";

        //Se carga el HTML generado con js a la etiqueta indicada
        document.getElementById(input).appendChild(fileImage);
    } else {
        document.getElementById('btnAdd').style.display = 'none';
    }
    document.getElementById('count').value = counter;
    //------------------------------------------------------
    counter++;
    // función para ocultar mensajes de error
    return false;
}//fin addInput




function mascara(o, f) {
    v_obj = o;
    v_fun = f;
    setTimeout("execmascara()", 1);
}
function execmascara() {
    v_obj.value = v_fun(v_obj.value);
}
function cpf(v) {
    v = v.replace(/([^0-9\.]+)/g, '');
    v = v.replace(/^[\.]/, '');
    v = v.replace(/[\.][\.]/g, '');
    v = v.replace(/\.(\d)(\d)(\d)/g, '.$1$2');
    v = v.replace(/\.(\d{1,2})\./g, '.$1');
    v = v.toString().split('').reverse().join('').replace(/(\d{3})/g, '$1,');
    v = v.split('').reverse().join('').replace(/^[\,]/, '');
    return v;
}