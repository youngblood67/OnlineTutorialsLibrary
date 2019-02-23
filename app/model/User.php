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
        $stmt = $db->getPDO()->prepare("INSERT INTO " . $this->table . "  (lastname, firstname, password, email) VALUES (:lastname, :firstname, :password, :email)");
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':password', $pass_hache);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $db->closeConnection();
    }

    public static function getUser($email)
    {
        $db = new Database();
        $user = $db->querySingle("SELECT * FROM user WHERE email = '" . $email . "'", __CLASS__);
        return $user;
    }

    public static function getIdUser($email)
    {
        $db = new Database();
        $user = $db->querySingle("SELECT * FROM user WHERE email = '" . $email . "'", __CLASS__);
        return $user->idUser;
    }

    public static  function  verifyIfUserExist($email){
        $db = new Database();
        $user = $db->querySingle("SELECT count(*) as count FROM user WHERE email = '" . $email . "'", __CLASS__);
        return $user->count;
    }

    public static function addSubscription($idUser, $type)
    {
        $db = new Database();
        $stmt = $db->getPDO()->prepare("INSERT INTO usersubscription (idSubscription, idUser, startDate) VALUES (:idSubscription, :idUser, NOW())");
        $stmt->bindParam(':idSubscription', $type);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->execute();
        $db->closeConnection();
        return $type;
    }

    public static function isSubscribed($email)
    {
        $idUser = self::getUser($email)->idUser;
        $db = new Database();
        $query = $db->queryAll("SELECT * FROM usersubscription WHERE idUser = {$idUser}", __CLASS__);
        if (empty($query)) {
            return 0;
        } else {
            return 1;
        }

    }

    public static function getStatus($email = "none")
    {
        if (self::getUser($email) != null) {
            $idUser = self::getUser($email)->idUser;

            //verifier si $idUSer est dans usersubscription si oui alors retourne typeSubscription else return 0
            $db = new Database();
            if (self::isSubscribed($email)) {
                $query = $db->querySingle("SELECT *
            FROM user u,usersubscription us, subscription s
            WHERE u.idUser = us.idUser
            AND s.idSubscription = us.idSubscription
            AND u.idUser = {$idUser}", __CLASS__);
                return $query->typeSubscription;
            }
        } else {
           session_destroy();
            return 0;
        }


    }

    public static function connection($email, $pass)
    {
        $db = new Database();
        $query = $db->querySingle("SELECT * FROM user where email = '" . $email . "'", __CLASS__);
        $passwordInDb = $query->password;
        return password_verify($pass, $passwordInDb);

    }

}