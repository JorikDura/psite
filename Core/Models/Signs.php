<?php

namespace Core\Models;

use Core\Classes\Model;

class Signs extends Model
{
    public $DBName = "authorization";

    public $table= "signs";

    public $signsLogin = "login";

    public $signsPassword = "password";
}