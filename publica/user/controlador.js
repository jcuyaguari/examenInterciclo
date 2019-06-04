function cambiar(opc) {
    switch (opc) {
        case 'uno':
            var element = document.getElementById('uno');
            element.style.display = 'block';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            break;
        case 'dos':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'block';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';

            break;

        case 'tres':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'block';

            break;
    }
}




function guardarCliente() {
    var formData = new FormData($("#formUser")[0]);
    $.ajax({
        url: 'metodos.php',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
    }).done(function (resp) {
        //alert(resp)
        res = resp.indexOf('*T*');
        if (res != -1) {
            alert("Usuario Registrado")
            location.href = 'login.html';
        } else {
            res = resp.indexOf('*N*');
            if (res != -1) {
                alert("La cedula ya esta registrada");
            } else {
                alert('ya perdii' + res)
            }

        }
    });

}

function validarCedula() {
    var cad = document.getElementById("cedula").value;
    var total = 0;
    var longitud = cad.length;
    if (cad !== "" && longitud === 10) {
        for (i = 0; i < longitud - 1; i++) {
            //verifica los salto pares para la validacion
            if (i % 2 === 0) {
                var aux = cad.charAt(i) * 2;
                if (aux > 9) aux -= 9;
                total += aux;
            } else {
                total += parseInt(cad.charAt(i));
                //parsea o concatanara la cadena
            }
        }
        total = total % 10 ? 10 - total % 10 : 0;
        var aux = cad.charAt(9);
        if (cad.charAt(9) == total) {
            //si se cumple la validacion muestra esto
            document.getElementById("mensajeCedula").innerText = 'La cedula es correcta';
        } else {
            document.getElementById("mensajeCedula").innerHTML = 'La cedula es incorrecta';
        }

    } else {
        document.getElementById("mensajeCedula").innerHTML = 'La cedula se esta typiando';
    }
}

function soloNumeros(e, c) {
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48) && (key <= 57) && (c.length + 1 <= 10) || (key == 8))
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function dosNombres(txt, id) {
    palabras = txt.split(' ');
    if (palabras.length == 2) {
        p1 = palabras[0].trim();
        p2 = palabras[1].trim();
        if (p1 != '' && p2.length >= 2) {
            document.getElementById(id).innerHTML = ('cumple');
        } else {
            document.getElementById(id).innerHTML = ('no cumple');
        }
    } else {
        document.getElementById(id).innerHTML = ('no cumple');
    }
}

function numeroTelefono(e) {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum < 48) || (keynum > 57)) {
        document.getElementById("mensajeTelefono").innerHTML = ("Ingrese solo numeros ");
        return true;

    }
}

function fecha() {
    var Fecha = document.getElementById('fechaNacimiento').value;
    var Mensaje = '';
    document.getElementById('mensajeFecha').className = '';
    if (Fecha.length == 10) {
        fe = Fecha.split('/');
        var Anio = fe[2];
        var Mes = fe[1] - 1;
        var Dia = fe[0];
        var VFecha = new Date(Anio, Mes, Dia);
        if ((VFecha.getFullYear() == Anio) && (VFecha.getMonth() == Mes) && (VFecha.getDate() == Dia)) {
            Mensaje = 'Fecha correcta';
            document.getElementById('mensajeFecha').innerHTML = 'Fecha correcta';
        }
        else {
            Mensaje = 'Fecha incorrecta';
            document.getElementById('mensajeFecha').innerText = 'Fecha incorrecta';
        }
    }
    document.getElementById('mensajeFecha').innerHTML = Mensaje;
}

// function correoU(txt) {
//     f = txt.split('@');
//     if (f.length >= 2) {
//         if (f[0].length >= 1) {
//             if (f[1] == 'ups.edu.ec' || f[1] == 'est.ups.edu.ec') {
//                 document.getElementById("mensajeCorreo").innerHTML = 'Correo correcto';
//             } else {
//                 document.getElementById("mensajeCorreo").innerHTML = 'Correo erroneo';
//             }
//         } else {
//             document.getElementById("mensajeCorreo").innerHTML = 'Correo erroneo';
//         }
//     } else {
//         document.getElementById("mensajeCorreo").innerHTML = 'Correo erroneo';
//     }
// }



function validarCamposObligatorios() {
    // arreglos
    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var elemento = document.forms[0].elements[i]
        if (elemento.value == '' && elemento.type == 'text') {
            if (elemento.id == 'cedula') {
                document.getElementById('mensajeCedula').innerHTML = '<br> La cedula no esta ingresada'
            }
            elemento.style.border = '1px red solid'
            bandera = false
        }
    }
    if (!bandera) {
        alert('ahora si mete el dedo')
    }
    return bandera
}

// function validarTodo() {
//     var bandera = true;
//     if (!document.getElementById('mensajeCedula')) {
//         var capa = document.getElementById('cedula');
//         capa.style.border = "4px outset  red";
//         bandera = false;
//     }

//     if (!document.getElementById('mensajeNombres')) {
//         var capa = document.getElementById('nombres');
//         capa.style.border = "4px outset  red";
//         bandera = false;
//     }
//     if (!document.getElementById('mensajeApellidos')) {
//         var capa = document.getElementById('apellidos');
//         capa.style.border = "4px outset  red";
//         bandera = false;
//     }
//     if (!document.getElementById('mensajeDireccion')) {
//         var capa = document.getElementById('direccion');
//         capa.style.border = "4px outset  red";
//         bandera = false;
//     }
//     if (!document.getElementById('mensajeTelefono')) {
//         var capa = document.getElementById('telefono');
//         capa.style.border = "4px outset  red";
//         bandera = false;
//     }
//     if (!document.getElementById('mensajeFecha')) {
//         var capa = document.getElementById('fechaNacimiento');
//         capa.style.border = "4px outset  red";
//         bandera = false;
//     }
//     if (!document.getElementById('mensajeCorreo')) {
//         var capa = document.getElementById('correo');
//         capa.style.border = "4px outset  red";
//         bandera = false;
//     }
//     // if (!document.getElementById('mensajeContrasena')) {
//     //     var capa = document.getElementById('contrasena');
//     //     capa.style.border = "4px outset  red";
//     //     bandera = false;
//     // }

//     return bandera;


// }





function iniciar() {
    $correo = document.getElementById('correo').value;
    $contrasena = document.getElementById('contrasena').value;
    if (correo != "" && contrasena != "") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                resp = this.responseText;
                console.log(resp)
                res = resp.indexOf('**T**');

                if (res != -1) {
                    document.getElementById('respuesta').innerHTML = this.responseText;
                    var $codigo = document.getElementById('codigo').value;

                    location.href = '../menuP/menu.php?codigo=' + $codigo;
                } else {
                    alert("USUARIO NO ENCONTRADO");
                    document.location.reload();

                }

            }
        };
        xmlhttp.open("POST", "metodos.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("opc=iniciar&correo=" + $correo + "&contrasena=" + $contrasena);
    } else {
        alert('datos vacios')
    }
}

function eliminarUsuario() {
    $cedula = document.getElementById('cedulaUsu').value;
    if ($cedula != "") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var res = this.responseText;
                location.href = 'login.html';
            }
        };
        xmlhttp.open("POST", "metodos.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("opc=eliminar&cedula=" + $cedula);

    } else {
        alert('No Rebice los datos para eliminar')
    }
}
function actualizarUsuario() {
    $cedula = document.getElementById('cedulaUsu').value;
    $nombre = document.getElementById('nombres').value;
    $apellido = document.getElementById('apellidos').value;
    $direccion = document.getElementById('direccion').value;
    $telefono = document.getElementById('telefono').value;
    $fechaN = document.getElementById('fechaNacimiento').value;
    $correo = document.getElementById('correo').value;

    if ($cedula != "" && $nombre != "" && $apellido != "" && $direccion != "" && $telefono != "" && $fechaN != "" && $correo != "") {
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
        xmlhttp.open("POST", "metodos.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("opc=actualizar&nombre=" + $nombre + "&apellido=" + $apellido + "&direccion=" + $direccion + "&telefono=" + $telefono + "&fechaN=" + $fechaN + "&correo=" + $correo + "&cedula=" + $cedula);
    } else {
        alert('No Rebice los datos')
    }
}
function actualizarContrasena() {
    $cedula = document.getElementById('cedulaUsu').value;
    $contrasenaA = prompt("INGRESAR CLAVE ANTIGUA");
    $contrasenaN = prompt("INGRESAR CLAVE NUEVA");
    if ($cedula != "" && $contrasenaA != "" && $contrasenaN != "") {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var res = this.responseText;
                //alert(res);
                document.location.reload();
            }
        };
        xmlhttp.open("POST", "metodos.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("opc=actualizarContrasena&contrasenaA=" + $contrasenaA + "&contrasenaN=" + $contrasenaN + "&cedula=" + $cedula);
    } else {
        alert('No Rebice los datos')
    }
}


function detalle(cod) {

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('detallePedido').innerHTML= this.responseText;
        }
    };
    xmlhttp.open("POST", "metodosPedidos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opc=listar&codigo=" +cod);

}


var lista = new Array();

function facturas(cod, val) {
    if (val.checked == true) {
        lista.push(cod);
    } else {
        var pos = lista.indexOf(cod)
        lista.splice(pos, 1);
        console.log(lista)
    }

}

function factura() {
    if (lista.length > 0) {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('detallePedido').innerHTML= this.responseText;
            }
        };
        xmlhttp.open("POST", "metodosPedidos.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("opc=crear&lista=" +JSON.stringify(lista), true);
    } else {
        alert('Debe selecionar uno o mas pedidos ')
    }
}