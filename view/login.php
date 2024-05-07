<div class="row d-flex justify-content-center my-4">
    <div class="col-3">
        <h2>Login</h2>
    </div>
</div>
<form action="?page=action-login" method="post">
    <div class="row d-flex justify-content-center">
        <div class="col-3">
            <label for="login" class="form-label mt-4">Adresse courriel</label>
            <input type="email" class="form-control" name="login" id="email" required>

            <label for="password" class="form-label mt-4">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" required>

            <input type="submit" class="btn btn-primary my-2" value="Se connecter">
        </div>
    </div>
</form>