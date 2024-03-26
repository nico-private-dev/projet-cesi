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

    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez votre champ de saisie d'email par son ID ou sa classe
    let emailInput = document.getElementById('email');

    // Fonction pour vérifier si l'email est valide
    function validateEmail(email) {
        let regex = /^[^@]+@(fim-online\.net|normandie\.cci\.fr)$/;
        return regex.test(email);
    }

    // Attachez un écouteur d'événements pour valider l'email
    emailInput.addEventListener('input', function() {
        let email = emailInput.value;
        if (validateEmail(email)) {
            // Si l'email est valide, retirez la classe is-invalid si elle est présente
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid'); // Optionnel: ajoutez la classe is-valid pour indiquer visuellement la validité
            emailInput.setCustomValidity('');
        } else {
            // Si l'email n'est pas valide, ajoutez la classe is-invalid
            emailInput.classList.add('is-invalid');
            emailInput.classList.remove('is-valid'); // Assurez-vous de retirer la classe is-valid si elle est présente
            emailInput.setCustomValidity('Veuillez entrer une adresse e-mail qui appartient à fim-online.net ou normandie.cci.fr');
        }
    });
});


    </script>
</html>