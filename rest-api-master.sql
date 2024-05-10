CREATE DATABASE test_api;

USE test_api;

CREATE TABLE users (
    id INT PRIMARY KEY,
    nama CHAR(50) NULL,
    pendidikan CHAR(50) NULL,
    pekerjaan CHAR(50) NULL,
    agama CHAR(50) NULL
);


INSERT INTO users 
(id, nama, pendidikan, pekerjaan, agama)
VALUES
(1, 'Sutejo', 'D4/S1', 'Petani', 'Katholik'),
(2, 'Tarmin', 'SD Sederajat', 'Karyawan Swasta', 'Islam');