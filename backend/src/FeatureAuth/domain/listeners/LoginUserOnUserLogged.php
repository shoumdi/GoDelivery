<?php
namespace App\FeatureAuth\domain\listeners;

class LoginUserOnUserLogged {
    public function __invoke()
    {
        echo "login";
    }
}