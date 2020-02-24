
/*

    Coordinator and Admin Entities

 */


CREATE TABLE SuperUsers (
    Sid INTEGER ,
    Sfname CHAR (10),
    Slname CHAR (10),
    Susername VARCHAR (20),
    Spassword VARCHAR (20),
    Sstatus VARCHAR (20)
);

/*  ADMIN or COORDINATOR, depending on role permissions are granted*/