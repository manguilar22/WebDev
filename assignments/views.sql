/*
Get all undergraduate students in the applicant pool
*/ 
CREATE VIEW Undergraduate AS SELECT * FROM student WHERE Sclassification LIKE "undergraduate";

/* 
Get all  graduate and doctorate students in the applicant pool. This is a unique group as they can only apply to one position. 
*/ 

CREATE VIEW TA AS SELECT * FROM student WHERE Sclassification LIKE "doctorate" or Sclassification LIKE "graduate";

/*
Get the most promising students in the applicant pool.
*/
CREATE VIEW HonorStudents AS SELECT * FROM student WHERE Smajor_gpa > 3.0 AND Sover_all_gpa > 3.0;

/*
The query aggregates all distinct residency statuses and calculates their GPAs. This will be useful to view the distribution of GPAs upon candidates. 
*/

CREATE VIEW StatMatrix AS SELECT Sresidency_status AS residency,COUNT(Sresidency_status) AS total, AVG(Smajor_gpa) AS average_major_GPA, AVG(Sover_all_gpa) AS average_overall_GPA FROM student GROUP BY Sresidency_status;

/*
This query further sub-divides the distribution of GPAs among the applicant pool. This query will provide a table grouped by gender. This will be helpful for showing the demographic of the applicant pool.
*/

CREATE VIEW FullStatMatrix AS SELECT Sgender AS gender, COUNT(Sgender) AS gender_count ,Sresidency_status AS residency,COUNT(Sresidency_status) AS total, AVG(Smajor_gpa) AS average_major_GPA, AVG(Sover_all_gpa) AS average_overall_GPA FROM student GROUP BY Sresidency_status,Sgender;

