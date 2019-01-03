<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 03/01/2019
 * Time: 10:15
 */

namespace App\Tables;


use App\Database;

class User extends Table
{
    protected static $_table = "user";

    public function addUser($lastname, $firstname, $password, $email)
    {
        $db = new Database();
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->getPDO()->prepare("INSERT INTO user (lastname, firstname, password, email) VALUES (:lastname, :firstname, :password, :email)");
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':password', $pass_hache);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $db->closeConnection();

    }

    public function verifPassword($pass1, $pass2){

    }


}