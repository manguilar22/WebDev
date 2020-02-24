<?php

/*
 *  Text Validation from Forms
 */



class Sanitizer
{


    public function __construct()
    {
    }


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
