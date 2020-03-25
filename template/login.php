<?php 

$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);

if ($auth->user()) {
    App::redirect('index.php?page=account');
}
if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {

    $user = $auth->login($db, $_POST['username'], $_POST['password'], isset($_POST['remember']));
    $session = Session::getInstance();
    if ($user) {
        $session->setFlash('success', 'Vous êtes maintenant connecté');
        App::redirect('index.php?page=account');
    } else {
        $session->setFlash('danger', 'Identifiant ou mot de passe incorrecte');

    }
}
?>

<h1> Se connecter </h1>

<form action="" method='POST'>

    <div class="form-group">
        <label for="">Pseudo ou email</label>
        <input type="text" name="username" class="form-control"  />
    </div>
 
    <div class="form-group">
        <label for="">Password <a href="index.php?page=forget">(J'ai oublié mon mot de passe)</a></label>
        <input type="password" name="password" class="form-control"  />
    </div>

    <div class="form-group">
        <input type="checkbox" name="remember" id='remember' value='1' />
    <label for="remember">Se souvenir de moi</label>
       
    </div>

    <button type='submit' class="btn btn-primary">Se connecter</button>


</form>

