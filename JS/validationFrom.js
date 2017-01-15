function validateFields() {

    regularExpChar = new RegExp(/^[a-zA-Z\s]*$/);
    var brand = document.getElementById('txtBrand');
    var model = document.getElementById('txtModel');
    var price = document.getElementById('txtPrice');
    var color = document.getElementById('txtColor');
    var flag = 0;
    
    if (brand.value.length > 2) {
        if (!regularExpChar.test(brand.value)) {
            document.getElementById('txtErrorBrand').innerHTML = "*Solo caracteres";
            document.getElementById('txtErrorBrand').style.visibility = "visible";
            flag = 1;
        } else {
            document.getElementById('txtErrorBrand').style.visibility = "hidden";
        }
    } else {        
        document.getElementById('txtErrorBrand').innerHTML = "*Espacio vacío o inferior al mínimo";
        document.getElementById('txtErrorBrand').style.visibility = "visible";
        flag = 1;
    }
    if (price.value.length < 2) {

        document.getElementById('txtErrorPrice').style.visibility = "visible";
        document.getElementById('txtErrorPrice').innerHTML = "*Espacio vacío o inferior al mínimo";
        flag = 1;
    } else {
        document.getElementById('txtErrorPrice').style.visibility = "hidden";
    }
    if (model.value.length < 2) {

        document.getElementById('txtErrorModel').style.visibility = "visible";
        document.getElementById('txtErrorModel').innerHTML = "*Espacio vacío o inferior al mínimo";
        flag = 1;
    } else {
        document.getElementById('txtErrorPrice').style.visibility = "hidden";
    }
    if (color.value.length > 2) {

        if (!regularExpChar.test(color.value)) {
            document.getElementById('txtErrorColor').innerHTML = "*Solo caracteres";
            document.getElementById('txtErrorColor').style.visibility = "visible";
            flag = 1;
        } else {
            document.getElementById('txtErrorColor').style.visibility = "hidden";
        }
    } else {

        document.getElementById('txtErrorColor').style.visibility = "visible";
        document.getElementById('txtErrorColor').innerHTML = "*Espacio vacío o inferior al mínimo";
        flag = 1;
    }

    if (flag === 1) {
        return false;
    }
    return true;

}