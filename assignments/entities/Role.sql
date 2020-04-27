
/*
    Job Roles that will be posted.
 */



 CREATE TABLE role (
    id INT NOT NULL AUTO_INCREMENT,
    RjobTitle VARCHAR(2),
    RclassName VARCHAR(20),
    RclassCRN VARCHAR(10),
    PRIMARY KEY (id) /* Original Key: id */
 ) ENGINE=Innodb;


	INSERT INTO role (
		RjobTitle,
		RclassName,
		RclassCRN
	) VALUES (
		"TA",
		"Database Management",
		"27411"
	),
	(
		"IA",
		"Database Management",
		"27411"
	),
	(
		"TA",
		"Computer Arch.",
		"26014"
	);