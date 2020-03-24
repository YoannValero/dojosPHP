<?php 


App::getAuth()->logout();
Session::getInstance()->setFlash('warning', "Vous vous êtes déconnecté" );

App::redirect('index.php?page=login');
