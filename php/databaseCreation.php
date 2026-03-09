<?php
//this is to bve used once and alter to be for reference for the restrictions of the table

require_once "connection.php";
//this is the structure of the databse, explanations are at the top
/*
Note:
    # CHECK(CHAR_LENGTH(identityNumber) in (9,11,12,13,15,18) ), means that the length of the characters in the identityNumber feild is one the array values
    #constraints are restrictions for the datatypes for each feild and are enclosed in the constraint paranthesis
the password and usersa table are seperate
*/
$createDB = "Create DATABASE RelationshipAdvice";
$db_to_use = "use RelationshipAdvice";
$usertbl = "create table users(identityNumber varchar(20) Primary Key 
                                CONSTRAINT checkId_len CHECK(CHAR_LENGTH(identityNumber) in (9,11,12,13,15,18) ),
                            fname varchar(50)
                                constraint(check(fname not like('%[^A-Za-z]%'),
                            lname varchar(50)
                                constraint(check(lname not like('%[^A-Za-z]%'),,
                            alive bit default true,
                            );";
$pwrdtbl = "create table pwrd(
            id varchar(20) Primary Key,
            pwrd varchar(20),
            CONSTRAINT checkId_len CHECK(CHAR_LENGTH(id) in (9,11,12,13,15,18) ),  
            CONSTRAINT word_length CHECK(char_length(pwrd)>7 and char_length(pwrd)<20),
            CONSTRAINT fk_identity FOREIGN KEY (id)
            REFERENCES users(identityNumber)
            ON DELETE CASCADE
            ON UPDATE CASCADE
            );";
$