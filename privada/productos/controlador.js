$(document).on("ready", function () {
});

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
            break;
    }
}


async function onButtonClicked() {
    let files = await selectFile("image/*", true);
    document.getElementById('imagen').innerHTML =
        files.map(file => `<img id='img' src="${URL.createObjectURL(file)}" 
        ">`).join('');
}


function hola(event) {
    var selectedFile = document.getElementById('filesA').files[0];
    var reader = new FileReader();

    var imgtag = document.getElementById("imgA");
    imgtag.title = selectedFile.name;

    reader.onload = function (event) {
        imgtag.src = event.target.result;
    };

    reader.readAsDataURL(selectedFile);
}


function guardarProducto() {
    document.getElementById('opc').value = 'crear';
    var formData = new FormData($("#formProducto")[0]);
    $.ajax({
        url: 'metodos.php',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
    }).done(function (resp) {
        res = resp.indexOf('**T**');
        if (res != -1) {
            alert("PRODUCTO CREADO")
            document.location.reload();
        } else {
            res = resp.indexOf('**N**');
            if (res != -1) {
                alert("EL NOMBRE ES EL MISMO");
            } else {

                alert('r no se pudo guardar>>' + res)
            }

        }
    });

}

function buscar(txt) {
    if (txt.length >= 1) {
        document.getElementById('opc').value = 'buscar';
        var formData = new FormData($("#formProducto")[0]);
        $.ajax({
            url: 'metodos.php',
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


function eliminar(cod) {
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
                alert("PRODUCTO ELIMINADO")
                document.location.reload();
            } else {
                alert('NO SE PUDO ELIMINAR' + res)
            }

        }
    };
    xmlhttp.open("POST", "metodos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opc=eliminar&cod=" + cod);
}



function buscarAct(txt) {
    if (txt.length >= 1) {
        document.getElementById('opc').value = 'buscarAct';
        var formData = new FormData($("#formProducto")[0]);
        $.ajax({
            url: 'metodos.php',
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


function actualizarProducto() {
    document.getElementById('opc').value = 'actualizar';
    var formData = new FormData($("#formProducto")[0]);
    $.ajax({
        url: 'metodos.php',
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
    }).done(function (resp) {
        res = resp.indexOf('**T**');
        if (res != -1) {
            alert("PRODUCTO ACTUALIZADO")
            document.location.reload();
        } else {
                alert('r no se pudo actualizar>>' + res)
            }
    });

}