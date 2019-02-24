<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 20/02/2019
 * Time: 13:04
 */

namespace App\Model;



use App\Database;

class PaypalPayment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function order($pid,$idUser,$payerID,$paymentID,$token,$amount ){
        $pdo = $this->db->getPDO();
        $stmt = $pdo->prepare("insert into video_order(pid,idUser,payerID,paymentID,token,created,amount) VALUES(:pid, :idUser,:payerID,:paymentID,:token,LOCALTIME(),:amount) ");
        $stmt->bindParam("pid",$pid);
        $stmt->bindParam("idUser",$idUser);
        $stmt->bindParam("payerID",$payerID);
        $stmt->bindParam("paymentID",$paymentID);
        $stmt->bindParam("token",$token);
        $stmt->bindParam("amount",$amount);
        $res = $stmt->execute();
        $this->db->closeConnection();
        return $res;
    }


}