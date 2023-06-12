<?php

namespace App\Repository;

class Database
{

    public static function getConnection()
    {
        return new \PDO("mysql:host=localhost;dbname=blog_nisreen", "root", "@nisreen123456@");

    }
}