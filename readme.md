CREATE TABLE `admission` (
`custodian_ID` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(50) NOT NULL,
`telephone` varchar(50) NOT NULL,
`patient_id` int(11) NOT NULL,
`date_of_admission` varchar(50) NOT NULL,
`date_of_discharge` varchar(50) NOT NULL,
PRIMARY KEY (`custodian_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `appointment` (
`aid` int(11) NOT NULL AUTO_INCREMENT,
`time` varchar(255) NOT NULL,
`date` varchar(255) NOT NULL,
`doctor_name` varchar(255) NOT NULL,
`address` varchar(255) NOT NULL,
`telephone` varchar(255) NOT NULL,
`name` varchar(255) NOT NULL,
PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `bill` (
`bill_id` int(11) NOT NULL AUTO_INCREMENT,
`patient_id` int(11) NOT NULL,
`total_fee` varchar(255) NOT NULL,
`nursing_charges` varchar(255) NOT NULL,
`medicine_charges` varchar(255) NOT NULL,
`room_charges` varchar(255) NOT NULL,
`doctor_charges` varchar(255) NOT NULL,
PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `doctor` (
`doctor_id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`nic` varchar(255) NOT NULL,
PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `inpatient` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`patient_id` int(11) NOT NULL,
`name` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `out_patient` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`patient_id` int(11) NOT NULL,
`date` varchar(50) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `patient` (
`pid` int(11) NOT NULL AUTO_INCREMENT,
`nic` varchar(255) NOT NULL,
`gender` varchar(255) NOT NULL,
`name` varchar(255) NOT NULL,
`address` varchar(255) NOT NULL,
`age` varchar(255) NOT NULL,
`Disease` varchar(255) NOT NULL,
`dob` varchar(255) NOT NULL,
PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `receptionist` (
`receptionistID` int(11) NOT NULL AUTO_INCREMENT,
`Name` varchar(255) NOT NULL,
`Address` varchar(255) NOT NULL,
`Age` varchar(255) NOT NULL,
`DOB` varchar(255) NOT NULL,
`Telephone` varchar(255) NOT NULL,
`NIC` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
PRIMARY KEY (`receptionistID`),
UNIQUE KEY `NIC` (`NIC`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `report` (
`report_id` int(11) NOT NULL AUTO_INCREMENT,
`date` varchar(50) NOT NULL,
`category` varchar(50) NOT NULL,
`doctor_id` int(11) NOT NULL,
`information` varchar(50) NOT NULL,
PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `room` (
`room_no` int(11) NOT NULL,
`room_type` varchar(50) NOT NULL,
PRIMARY KEY (`room_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
