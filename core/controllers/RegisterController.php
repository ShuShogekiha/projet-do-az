<?php

namespace app\core\controllers;

class RegisterController {
    
    public static function getViewRegister(): void {
        require_once('./core/views/register.php');
    }
}