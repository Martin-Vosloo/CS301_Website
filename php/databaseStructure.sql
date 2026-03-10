

#creating the users table
create table users(
            identityNumber varchar(20) Primary Key,
            constraint checkId_len CHECK(CHAR_LENGTH(identityNumber) in (9,11,12,13,15,18) ),
            fname varchar(50),
            
            constraint fname_format check(fname not like('%[^A-Za-z]%')),
            lname varchar(50),
            email_address varchar(40),
            passwrd varchar(20),
            
            constraint lname_format check(lname not like('%[^A-Za-z]%')),
            
            constraint word_length CHECK(char_length(passwrd)>7 and char_length(passwrd)<20),
            
            constraint email check(email_address not like'%[^A-Za-z0-9@._-]%' and email_address not like '%@%' and email_address not like  '%.%'),
            
            alive bit default true
        );
		#exact query to create table

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

#creating the admin table
create table admin(
	idNo varchar(20) PRIMARY KEY,
	CONSTRAINT checkId_len CHECK(CHAR_LENGTH(idNo) in (9,11,12,13,15,18) ),
	pword varchar(20),
    #constraints
	CONSTRAINT word_length CHECK(char_length(pwrd)>7 and char_length(pwrd)<20),
	CONSTRAINT fk_identity FOREIGN KEY (idNo)
	REFERENCES users(identityNumber)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

#booking tables
create table booking(
            booking_id varchar(50),
            idNo varchar(20),
            number_of_people integer,
            start_Date DATETIME DEFAULT CURRENT_TIMESTAMP,
            duration INTEGER,
            full_catering bit default 1,
            self_catering bit default 0,
            photographer bit default 1,
            lodging bit  default 1,
            wedding_preference varchar(500) not null
        );
#exact code used to create the tabel

#creating the  packages table
create table Packages(
	PackageId varchar(20),
    Catering bit,
    Venue varchar(20),
    photography bit,
    accomodation bit
);
    
#creating the venue table
create table venue(
	venueName varchar(20),
    location varchar(50),
    capacity integer
);

#creating the reviews table
create table reviews(
	id int primary key,
    user_id varchar(100),
    text_review varchar(300),
    image varchar(100),
    constraint imageLink check(image like '%.pnj' or image like'%jpg')
);
#exact code to create table

#Creating the blocked
#not yet sure how i will enforce this but there is a way and i will find it
create table Blocked(
	mac_address varchar(100) primary key,
    dateBlocked datetime default CURRENT_TIMESTAMp
);
