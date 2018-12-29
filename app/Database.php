<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 27/12/2018
 * Time: 22:45
 */

namespace App;

use \PDO;

class Database
{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host.';charset=utf8', $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $pdo;
    }

    public function query($statement)
    {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

}