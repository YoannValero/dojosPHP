<?php 



if (!empty($_POST) && !empty($_POST['email'])) {
    $db = App::getDatabase();
    $auth = App::getAuth();
    $session = Session::getInstance();

    if ($auth->resetPassword($db, $_POST['email'])) {
        $session->setFlash('success', "Les instructions du rappel du mot de passe vous ont été envoyé par email" );
        App::redirect('index.php?page=login');

    } else {
        $session->setFlash('danger', "Aucun compte ne correspond à cette adresse");
    }
    
}
?>

<h1> Mot de passe oublié </h1>

<form action="" method='POST'>

    <div class="form-group">
        <label for="">email</label>
        <input type="email" name="email" class="form-control"  />
    </div>
 

    <button type='submit' class="btn btn-primary">Envoyer mdp</button>


</form>

