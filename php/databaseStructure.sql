-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email_address VARCHAR(40) NOT NULL,
    password CHAR(70) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'user',
    alive BIT(1) NOT NULL DEFAULT b'1'
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
