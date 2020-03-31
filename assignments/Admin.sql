/*

    Coordinator & Admin Entities

 */


CREATE TABLE SuperUsers (
    id INT NOT NULL AUTO_INCREMENT ,
    Sfname CHAR (10),
    Slname CHAR (10),
    Susername VARCHAR (20),
    Spassword VARCHAR (20),
    Sstatus VARCHAR (20),
    PRIMARY KEY (id);
) ENGINE=InnoDB;

/*  ADMIN or COORDINATOR, depending on role permissions are granted*/


/**
    ADMIN ROLE
*/

INSERT INTO SuperUsers(
    Sfname,
    Slname,
    Susername,
    Spassword,
    Sstatus
) VALUES (
    "Ms.",
    "Important",
    "admin",
    "admin1",
    "ADMIN"
);

/**
    Coordinator
 */

INSERT INTO SuperUsers(
    Sfname,
    Slname,
    Susername,
    Spassword,
    Sstatus
) VALUES (
    "Mr.",
    "Important",
    "coor",
    "coor1",
    "COORDINATOR"
);