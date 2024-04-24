<div class="bg-light py-3 mt-3 footer">
    <footer class="container">
        <div class="row d-flex justify-content-between">
            <div>
                <h3>Réalisé par</h3>
                <div class="d-flex justify-content-evenly py-2">
                    <span>Paul Biret</span>
                    <span>Grégoire Fertre</span>
                    <span>Nicolas Forget</span>
                    <span>Finalisation et retouche - Benoît MOTTIN</span>

                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-evenly ">
                <span>ceci est un projet pédagogique</span>
                <span>&copy; FIM CCI Formation 2024</span>
                <span><a href="?page=cgu">Condition Général d'Utilisation</a></span>
                <span><a href="?page=pdc">Politique de confidentialité</a></span>
                <span><a href="?page=a-propos">à propos</a></span>
            </div>
        </div>
    </footer>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<script src="/public/js/tools.js"></script>
<script>

    /*
      Check the input
      Check here if the password is 10 char long

     */
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionnez votre champ de saisie d'email par son ID ou sa classe
        let emailInput = document.getElementById('email');



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