<form method="post" action="#">
    <div>
        <label for="nom">Nom&nbsp; : </label>
        <input type="text" name="nom" value="<?php if(isset($nom)) echo $nom; ?>" />
    </div>
    <div>
        <label for="prenom">Prénom&nbsp; : </label>
        <input type="text" name="prenom" value="<?php if(isset($prenom)) echo $prenom; ?>" />
    </div>
    <div>
        <label for="email">Mail&nbsp; : </label>
        <input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" />
    </div>
    <div>
        <label for="motDePasse">Mot de passe&nbsp; : </label>
        <input type="password" name="motDePasse"/>
    </div>
    <div>
        <input type="reset" value="Effacer" />
        <input type="submit" value="Envoyer" />
    </div>
    <input type="hidden" name="frmRegistration" />
</form>
