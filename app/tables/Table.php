<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 30/12/2018
 * Time: 22:45
 */

namespace App\Tables;

use App\App;
use App\Database;

class Table
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {

        return $this->db->query("SELECT * FROM " . $this->table, get_called_class());
    }
}