function cambiar(opc) {
    switch (opc) {
        case '1':
            var element = document.getElementById('1');
            element.style.display = 'block';
            var element1 = document.getElementById('2');
            element1.style.display = 'none';
            var element2 = document.getElementById('3');
            element2.style.display = 'none';
            break;
        case '2':
            var element = document.getElementById('1');
            element.style.display = 'none';
            var element1 = document.getElementById('2');
            element1.style.display = 'block';
            var element2 = document.getElementById('3');
            element2.style.display = 'none';
            break;
        case '3':
            var element = document.getElementById('1');
            element.style.display = 'none';
            var element1 = document.getElementById('2');
            element1.style.display = 'none';
            var element2 = document.getElementById('3');
            element2.style.display = 'block';
            break;
    }
}

function crearLocal() {

    var nombre = document.getElementById('nombre').value;
    var direccion = document.getElementById('direccion').value;
    var telefono = document.getElementById('telefono').value;
    var descripcion = document.getElementById('descripcion').value;

    if (nombre != "" && direccion != "" && telefono != "" && descripcion != "") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var res = this.responseText;
                alert('Local Guardado')
                document.location.reload();

            }
        };
        xmlhttp.open("GET", "baseLocales.php?opc=crear&nombre=" + nombre + "&direccion=" + direccion + "&telefono=" + telefono +
            "&descripcion=" + descripcion, true);
        xmlhttp.send();
    } else {
        alert('No Rebice los datos')
    }
}

function buscarLocal() {
    var nombre = document.getElementById('nombreBuscar').value;

    if (nombre != "") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('editarLoc').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "baseLocales.php?opc=buscar&nombre=" + nombre, true);
        xmlhttp.send();
    } else {
        alert('No Rebice los datos')
    }
}

function actualizarLocal() {
    var nombre = document.getElementById('nombreBuscar').value;
    var nombreN = document.getElementById('nombreNuevo').value;
    var direccion = document.getElementById('direccionNueva').value;
    var telefono = document.getElementById('telefonoNuevo').value;
    var descripcion = document.getElementById('descripcionNueva').value;

    if (nombre != "" && nombreN != "" && direccion != "" && telefono != "" && descripcion != "") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var res = this.responseText;
                alert('Se actualizo');
                document.location.reload();

            }
        };
        xmlhttp.open("GET", "baseLocales.php?opc=modificar&nombre=" + nombre + "&nombreN=" + nombreN + "&direccion=" + direccion + "&telefono=" + telefono +
            "&descripcion=" + descripcion, true);
        xmlhttp.send();
    } else {
        alert('No Rebice los datos')
    }
}

function eliminarLocal() {
    var nombre = document.getElementById('nombreEliminar').value;
    if (nombre != "") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                alert('Local Elminado')
                document.location.reload();
            }
        };
        xmlhttp.open("GET", "baseLocales.php?opc=eliminar&nombre=" + nombre, true);
        xmlhttp.send();
    } else {
        alert('No Rebice los datos para eliminar')
    }
}
