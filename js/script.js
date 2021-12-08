var keyword = document.getElementById('keyword');
var tabel = document.getElementById('tabel');

keyword.addEventListener('keyup', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            tabel.innerHTML= xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/table.php?keyword=' + keyword.value, true);
    xhr.send();
});