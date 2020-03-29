<?php

/*
 *  Text Validation from Forms
 */



class Sanitizer
{


    public function __construct()
    {
    }


    /**
     * Basic parsing of string, using the core built-in functions.
     * @param $str
     * @return string
     */
    public function cleanInput($str)
    {
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    /**
     * Check if GPA is within a valid range
     * @param $value
     * @return mixed
     */
    public function checkGPA($value)
    {
        if ($value > 4.00 || -0 >= $value)
        {
            echo "Impossible, UTEP grade point scale is from 1.00 to 4.00 <br/>";
        }
        return $value;
    }





}

?>
