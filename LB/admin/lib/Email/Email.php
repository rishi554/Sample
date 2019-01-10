<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Email
 *
 * @author PHP Developers
 */
class Email {

    function Sent($to,$subject,$message) {

        $header = "From:uae@gmail.com \r\n";
        $header .= "Cc:rushi.techmainstay@gmail.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($to, $subject, $message, $header);

        if ($retval == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
