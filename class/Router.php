<?php

class Router  {

    public function __construct($target, $valueInitIndex) {
        $this->getTemplate($target, $valueInitIndex);
    }
    
    public function getTemplate($target, $valueInitIndex) {

        if (empty($_GET)) {  // if $_GET is empty, accueil.php is loaded
            include "template/$valueInitIndex";
        } else if (isset($_GET['page'])) {
            if (array_key_exists($_GET['page'], $target)) {
                include "template/".$_GET['page'].".php";
            } else {
                echo "<h1 style='color:black;'>Page not Found<br>
                    Tu croivais quoi, tu croivais pouvoir m'avais avoir ?</h1>";
            }
        }
    }
}   