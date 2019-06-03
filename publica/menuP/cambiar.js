
var listaCodigo = new Array();
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
                    listaCantidad.push(retVal);
                    listaCodigo.push(cod);
                    bandera = false;
                } else {
                    alert('Debe ser un numero menor a ' + num + ' ya que solo se dispone de esas unidades');
                }

            } else {
                alert('Debe ser un numero');
            }
        }
    } else {
        var pos = listaCodigo.indexOf(cod)
        listaCodigo.splice(pos, 1);
        listaCantidad.splice(pos, 1);
        console.log(listaCantidad, listaCodigo);
    }

}

function carrito() {
    if (listaCodigo.length != 0) {
        $('#listaCodigos').val(JSON.stringify(listaCodigo))
        $('#listaCantidad').val(JSON.stringify(listaCantidad))
        var formData = new FormData($("#formCarrito")[0]);
        $.ajax({
            url: 'metodos.php',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
        }).done(function (resp) {
            console.log(resp)
            res = resp.indexOf('**T**');
            if (res != -1) {
                alert("PRODUCTO CREADO")
               // document.location.reload();
            } else {
                res = resp.indexOf('**N**');
                if (res != -1) {
                    alert("EL NOMBRE ES EL MISMO");
                } else {
                    alert('No se pudo guardar>>');
                }
    
            }
        });
    } else {
        alert('Debe selecionar uno o mas productos')
    }
}
