<h2>Login</h2>

<form action="?page=action-login" method="post">
    <input type="hidden" name="is_admin">
    <label for="login" class="form-label mt-4">Adresse courriel</label>
    <input type="email" class="form-control" name="login" id="login" required>
    
    <label for="password" class="form-label mt-4">Mot de passe</label>
    <input type="password" class="form-control" name="password" id="password" required>
    
    <input type="submit" class="btn btn-primary my-2" value="Se connecter">
    
</form>