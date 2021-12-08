var katas = document.getElementById('katas');
var tables = document.getElementById('tables');

katas.addEventListener('keyup', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            tables.innerHTML= xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/tableHistoryApoteker.php?katas=' + katas.value, true);
    xhr.send();
});