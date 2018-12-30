<?php
/**
 * Created by PhpStorm.
 * User: phili
 * Date: 30/12/2018
 * Time: 09:52
 */

namespace App\Tables;

class Video
{
    public function getUrl()
    {
        return $this->url;
    }

    public function getTitle()
    {
        return $this->title;
    }
}