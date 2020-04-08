/*


EMAIL <===> USERNAME

 */


CREATE TABLE Student (
    id INT NOT NULL AUTO_INCREMENT,
    SfirstName CHAR(20),
    SmiddleName CHAR(20),
    SlastName CHAR(20),
    Semail VARCHAR(20),
    Sclass VARCHAR(20),
    SResidencyStatus VARCHAR(20),
    Sgender VARCHAR(1),
    SmajorGPA DECIMAL(4,2),
    SoverallGPA DECIMAL(4,2),
    Spassword VARCHAR(100),
    PRIMARY KEY (id)
) ENGINE=InnoDB;




INSERT INTO Student(
                    SfirstName,
                    SmiddleName,
                    SlastName,
                    Semail,
                    Sclass,
                    SResidencyStatus,
                    Sgender,
                    SmajorGPA,
                    SoverallGPA,
                    Spassword
                    ) VALUES (
                        "user",
                        "N/A",
                        "user",
                        "user",
                        "undergraduate",
                        "in-state",
                        "F",
                         3.33,
                         3.33,
                         "user1"
                    );

/*
    Student Records
 */

 INSERT INTO Student(
                    SfirstName,
                    SmiddleName,
                    SlastName,
                    Semail,
                    Sclass,
                    SResidencyStatus,
                    Sgender,
                    SmajorGPA,
                    SoverallGPA,
                    Spassword
                    ) VALUES (
                        "user",
                        "N/A",
                        "user",
                        "user",
                        "undergraduate",
                        "in-state",
                        "F",
                         3.33,
                         3.33,
                         "user1"
                    ),
		            (
			            "user2",
			            "N/A",
			            "user2",
			            "user2",
                        "undergraduate",
                        "in-state",
                        "M",
                        3.40,
                        2.22,
                        "user2"
                    ),
                    (
                        "user3",
                        "N/A",
                    	"user3",
                        "user3",
                        "undergraduate",
                        "in-state",
                        "F",
                        3.40,
                        2.22,
                        "user3"
                    );