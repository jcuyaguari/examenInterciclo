
var listaCodigo  = new Array();
var listaCantidad = new Array();
function cambiar(opc) {
    switch (opc) {
        case 'uno':
            var element = document.getElementById('uno');
            element.style.display = 'block';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            var element2 = document.getElementById('cuatro');
            element2.style.display = 'none';
            var element2 = document.getElementById('cinco');
            element2.style.display = 'none'
            var element2 = document.getElementById('seis');
            element2.style.display = 'none'
            var element2 = document.getElementById('siete');
            element2.style.display = 'none'
            break;
        case 'dos':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'block';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            var element2 = document.getElementById('cuatro');
            element2.style.display = 'none';
            var element2 = document.getElementById('cinco');
            element2.style.display = 'none'
            var element2 = document.getElementById('seis');
            element2.style.display = 'none'
            var element2 = document.getElementById('siete');
            element2.style.display = 'none'
            break;

        case 'tres':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'block';
            var element2 = document.getElementById('cuatro');
            element2.style.display = 'none';
            var element2 = document.getElementById('cinco');
            element2.style.display = 'none'
            var element2 = document.getElementById('seis');
            element2.style.display = 'none'
            var element2 = document.getElementById('siete');
            element2.style.display = 'none'
            break;
        case 'cuatro':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            var element2 = document.getElementById('cuatro');
            element2.style.display = 'block';
            var element2 = document.getElementById('cinco');
            element2.style.display = 'none'
            var element2 = document.getElementById('seis');
            element2.style.display = 'none'
            var element2 = document.getElementById('siete');
            element2.style.display = 'none'
            break;
        case 'cinco':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            var element2 = document.getElementById('cuatro');
            element2.style.display = 'none';
            var element2 = document.getElementById('cinco');
            element2.style.display = 'block'
            var element2 = document.getElementById('seis');
            element2.style.display = 'none'
            var element2 = document.getElementById('siete');
            element2.style.display = 'none'
            break;
        case 'seis':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            var element2 = document.getElementById('cuatro');
            element2.style.display = 'none';
            var element2 = document.getElementById('cinco');
            element2.style.display = 'none'
            var element2 = document.getElementById('seis');
            element2.style.display = 'block'
            var element2 = document.getElementById('siete');
            element2.style.display = 'none'
            break;
        case 'siete':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            var element2 = document.getElementById('cuatro');
            element2.style.display = 'none';
            var element2 = document.getElementById('cinco');
            element2.style.display = 'none'
            var element2 = document.getElementById('seis');
            element2.style.display = 'none'
            var element2 = document.getElementById('siete');
            element2.style.display = 'block'
            break;
    }
}

function cantidad(num, val, cod) {
    if (val.checked == true) {
        var bandera = true;
        while (bandera) {
            var retVal = prompt("Ingrese Canidad: ");
            if (isNaN(retVal) == false) {
                if (retVal <= num) {
                    //Lenar carrito
                    bandera = false;
                } else {
                    alert('Debe ser un numero menor a ' + num + ' ya que solo se dispone de esas unidades');
                }

            } else {
                alert('Debe ser un numero');
            }
        }
    } else {
        //quitar de la lista
    }

}
