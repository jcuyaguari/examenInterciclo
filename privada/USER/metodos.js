function eliminar(cod) {
    if (cod == "") {
        alert('vacio');
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.location.reload();
            }
        };
        xmlhttp.open("GET", "baseUser.php?opc=eliminar&codigo=" + cod, true);
        xmlhttp.send();
    }
    return false;
}

function reactivar(cod) {
    if (cod == "") {
        alert('vacio');
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.location.reload();
            }
        };
        xmlhttp.open("GET", "baseUser.php?opc=reactivar&codigo=" + cod, true);
        xmlhttp.send();
    }
    return false;
}



function actualizarContrasena(cod) {
    $contrasenaN = prompt("INGRESAR CLAVE NUEVA");
    if (cod != "" && $contrasenaN != "") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var res = this.responseText;
                alert(res);
                document.location.reload();
            }
        };

        xmlhttp.open("GET", "baseUser.php?opc=cambiar&contrasenaN=" + $contrasenaN + "&codigo=" + cod, true);
        xmlhttp.send();

    } else {
        alert('No Rebice los datos')
    }
}
function buscarUsuario(cedula) {
    if (cedula != "") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var res = this.responseText;
                alert(res);
                document.location.reload();
            }
        };

        xmlhttp.open("GET", "baseUser.php?opc=buscarUsu&cedula=" + cedula, true);
        xmlhttp.send();

    } else {
        alert('No Rebice los datos')
    }
}