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

        $db = new mysqli("172.17.0.2","root","password","test"); // DELETEME

        $findStudent = "SELECT * FROM STUDENTS WHERE Semail LIKE ".$studentEmail;

        $query = $db -> query($findStudent);



        return 0;

    }


}

?>
