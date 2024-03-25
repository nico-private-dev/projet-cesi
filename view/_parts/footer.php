</body>
<script>

document.addEventListener('DOMContentLoaded', function () {
        let bouton = document.getElementById('boutonCopie');
        bouton.addEventListener('click', function () {
            let texte = document.getElementById('texteACopier').innerText; 
            let tempInput = document.createElement('input'); 
            tempInput.style = 'position: absolute; left: -1000px; top: -1000px'; 
            document.body.appendChild(tempInput); 
            tempInput.value = texte;
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput); 
            alert('Texte copié : ' + texte); 
        });
    });</script>
</html>