-- Database: `medical_record`
drop database if exists esd_medical_record;
create database esd_medical_record;
use esd_medical_record;

DROP TABLE IF EXISTS medical_record;
CREATE TABLE medical_record (
  medical_record_id int(11) NOT NULL AUTO_INCREMENT,
  clinic_username varchar(30) NOT NULL,
  user_username varchar(30) NOT NULL,
  booking_date varchar(10) NOT NULL,
  booking_slot int(2) NOT NULL,
  clinic_service varchar(30) NOT NULL,
  remarks varchar(300) NOT NULL,
  created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (medical_record_id)
);

-- Dumping data for table `medical_record_id`
INSERT INTO medical_record (medical_record_id, clinic_username, user_username, booking_date, booking_slot, clinic_service, remarks, created) VALUES
(1, 'suvc', 'shaz123', '24-3-2019', 9, 'Vaccinations', 'Effective till 2021', now()),
(2, 'suvc', 'heather123', '22-3-2017', 2, 'Vaccinations', 'Effective till 2019', now()),
(3, 'tvc', 'marcus123', '24-3-2018', 9, 'Vaccinations', 'Effective till 2020', now()),
(4, 'tvc', 'angela123', '24-3-2020', 10, 'Vaccinations', 'Effective till 2022', now()),
(5, 'vcs', 'glennis123', '24-6-2018', 11, 'Vaccinations', 'Effective till 2020', now()),
(6, 'vcs', 'heather123', '24-7-2019', 12, 'Vaccinations', 'Effective till 2021', now());