<?php

$db = App::getDatabase();


if (App::getAuth()->confirm($db, $_GET['id'], $_GET['token']) ) {
    Session::getInstance()->setFlash('success', "Votre compte a bien été validé" );
    App::redirect('index.php?page=account.php');
} else {
    Session::getInstance()->setFlash('danger', "Ce token n'est plus valide" );
    App::redirect('index.php?page=login.php');
}
