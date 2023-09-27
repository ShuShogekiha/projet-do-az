<?php

namespace app\core\controllers;

class LogoutController {
    
    public static function getViewLogout(): void {
        session_start();
        session_destroy();

        header("location: ./index.php");
    }
}