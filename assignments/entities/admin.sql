

CREATE TABLE admin (
    id INT NOT NULL AUTO_INCREMENT ,
    Sfname CHAR(10),
    Slname CHAR(10),
    Susername VARCHAR(20),
    Spassword VARCHAR(20),
    PRIMARY KEY (id)
) ENGINE=InnoDB;

INSERT INTO admin (
    Sfname,
    Slname,
    Susername,
    Spassword
) VALUES (
    "Ms.",
    "Important",
    "admin",
    "admin1"
);


CREATE TABLE coordinator (
    id INT NOT NULL AUTO_INCREMENT ,
    Sfname CHAR(10),
    Slname CHAR(10),
    Susername VARCHAR(20),
    Spassword VARCHAR(20),
    PRIMARY KEY (id)
)ENGINE=InnoDB;


INSERT INTO coordinator (
    Sfname,
    Slname,
    Susername,
    Spassword
) VALUES (
    "Mr.",
    "Important",
    "coor",
    "coor1"
);