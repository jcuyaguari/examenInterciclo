function cambiar(opc) {
    switch (opc) {
        case 'uno':
            var element = document.getElementById('uno');
            element.style.display = 'block';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            var element3 = document.getElementById('cuatro');
            element3.style.display = 'none';
            break;

        case 'dos':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'block';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            var element3 = document.getElementById('cuatro');
            element3.style.display = 'none';
            break;

        case 'tres':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'block';
            var element3 = document.getElementById('cuatro');
            element3.style.display = 'none';
            break;
        case 'cuatro':
            var element = document.getElementById('uno');
            element.style.display = 'none';
            var element1 = document.getElementById('dos');
            element1.style.display = 'none';
            var element2 = document.getElementById('tres');
            element2.style.display = 'none';
            var element3 = document.getElementById('cuatro');
            element3.style.display = 'block';
            break;
    }
}



function crearCliente(){
    document.getElementById('opc').value = 'crear';
    var formData = new FormData($("#crearCLiente")[0]);
    $.ajax({
        //Definimos la URL del archivo al cual vamos a enviar los datos
        url: 'crearCliente.php',
        //Definimos el tipo de método de envío
        type: 'POST',
        //Definimos la información que vamos a enviar
        data: formData, 
        //Deshabilitamos el caché
        cache: false, 
        //No permitimos que los datos pasen como un objeto
        processData: false, 
        //No especificamos el contentType
        contentType: false,
    }).done(function(resp){
        //devuelve la posicion del objeto
        res = resp.indexOf('Si');
        if (res != -1) {
            alert("USUARIO CREADO")
            document.location.reload();
        } else {
            res = resp.indexOf('No');
            if (res != -1) {
                alert("EL NOMBRE ES EL MISMO");
            } else {

                alert('NO SE PUEDE CREAR EL USUARIO' + res)
            }
        }
    });
}
  

function buscar(txt) {
    if (txt.length >= 1) {
        document.getElementById('opc').value = 'buscar';
        var formData = new FormData($("#crearCLiente")[0]);
        $.ajax({
            url: 'crearCliente.php',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
        }).done(function (resp) {
            document.getElementById('busqueda').innerHTML = resp;
        });
    } else {
        document.getElementById('busqueda').innerHTML = "";
    }
}



function cancelar(){

}



function eliminar(codigo) {
    document.getElementById('opc').value = 'eliminar';
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            resp = this.responseText;
            res = resp.indexOf('**T**');
            if (res != -1) {
                alert("USUARIO ELIMINADO")
                document.location.reload();
            } else {
                alert('NO SE PUDO ELIMINAR' + res)
            }

        }
    };
    xmlhttp.open("POST", "crearCliente.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opc=eliminar&codigo=" + codigo);
}




function actualizarCliente() {
 document.getElementById('opc').value = 'actualizar';
    var formData = new FormData($("#crearCLiente")[0]);
    $.ajax({
        url: 'crearCliente.php',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
    }).done(function (resp) {
        res = resp.indexOf('**T**');
        if (res != -1) {
            alert("USUARIO ACTUALIZADO")
            document.location.reload();
        } else {
            alert('no se pudo actualizar>>' + res)
            }
    });

    }
    



function buscarAct(txt) {
    if (txt.length >= 1) {
        document.getElementById('opc').value = 'buscarAct';
        var formData = new FormData($("#crearCLiente")[0]);
        $.ajax({
            url: 'crearCliente.php',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
        }).done(function (resp) {
            document.getElementById('actualizacion').innerHTML = resp;
        });
    } else {
        document.getElementById('actualizacion').innerHTML = "";
    }

}

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

                    location.href = '../Usuarios/controlador/CRUD_CLIENTE.php?codigo=' + $codigo;
                } else {
                    alert("USUARIO NO ENCONTRADO");
                    document.location.reload();

                }

            }
        };
        
        xmlhttp.open("POST", "../Usuarios/controlador/crearCliente.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("opc=iniciar&correo=" + $correo + "&contrasena=" + $contrasena);
    } else {
        alert('datos vacios')
    }
}

