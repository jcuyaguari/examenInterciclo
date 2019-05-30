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


