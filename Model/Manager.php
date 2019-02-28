<?php 
namespace App\Model;

use \PDO;

class Manager
{

    protected function dbConnect()
    {
        define("DNS", "localhost");
        define("DB_NAME", "galerie");
        define("USER_NAME", "root");
        define("USER_PASSWORD", "root");

        $db = new PDO("mysql:host=" . DNS . ";dbname=" . DB_NAME, USER_NAME, USER_PASSWORD, $options = []);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $db;
    }
}