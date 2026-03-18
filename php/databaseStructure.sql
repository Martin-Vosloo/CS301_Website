<<<<<<< HEAD


#creating the users table
create table users(
	identityNumber varchar(20) Primary Key,
	constraint checkId_len CHECK(CHAR_LENGTH(identityNumber) in (9,11,12,13,15,18) ),
	fname varchar(50),
	#checkiong the first name using like to imitate regular expressions
	constraint fname_format check(fname not like('%[^A-Za-z]%')),
	lname varchar(50),
    email_address varchar(40),
	passwrd varchar(20),
	admin bit,
    #checkiong the last name using like to imitate regular expressions
	constraint lname_format check(lname not like('%[^A-Za-z]%')),
    #checkinbg the format of the password
    constraint word_length CHECK(char_length(pwrd)>7 and char_length(pwrd)<20),
    #checking if the email is in the correct format
    constraint email check(email like'%[^A-Za-z0-9@._-]%' and email like '%@%' and email like '%.%'),
    #we are keeping the data not deleting user
	alive bit default true
=======
-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email_address VARCHAR(40) NOT NULL,
    password CHAR(70) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'user',
    alive BIT(1) NOT NULL DEFAULT b'1'
>>>>>>> 35f966bd709081ca7c438189794926bfff8e8581
);

-- Reviews table
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    text_review VARCHAR(300) NOT NULL,
    image VARCHAR(100),
    rating INT NOT NULL,
    date_of_review DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT stars_lim CHECK (rating BETWEEN 0 AND 5),
    CONSTRAINT fk_reviews_user FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Booking table
CREATE TABLE booking (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    number_of_people INT NOT NULL,
    start_Date DATETIME NOT NULL,
    duration INT NOT NULL,
    package_id VARCHAR(20) NOT NULL,
    CONSTRAINT fk_booking_user FOREIGN KEY (user_id) REFERENCES users(id)
);
