var katass = document.getElementById('katass');
var tabless = document.getElementById('tabless');

katass.addEventListener('keyup', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            tabless.innerHTML= xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/tablePasien.php?katass=' + katass.value, true);
    xhr.send();
});