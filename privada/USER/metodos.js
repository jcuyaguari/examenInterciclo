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
