CREATE TABLE Application (
    Aapplication_id INT NOT NULL AUTO_INCREMENT,
    Acredit_hours INT NOT NULL,
    Anumber_of_hours INT NOT NULL,
    Aapplication_period VARCHAR(20) DEFAULT 'FALL',
    Acurrent_position VARCHAR(50) NOT NULL,
    Aresume LONGBLOB NOT NULL,
    Atranscript LONGBLOB NOT NULL,
    Areference_letter LONGBLOB NOT NULL,
    AprofileImage LONGBLOB NOT NULL,
    AprofileImageType VARCHAR(25) NOT NULL,
    Astudent_id INT NOT NULL,
    AstudentJobs VARCHAR(100) NOT NULL,
    Astatus VARCHAR(100) DEFAULT "In Review",
    PRIMARY KEY (Aapplication_id)
)Engine=InnoDB;



CREATE TABLE FILLS_OUT (
    ApplicationID INT NOT NULL,
    StudentID INT NOT NULL
    timestamp DATE
)ENGINE=InnoDB;
