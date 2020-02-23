
/*

    Coordinator and Admin Entities

 */


CREATE TABLE SuperUsers (
    Sid INTEGER ,
    Sfname CHAR (10),
    Slname CHAR (10),
    Susernmae VARCHAR (20),
    Spassword VARCHAR (20),
    Sstatus VARCHAR (10),           /*  ADMIN or COORDINATOR, depending on role permissions are granted*/
);
