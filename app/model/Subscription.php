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

}