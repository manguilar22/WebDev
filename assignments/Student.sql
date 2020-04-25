/*


EMAIL <===> USERNAME

 */


CREATE TABLE Student (
    Sid INT NOT NULL AUTO_INCREMENT,
    Sfname CHAR(20),
    Smname CHAR(20),
    Slname CHAR(20),
    Semail VARCHAR(20),
    Sclassification VARCHAR(20),
    Sresidency_status VARCHAR(20),
    Sgender VARCHAR(1),
    Smajor_gpa DECIMAL(4,2),
    Sover_all_gpa DECIMAL(4,2),
    Spassword VARCHAR(100),
    PRIMARY KEY (id)
) ENGINE=InnoDB;




INSERT INTO student(
Sfname,
Smname,
Slname,
Semail,
Sclassification,
Sresidency_status,
Sgender,
Smajor_gpa,
Sover_all_gpa,
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
 Sid,
 Sfname,
 Smname,
 Slname,
 Semail,
 Sclassification,
 Sresidency_status,
 Sgender,
 Smajor_gpa,
 Sover_all_gpa,
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

