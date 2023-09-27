<?php

namespace app\core\controllers;

class AddItemController {
    
    public static function getViewAddItem(): void {
        require_once('./core/views/AddItem.php');
    }
}