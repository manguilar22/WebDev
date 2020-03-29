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
                    SmajorGPA,
                    SoverallGPA,
                    Spassword
                    ) VALUES (
                        "user",
                        "N/A",
                        "user",
                        "user@user1.com",
                        "undergraduate",
                        "in-state",
                         3.33,
                         3.33,
                         "user1"
                    )