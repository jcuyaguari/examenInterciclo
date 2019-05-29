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

function crearlocal(){
    
}