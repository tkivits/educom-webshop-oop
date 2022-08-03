<?php

class Util
{
    public static function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public static function logError($msg) 
    {
        echo "LOG TO SERVER: ".$msg;
    }
    public static function getGETvar($var)
    {
        $variable = $_GET[$var];
        return $variable;
    }
}

?>