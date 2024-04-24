<section class="container">
    <form action="?page=action_create_account" method="post" id="form-register">

        <div class="row d-flex justify-content-center">

            <div class="col-6 ">
                <fieldset class="border border-5 p-4 m-4 border-primary">
                    <h1 class="text-center">CRÉÉE TON COMPTE</h1>
                    <div>
                        <label class="col-form-label " for="inputDefault">Nom de famille</label>
                        <input type="text" class="form-control" placeholder="DUPONT" id="inputDefault" name="lastname" required>
                    </div>
                    <div>
                        <label class="col-form-label mt-4" for="inputDefault">Prénom</label>
                        <input type="text" class="form-control" placeholder="Jean" id="inputDefault" name="firstname" required>
                    </div>
                    <div>
                        <label for="exampleInputEmail1" class="form-label mt-4">Adresse Email (en @fim-online.net ou @normandie.cci.fr)</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="jdupond@fim-online.net" name="email" required>
                    </div>
                    <div>
                        <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
                        <input type="password" class="form-control" id="input-password" pattern="/^(?=.*[!&:@])[\x20-\x7E]{10,}$/" placeholder="Mots de passe" autocomplete="off" name="password" required>
                    </div>
                    <div>
                        <label for="accept-cgu" class="form-label mt-4"><input type="checkbox" id="accept-cgu" name="accept-cgu" required> En cochant la case vous indiquez accepter <a href="?page=cgu">les conditions d'utilisation de l'outils</a></label>
                        
                    </div>
                    <div class="d-flex justify-content-end mt-4 ">
                        <button type="submit" id="btn-sub" class="btn btn-primary hover-bg-secondary hover-submit">CRÉÉE MON COMPTE</button>
                    </div>
                </fieldset>
            </div>
        </div>

    </form>
</section>

<script>
    let btnSub = document.querySelector("#btn-sub");
    let form = document.querySelector("#form-register")
    btnSub.addEventListener("click", (e) => {
        e.preventDefault();
        let pass = document.querySelector("#input-password");
        console.log(pass.value);
        const regex = /^(?=.*[!&:@])[\x20-\x7E]{10,}$/
        if(!regex.test(pass.value)) {
            // alert('Votre mot de passe doit faire au moins 10 caracteres et contenir au moins 1 de ces caracteres !&:@ ');
            generateFlash("warning",'Votre mot de passe doit faire au moins 10 caracteres et contenir au moins 1 de ces caracteres !&:@ ');
        } else {
            // if match
            form.submit();
        }

    })



</script>