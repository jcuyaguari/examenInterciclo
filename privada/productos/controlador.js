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
        style="width: 383px; height: 245px;">`).join('');
}

function selectFile(contentType, multiple) {
    return new Promise(resolve => {
        let input = document.createElement('input');
        input.type = 'file';
        input.multiple = multiple;
        input.accept = contentType;

        input.onchange = _ => {
            let files = Array.from(input.files);
            if (multiple)
                resolve(files);
            else
                resolve(files[0]);
        };

        input.click();
    });
}

function guardarProducto() {
    var img = document.getElementById('img');
    if (img != null) {
        var nombre = document.getElementById('nombre').value;
        var tipo = document.getElementById('tipo').value;
        var precio = document.getElementById('precio').value;
        var stock = document.getElementById('stock').value;
        var img = document.getElementById('img').src;

        if (nombre != "" && tipo != "" && precio != "" && stock != "" && stock != "") {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                }
            };
            xmlhttp.open("GET", "metodos.php?opc=crear&nombre=" + nombre + "&tipo=" + tipo + "&precio=" + precio +
                "&stock=" + stock + "&img=" + img, true);
            xmlhttp.send();
        } else {
            alert('Rebice los datos')
        }
    } else {
        alert("Carge la Imagen")
    }
}

var reader = new window.FileReader();
reader.readAsDataURL(blob);
reader.onloadend = function () {
    base64data = reader.result;
    console.log(base64data);
}