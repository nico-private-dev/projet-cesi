<form action="?page=action-add-post" method="post" class="container col-6">
    <select class="form-select" name="user_id" id="">
        <option value="" disabled>Selectionnez un user</option>
        <?php

        foreach ($users as $key => $user) {
            echo  "<option value='1'>" . $user['user_id'] . "</option>";
        }

        ?>
    </select>
    <input type="date" name="limit_date" id="">
    <div class="row d-flex justify-content-center">
        <div class="d-flex justify-content-center">
            <input type="text" name="url_full" id="url-full">
            <input type="submit" value="Générer">
        </div>
    </div>
</form>