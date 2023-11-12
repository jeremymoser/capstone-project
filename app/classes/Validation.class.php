<?php

class Validation
{

    /* --- METHODS --- */

    public static function testInput($data)
    {
        $data = trim($data);
        $data = strip_tags($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    public static function displayInput($data)
    {
        $data = stripslashes($data);
        $data = htmlspecialchars_decode($data);
        $data = trim($data);

        return $data;
    }
}