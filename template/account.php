<?php
/**
 * Va permettre de restreindre les utilisateurs en cas de problèmes
 * classe qui permet d'initialiser les autres classes = factory
 */
App::getAuth()->restrict();

$db = App::getDatabase();

if (!empty($_POST)) {
    if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
        $_SESSION['flash']['danger'] = "Les mdp ne correspondent pas";
    } else {
        $user_id = $_SESSION['auth']->id;
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
 
        $user = $db->query("UPDATE users SET password = ? WHERE id_user = ?",[$password, $user_id]);
        $_SESSION['flash']['success'] = "Votre mdp a bien été mis a jour";
        App::redirect('index.php?page=account');
        exit();
    }
}
?>


<h1> <?php echo "Bonjour " . ucfirst($_SESSION['auth']->username); ?> </h1>
<pre>
    il 
    se 
    passe
    beaucoup 
    de chose 
    quand on est connecté
</pre>
<h2> Mon compte </h2>

<h3> Gestion de mon mot de passe : </h3>

<form action="" method="POST">

    <div class='form-group'>
        <input class='form-control' type='password' name='password' placeholder='changer de mdp' />
    </div>
    <div class='form-group'>
        <input class='form-control' type='password' name='password_confirm' placeholder='confirmation de mdp' />
    </div>
   
    <button class="btn btn-primary">Changer de mdp</button>
</form>


