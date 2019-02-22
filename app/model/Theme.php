<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 30/12/2018
 * Time: 22:05
 */

namespace App\Model;


class Theme extends Table
{
    protected $table = "theme";

    public function getThemesList() {
        return $this->db->queryAll("SELECT * FROM " .$this->table, __CLASS__);
    }


}