var keywords = document.getElementById('keywords');
var tabels = document.getElementById('tabels');

keywords.addEventListener('keyup', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            tabels.innerHTML= xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/tableApoteker.php?keywords=' + keywords.value, true);
    xhr.send();
});