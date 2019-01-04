<div id="container">
    <div class="row justify-content-center">
        <form method="post" action="../treatment/trtCreateUser.php">

            <div class="form-group ">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname">
            </div>
            <div class="form-group ">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" id="firstname" placeholder="Prénom" name="firstname">
            </div>

            <div class="form-group ">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group ">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
            </div>
            <div class="form-group ">
                <button type="submit" class="btn btn-primary ">S'enregistrer</button>
            </div>
            
        </form>
    </div>
    
</div>
