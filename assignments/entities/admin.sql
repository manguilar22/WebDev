

CREATE TABLE Administrator (
    ADid INT NOT NULL AUTO_INCREMENT ,
    ADfname VARCHAR(20),
    ADmname VARCHAR(20),
    ADlname VARCHAR(20),
    ADemail VARCHAR(20),
    ADpassword VARCHAR(20),
    PRIMARY KEY (ADid)
) ENGINE=InnoDB;

INSERT INTO Administrator (
                   ADfname,
                   ADmname,
                   ADlname,
                   ADemail,
                   ADpassword
) VALUES (
    "Ms.",
     "N/A",
    "Important",
    "admin",
    "admin1"
);


CREATE TABLE Coordinator (
    Cid INT NOT NULL AUTO_INCREMENT ,
    Cfname CHAR(20),
    Cmname CHAR(20),
    Clname CHAR(20),
    Cemail VARCHAR(20),
    Cpassword VARCHAR(20),
    PRIMARY KEY (Cid)
)ENGINE=InnoDB;


INSERT INTO Coordinator (
    Cfname,
    Clname,
    Cemail,
    Cpassword
) VALUES (
    "Mr.",
    "Important",
    "coor",
    "coor1"
);