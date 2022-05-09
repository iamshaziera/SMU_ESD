-- Database: `clinic`
drop database if exists esd_clinic;
create database esd_clinic;
use esd_clinic;

DROP TABLE IF EXISTS clinic_info;
CREATE TABLE clinic_info (
  clinic_username varchar(30) NOT NULL,
  clinic_name varchar(100) NOT NULL,
  clinic_address varchar(100) NOT NULL,
  clinic_postal varchar(6) NOT NULL, 
  clinic_password varchar(30) NOT NULL,
  clinic_operating_hours varchar(30) NOT NULL,
  clinic_contact varchar(8) NOT NULL,
  PRIMARY KEY (clinic_username)
);

-- Dumping data for table `clinic_info`
INSERT INTO `clinic_info` (`clinic_username`, `clinic_name`, `clinic_address`, `clinic_postal`, `clinic_password`, `clinic_operating_hours`, `clinic_contact`) VALUES
('suvc', 'Sunshine Vet Care', 'Blk 681 Hougang Ave 8, #01-841', '530681', 'suvc1', '9am-5pm', '98765432'),
('tvc', 'The Veterinary Clinic', '476 Tampines Street 44, #01-201', '520476', 'tvc4', '9am-5pm', '98765435'),
('vcs', 'Light of Life Veterinary Clinic', 'Bedok Reservoir Rd, #01-3508 Block 703', '470703', 'vcs3', '9am-5pm', '62433282'),
('vvc', 'The Visiting Vets Clinic', '9 Taman Serasi, #01-09 Botanic Gardens View', '257720', 'vvc4', '9am-5pm', '64753405');


