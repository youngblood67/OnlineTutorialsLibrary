<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 03/01/2019
 * Time: 10:15
 */

namespace App\Model;


use App\Database;

class User extends Table
{
    protected $table = "user";
    protected $db;

    public function addUser($lastname, $firstname, $password, $email)
    {
        $db = new Database();
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->getPDO()->prepare("INSERT INTO ".$this->table."  (lastname, firstname, password, email) VALUES (:lastname, :firstname, :password, :email)");
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':password', $pass_hache);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $db->closeConnection();

    }

    public function isSubscribed($email){
        $db = new Database();
        $query = $db->queryAll("SELECT * FROM user ", __CLASS__);
        return $query;
    }

    public static function connection($email, $pass)
    {
        $db = new Database();
        $query = $db->querySingle("SELECT * FROM user where email = '" . $email . "'", __CLASS__);
        $passwordInDb = $query->password;
        return password_verify($pass, $passwordInDb);

    }

   public static function getUserByEmail($email){
       $db = new Database();
       $query = $db->queryAll("SELECT * FROM user where email = '" . $email . "'", __CLASS__);
       return $query;
   }

}