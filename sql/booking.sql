-- Database: `booking`
drop database if exists esd_booking;
create database esd_booking;
use esd_booking;

DROP TABLE IF EXISTS booking_info;
CREATE TABLE booking_info (
  booking_id varchar(64) NOT NULL,
  clinic_username varchar(30) NOT NULL,
  user_username varchar(30) NOT NULL,
  booking_date varchar(10) NOT NULL,
  booking_slot int(2) NOT NULL,
  clinic_service varchar(30) NOT NULL,
  PRIMARY KEY (clinic_username, booking_date, booking_slot)
);

-- Dumping data for table `booking_info`
INSERT INTO booking_info (booking_id, clinic_username, user_username, booking_date, booking_slot, clinic_service) VALUES
('suvc|25-5-2021|9', 'suvc', 'shaz123', '25-5-2021', 9,'Vaccinations'),
('tvc|28-6-2021|14', 'tvc', 'marcus123', '28-6-2021', 14, 'Vaccinations'),
('suvc|28-5-2021|10', 'suvc', 'heather23', '28-5-2021', 10,'Vaccinations'),
('suvc|27-5-2021|11', 'suvc', 'glennis123', '27-5-2021', 11,'Vaccinations'),
('suvc|29-5-2021|15', 'suvc', 'angela123', '29-5-2021', 15,'Vaccinations'),
('suvc|25-9-2021|9', 'suvc', 'heather123', '25-9-2021', 9,'Skin and Ears'),
('tvc|28-7-2021|14', 'tvc', 'glennis123', '28-7-2021', 14, 'Health Check-Up'),
('tvc|28-6-2021|9', 'tvc', 'marcus123', '28-6-2021', 9, 'Vaccinations'),
('vcs|3-6-2021|9', 'vcs', 'heather123', '3-6-2021', 9, 'Health Check-Up'),
('vvc|28-6-2021|15', 'vvc', 'angela123', '28-6-2021', 15, 'Health Check-Up');