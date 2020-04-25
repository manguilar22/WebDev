/*
    Create New Jobs as a ADMIN
 */


DELIMITER //
CREATE PROCEDURE new_jobRole(
    IN jobTitle VARCHAR(2),
    IN className VARCHAR(20),
    IN classCRN VARCHAR(10)
)
BEGIN
INSERT INTO role(RjobTitle,RclassName,RclassCRN) VALUES (
            jobTitle,
            className,
            classCRN
            );
END; //
DELIMITER ;

/*
	Insert student record to database
*/

DELIMITER //
CREATE PROCEDURE new_student(
	IN firstName CHAR(20),
	IN middleName CHAR(20),
	IN lastName CHAR(20),
	IN email VARCHAR(20),
	IN classification VARCHAR(20),
	IN ResidencyStatus VARCHAR(20),
	IN gender VARCHAR(1),
	IN majorGPA DECIMAL(4,2),
	IN overallGPA DECIMAL(4,2),
	IN password VARCHAR(100)
)
BEGIN 
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
        firstName,
        middleName,
        lastName,
        email,
        classification,
        residencyStatus,
        gender,
        majorGPA,
        overallGPA,
        password
    );
END; // 
DELIMITER ;

CALL new_student("first","","last","demo","undergraduate","in-state","M",3.33,2.22,"demo1");
