<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 24/02/2019
 * Time: 15:47
 */

namespace App\Model;


class Subscription extends Table
{
    protected $table = "subscription";

    public function getSubscriptionById($id)
    {
        return $this->db->querySingle("SELECT * FROM " . $this->table . " WHERE typeSubscription = {$id}", __CLASS__);
    }

    public function getUserSubscriptionEndDate($idUser)
    {
        $sql = $this->db->querySingle("SELECT endDate FROM usersubscription WHERE idUser = {$idUser}", __CLASS__);
        return $sql->endDate;
    }

    public function getUserSubscriptionDayLeft($idUser)
    {
        $sql = $this->db->querySingle("SELECT datediff(us.endDate,us.startDate) as dayLeft from usersubscription us where idUser = {$idUser}", __CLASS__);
        return $sql->dayLeft;
    }

    public function deleteSubscriptionFromUser($idUser)
    {
        $this->db->delete("DELETE FROM usersubscription WHERE idUser = ".$idUser);
    }

}