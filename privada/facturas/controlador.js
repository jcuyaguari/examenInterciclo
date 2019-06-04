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
function detalleFAC(cod) {
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('detFac').innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", "metodos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opc=listar&codigo=" + cod);

}

function cambiarEstado(cod, val) {
    var strUser = val.options[val.selectedIndex].value;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.location.reload();
        }
    };
    xmlhttp.open("POST", "metodos.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("opc=actualizar&codigo=" + cod+"&nuevo="+strUser);
}
