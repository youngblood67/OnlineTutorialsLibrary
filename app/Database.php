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

    public function __construct($db_name = 'db_tutos_videos', $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPDO()
    {
        if ($this->pdo === null) {
            $this->pdo = new PDO("mysql:dbname={$this->db_name};host={$this->db_host};charset=utf8", $this->db_user, $this->db_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }

    public function queryAll($sql, $className)
    {
        $req = $this->getPDO()->query($sql);

        $datas = $req->fetchAll(PDO::FETCH_CLASS, $className);
        $this->closeConnection();
        
        return $datas;
    }

    public function querySingle($sql, $className)
    {
        $req = $this->getPDO()->query($sql);

        $datas = $req->fetchAll(PDO::FETCH_CLASS, $className);
        $this->closeConnection();
        if(empty($datas))return null;
        else return $datas[0];
    }

    public function delete($sql){
        $pdo = $this->getPDO();
        $pdo->exec($sql);
        return 1;
    }

    public function closeConnection()
    {
        $this->pdo = null;
    }

}