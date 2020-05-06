
/*
    Job Roles that will be posted.
 */

CREATE TABLE Course (
    Cid INT NOT NULL AUTO_INCREMENT,
    CjobTitle VARCHAR(2),
    CclassName VARCHAR(20),
    CclassCRN VARCHAR(10),
    PRIMARY KEY (Cid) /* Original Key: id */
 ) ENGINE=Innodb;

INSERT INTO Course (
		CjobTitle,
		CclassName,
		CclassCRN
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

 CREATE TABLE Role (
    id INT NOT NULL AUTO_INCREMENT,
    RjobTitle VARCHAR(2),
    RclassName VARCHAR(20),
    RclassCRN VARCHAR(10),
    PRIMARY KEY (id) /* Original Key: id */
 ) ENGINE=Innodb;


	INSERT INTO Role (
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