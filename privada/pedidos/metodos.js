function cambiar(opc) {
    switch (opc) {
        case '1':
            var element = document.getElementById('1');
            element.style.display = 'block';
            var element1 = document.getElementById('2');
            element1.style.display = 'none';
            var element2 = document.getElementById('3');
            element2.style.display = 'none';
            var element2 = document.getElementById('4');
            element2.style.display = 'none';
            break;
        case '2':
            var element = document.getElementById('1');
            element.style.display = 'none';
            var element1 = document.getElementById('2');
            element1.style.display = 'block';
            var element2 = document.getElementById('3');
            element2.style.display = 'none';
            var element2 = document.getElementById('4');
            element2.style.display = 'none';
            break;
        case '3':
            var element = document.getElementById('1');
            element.style.display = 'none';
            var element1 = document.getElementById('2');
            element1.style.display = 'none';
            var element2 = document.getElementById('3');
            element2.style.display = 'block';
            var element2 = document.getElementById('4');
            element2.style.display = 'none';
            break;
        case '4':
            var element = document.getElementById('1');
            element.style.display = 'none';
            var element1 = document.getElementById('2');
            element1.style.display = 'none';
            var element2 = document.getElementById('3');
            element2.style.display = 'none';
            var element2 = document.getElementById('4');
            element2.style.display = 'block';
            break;
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
            document.getElementById('detallePedido').innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "metodosPedidos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opc=listar&codigo=" + cod);

}
function eliminarPed(cod) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert('PEDIDO ELIMINADO');
            document.location.reload();

        }
    };
    xmlhttp.open("POST", "metodosPedidos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opc=eliminar&codigo=" + cod);
}
function enviarPed(cod){
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert('PEDIDO EN CAMINO');
            document.location.reload();
        }
    };
    xmlhttp.open("POST", "metodosPedidos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opc=enviar&codigo=" + cod);
}
function entregaPed(cod){
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            alert('PEDIDO ENTREGADO');
            document.location.reload();
        }
    };
    xmlhttp.open("POST", "metodosPedidos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opc=entregar&codigo=" + cod);
}