-- Database `user`
drop database if exists esd_user;
create database esd_user;
use esd_user;

DROP TABLE IF EXISTS user;
CREATE TABLE IF NOT EXISTS user (
  user_username varchar(32) NOT NULL,
  user_name varchar(64) NOT NULL,
  user_password varchar(32) NOT NULL,
  user_phone varchar(8) NOT NULL,
  pet_name varchar(20) NOT NULL,
  pet_type varchar(20) NOT NULL,
  PRIMARY KEY (user_username)
); 

-- Dumping data for table `user`
INSERT INTO `user` (`user_username`, `user_name`, `user_password`, `user_phone`, `pet_name`, `pet_type`) VALUES
('shaz123', 'Shaziera', 'SPass123', '93279433', 'Bella', 'Dog'),
('glennis123', 'Glennis', 'GPass123', '97826801', 'Luna', 'Cat'),
('heather123', 'Heather', 'HPass123',  '97486866', 'Charlie', 'Tortoise'),
('marcus123', 'Marcus', 'MPass123',  '93232321', 'Lucy', 'Hamster'),
('angela123', 'Angela', 'APass123', '97757340', 'Max', 'Parrot');