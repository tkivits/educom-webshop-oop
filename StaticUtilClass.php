<?php

class Util
{
    public static function getGETvar($var)
    {
        if (empty($_GET[$var]))
        {
            $variable = NULL;
        } else {
            $variable = $_GET[$var];
        }
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