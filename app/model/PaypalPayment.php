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

    public function order($idUser,$payerID,$paymentID,$token,$pid ){
        $pdo = $this->db->getPDO();
        $stmt = $pdo->prepare("insert into video_order(pid,idUser,payerID,paymentID,token,created) VALUES(:pid, :idUser,:payerID,:paymentID,:token,CURRENT_DATE()) ");
        $stmt->bindParam("idUser",$idUser);
        $stmt->bindParam("payerID",$payerID);
        $stmt->bindParam("paymentID",$paymentID);
        $stmt->bindParam("pid",$pid);
        $stmt->bindParam("token",$token);
        $stmt->execute();
        $this->db->closeConnection();
    }


}