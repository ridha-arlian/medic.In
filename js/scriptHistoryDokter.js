var kata = document.getElementById('kata');
var table = document.getElementById('table');

kata.addEventListener('keyup', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            table.innerHTML= xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/tableHistoryDokter.php?kata=' + kata.value, true);
    xhr.send();
});