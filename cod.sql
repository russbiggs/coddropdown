CREATE DATABASE coverage

USE coverage ;

CREATE TABLE `country` (
	pcode VARCHAR(32) PRIMARY KEY,
	name VARCHAR(64)
);

CREATE TABLE `governorate` (
	pcode VARCHAR(32) PRIMARY KEY,
	cntry VARCHAR(32),
	name VARCHAR(64),
	FOREIGN KEY (cntry) REFERENCES `country`(`pcode`)
);

CREATE TABLE `district`(
	pcode VARCHAR(32) PRIMARY KEY,
	gov VARCHAR(32),
	name VARCHAR(64),
	FOREIGN KEY (gov) REFERENCES `governorate`(`pcode`)
);

CREATE TABLE `subdistrict` (
	pcode VARCHAR(32) PRIMARY KEY,.
	dist VARCHAR(32),
	name VARCHAR(64),
	FOREIGN KEY (dist) REFERENCES `district`(`pcode`)
);

CREATE TABLE `community` (
	pcode VARCHAR(32) PRIMARY KEY,
	subdist VARCHAR(32),
	name VARCHAR(64),
	FOREIGN KEY (subdist) REFERENCES `subdistrict`(`pcode`)
);


LOAD DATA INFILE ''
	INTO country
	COLUMNS TERMINATED BY ','
	OPTIONALLY ENCLOSED BY '"'
	ESCAPED BY '"'
	LINES TERMINATED BY '\n'