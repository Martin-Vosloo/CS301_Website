

-- #create users table
create table users(
    id integer primary key auto_increment,
    fname varchar(50),
    lname varchar(50),
    email_address varchar(40),
    password varchar(20),
    role varchar(20),
    alive bit default true,
    constraint fname_format check (fname REGEXP '^[A-Za-z]+([ -]?[A-Za-z]+)*$'),
    constraint lname_format check (lname REGEXP '^[A-Za-z]+([ -]?[A-Za-z]+)*$'),
    constraint email_format check (email_address REGEXP '^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$'),
    constraint password_length check (char_length(password) between 8 and 20)
);

-- #creating the reviews table
create table reviews(
    id integer primary key auto_increment,
    user_id integer,
    text_review varchar(300),
    image varchar(100),
    rating integer,
    date_of_review datetime default current_timestamp,
    constraint stars_lim check (rating between 0 and 5),
    constraint imageLink check (image IS NULL OR image like '%.png' OR image like '%.jpg'),
    constraint fk_user foreign key (user_id) references users(id)
);

-- #booking tables
create table booking(
	booking_id integer primary key auto_increment,
	user_id int,
	number_of_people integer,
    start_Date DATETIME DEFAULT CURRENT_TIMESTAMP,
    -- #keeping the duration of the wedding booking to just a few days
    duration INTEGER,
    package_id varchar(20)
	constraint fk_identity foreign key user_id references users(id);
	constraint fk_identity foreign key package_id references packages(id);
);

-- #creating the  packages table
create table packages(
	PackageId integer primary key auto_increment,
    Catering bit,
    Venue varchar(20),
    photography bit,
    accomodation bit
);

/*
	moved to the user table
	#creating the password table 
	create table pwrd(
		id varchar(20) Primary Key,
		CONSTRAINT checkId_len CHECK(CHAR_LENGTH(id) in (9,11,12,13,15,18) ),
		passwrd varchar(20),
		/*ensuring the length of the identity number is matched accordingly part of verifying that the person exists based of the length in the countries
		with the following the length expected by the country:
			United States, Canada, Australia, UK -9
			Germany, Brazil, Nigeria, Russia-11, 
			India, Japan-12, 
			South Africa, South Korea-13, 
			France-15
			China, Mexico-18
		*/
		CONSTRAINT checkId_len CHECK(CHAR_LENGTH(id) in (9,11,12,13,15,18) ),
		# the password length is set to be longer than 7 characters but less than 20 characters
		CONSTRAINT word_length CHECK(char_length(pwrd)>7 and char_length(pwrd)<20),
		# making sure the tables are linked and cascade accordingly
		CONSTRAINT fk_identity FOREIGN KEY (id)
		REFERENCES users(identityNumber)
		ON DELETE CASCADE
		ON UPDATE CASCADE
	);
*/

-- #creating the admin table
-- create table admin(
-- 	idNo varchar(20) PRIMARY KEY,
-- 	CONSTRAINT checkId_len CHECK(CHAR_LENGTH(idNo) in (9,11,12,13,15,18) ),
-- 	pword varchar(20),
--     #constraints
-- 	CONSTRAINT word_length CHECK(char_length(pwrd)>7 and char_length(pwrd)<20),
-- 	CONSTRAINT fk_identity FOREIGN KEY (idNo)
-- 	REFERENCES users(identityNumber)
-- 	ON DELETE CASCADE
-- 	ON UPDATE CASCADE
-- );





    
-- #creating the venue table
-- create table venue(
-- 	venueName varchar(20),
--     location varchar(50),
--     capacity integer
-- );


-- #exact code to create table

-- #Creating the blocked
-- #not yet sure how i will enforce this but there is a way and i will find it
-- create table Blocked(
-- 	mac_address varchar(100) primary key,
--     dateBlocked datetime default CURRENT_TIMESTAMp
-- );
