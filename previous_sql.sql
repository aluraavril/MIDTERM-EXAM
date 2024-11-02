CREATE TABLE color_game (
    color_id INT AUTO_INCREMENT PRIMARY KEY,
    color_name VARCHAR (50),
    dealer_name VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE view bettors (
    bettor_id INT AUTO_INCREMENT PRIMARY KEY,
    bettor_firstname VARCHAR (50),
    betting_price INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
