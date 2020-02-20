<?php

/*
 *  Text Validation from Forms
 */



class Sanitizer
{


    public function __construct()
    {
    }


    public function checkDatabaseForExistingStudentAccount($studentEmail)
    {
        // https://stackoverflow.com/questions/3232607/pass-mysql-connection-to-function

        //$db = new mysqli("172.17.0.2","root","password","test"); // DELETE ME

        $findStudent = "SELECT COUNT(*) FROM Student WHERE Semail LIKE ".$studentEmail;

        $query = $db -> query($findStudent);

        $result = $query->fetch_array()[0];

        return $result;

    }


}

?>
