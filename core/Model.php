<?php

namespace Core;

use App\Config;
use PDO;
use PDOException;

/**
 * Base model
 * 
 * PHP version 8.0
 */
abstract class Model
{
  /**
   * Get the PDO database connection
   * 
   * @return mixed
   */
  protected static function getDB()
  {
    static $db = null;

    if ($db === null) {
      $host = Config::DB_HOST;
      $dbname = Config::DB_NAME;
      $username = Config::DB_USER;
      $password =  Config::DB_PASSWORD;

      try {
        
        $db = new PDO("mysql:host=$host;dbname=$dbname;chartset=utf8", $username, $password);

        return $db;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
  }
}
