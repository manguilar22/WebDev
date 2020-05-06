/*
    Create an application as a student
 */

DELIMITER //
CREATE PROCEDURE create_application(
    IN studentID INT,
    IN AstudentJobs VARCHAR(100),
    IN creditHours INT,
    IN numberOfHours INT,
    IN applicationPeriod VARCHAR(20),
    IN currentPosition VARCHAR(50),
    IN resume LONGBLOB,
    IN transcript LONGBLOB,
    IN referenceLetter LONGBLOB,
    IN profilePicture LONGBLOB,
    IN profilePictureType VARCHAR(25)
)
BEGIN
    INSERT INTO Application(
        Astudent_id,
        AstudentJobs,
        Acredit_hours,
        Anumber_of_hours,
        Aapplication_period,
        Acurrent_position,
        Aresume,
        Atranscript,
        Areference_letter,
        AprofileImage,
        AprofileImageType
    ) VALUES (
        studentID,
        AstudentJobs,
        creditHours,
        numberOfHours,
        applicationPeriod,
        currentPosition,
        resume,
        transcript,
        referenceLetter,
        profilePicture,
        profilePictureType
    );
END //
DELIMITER ;


/*
    Create an application as a student (async)
 */

DELIMITER //
CREATE PROCEDURE async_submit_application(
     IN studentID INT,
    IN AstudentJobs VARCHAR(100),
    IN creditHours INT,
    IN numberOfHours INT,
    IN applicationPeriod VARCHAR(20),
    IN currentPosition VARCHAR(50),
    IN resume LONGBLOB,
    IN transcript LONGBLOB,
    IN referenceLetter LONGBLOB,
    IN profilePicture LONGBLOB,
    IN profilePictureType VARCHAR(25)
)
    BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
        END;
        START TRANSACTION;
        INSERT INTO Application(
        Astudent_id,
        AstudentJobs,
        Acredit_hours,
        Anumber_of_hours,
        Aapplication_period,
        Acurrent_position,
        Aresume,
        Atranscript,
        Areference_letter,
        AprofileImage,
        AprofileImageType
    ) VALUES (
        studentID,
        AstudentJobs,
        creditHours,
        numberOfHours,
        applicationPeriod,
        currentPosition,
        resume,
        transcript,
        referenceLetter,
        profilePicture,
        profilePictureType
    );
        COMMIT;
    END //
DELIMITER ;


/*
    Create New Jobs as a ADMIN
 */


DELIMITER //
CREATE PROCEDURE new_course(
    IN jobTitle VARCHAR(2),
    IN className VARCHAR(20),
    IN classCRN VARCHAR(10)
)
BEGIN
INSERT INTO course(CjobTitle,CclassName,CclassCRN) VALUES (
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
