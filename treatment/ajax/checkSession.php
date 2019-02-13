<?php 
    
     if (!isset($_SESSION['con'])) {
        echo 1;
    } else {
        if (\App\Model\User::isSubscribed($_SESSION['email']) /*|| $vid->priceVideo <= 0*/){
            echo 2;
        }else {
            echo 3;
        }

    }


?>