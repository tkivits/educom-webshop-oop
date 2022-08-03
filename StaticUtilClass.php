<?php

class Util
{
    public static function getGETvar($var)
    {
        $variable = $_GET[$var];
        return $variable;
    }
    public static function getPOSTvar($var)
    {
        $variable = $_POST[$var];
        $variable = trim($variable);
        $variable = stripslashes($variable);
        $variable = htmlspecialchars($variable);
        return $variable;
    }
    public static function logError($msg) 
    {
        echo "LOG TO SERVER: ".$msg;
    }
}

?>