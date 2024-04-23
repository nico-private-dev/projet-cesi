<section class="container">
    <form action="?page=action_create_account" method="post">

        <div class="row d-flex justify-content-center">

            <div class="col-6 ">
                <fieldset class="border border-5 p-4 m-4 border-primary">
                    <h1 class="text-center">CRÉÉE TON COMPTE</h1>
                    <div>
                        <label class="col-form-label " for="inputDefault">Nom de famille</label>
                        <input type="text" class="form-control" placeholder="DUPONT" id="inputDefault" name="lastname">
                    </div>
                    <div>
                        <label class="col-form-label mt-4" for="inputDefault">Prénom</label>
                        <input type="text" class="form-control" placeholder="Jean" id="inputDefault" name="firstname" require>
                    </div>
                    <div>
                        <label for="exampleInputEmail1" class="form-label mt-4">Adresse Email (en @fim-online.net ou @normandie.cci.fr)</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="jdupond@fim-online.net" name="email" require>
                    </div>
                    <div>
                        <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mots de passe" autocomplete="off" name="password" require>
                    </div>
                    <div>
                        <label for="accept-cgu" class="form-label mt-4"><input type="checkbox" id="accept-cgu" autocomplete="off" name="accept-cgu" require> En cochant la case vous indiquez accepter <a href="?page=cgu">les conditions d'utilisation de l'outils</a></label>
                        
                    </div>
                    <div class="d-flex justify-content-end mt-4 ">
                        <button type="submit" class="btn btn-primary hover-bg-secondary hover-submit">CRÉÉE MON COMPTE</button>
                    </div>
                </fieldset>
            </div>
        </div>

    </form>
</section>