
/*
    Job Roles that will be posted.
 */



 CREATE TABLE Role (
    id INT NOT NULL AUTO_INCREMENT,
    RjobTitle VARCHAR (2),
    RclassName VARCHAR (20),
    RclassCRN VARCHAR (10),
    PRIMARY KEY (id)
 ) ENGINE=Innodb;


 INSERT INTO Role(RjobTitle,RclassName,RclassCRN) VALUES ("IA","Adv. Object Oriented Programming","11111");