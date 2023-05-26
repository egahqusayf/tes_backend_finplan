<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>TES BACKEND FINPLAN</title>
</head>
<body>
<?php 
$host = "localhost"; // ganti dengan nama host database Anda
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda
$dbname = "finplan"; // ganti dengan nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Membuat tabel users
$createUsersTable = mysqli_query($conn, "CREATE TABLE users (
    id INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    gender ENUM('F','M') NOT NULL,
    status ENUM('active','deactive') NOT NULL,
    INDEX index_gender(gender),
    PRIMARY KEY(id))
");

// Membuat tabel hobbies
$createHobbiesTable = mysqli_query($conn, "CREATE TABLE hobbies(
    id INT AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    level INT NOT NULL,
    index index_name(name),
    PRIMARY KEY(id))
");

$createMap_User_HobbyTable = mysqli_query($conn, "CREATE TABLE map_user_hobby (
    id INT AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_hobby INT NOT NULL,
    status ENUM('active','deleted'),
    INDEX index_status(status),
    PRIMARY KEY(id),
    CONSTRAINT fk_map_users
        FOREIGN KEY (id_user) REFERENCES users(id),
    CONSTRAINT fk_map_hobbies
        FOREIGN KEY(id_hobby) REFERENCES hobbies(id));
    ");

// Meng-input data pada tabel users

$insertUsersContent = mysqli_query($conn, "INSERT INTO users (name, gender, status) 
    VALUES 
    ('Frasch', 'F', 'active'),
    ('Garmuth', 'M', 'active'), 
    ('Goliath', 'M', 'active'), 
    ('Luna', 'F', 'active'),
    ('Zeus', 'M', 'active'), 
    ('Aphrodite', 'F', 'active'),
    ('Ares', 'M', 'active'),
    ('Lina', 'F', 'active'),
    ('Lanaya', 'F', 'active'),
    ('Hades', 'M', 'active')

    ");

// Meng-input data pada tabel hobbies

$insertHobbiesContent = mysqli_query($conn, "INSERT INTO hobbies (name,level)
    VALUES
    ('running',8),
    ('skipping',5),
    ('Push Up',10)
");

// Meng-input data pada tabel map_user_hobby

$insertMapTable = mysqli_query($conn, "INSERT INTO map_user_hobby (id_user, id_hobby, status)
    VALUES
    (1,1,'active'),
    (3,1,'active'),
    (8,3,'deleted'),
    (2,2,'active'),
    (4,1,'deleted'),
    (6,2,'active'),
    (5,3,'active'),
    (8,1,'active'),
    (7,2,'active'),
    (4,2'active'),
    (9,3,'deleted'),
    (10,2,'deleted'),
    (3,2,'active'),
    (2,3,'active'),
    (10,2,'active')
");

// Menghitung jumlah user masing-masing gender pada hobby tertentu (input_skipping)

$countGenderInHobby = mysqli_query($conn, "SELECT users.gender, COUNT(id_hobby) AS total
    FROM map_user_hobby 
    JOIN users ON(map_user_hobby.id_user = users.id)
    JOIN hobbies ON(map_user_hobby.id_hobby = hobbies.id)
    WHERE hobbies.name = 'Skipping'
    GROUP BY users.gender");

// Menghitung jumlah hobby dari setiap user yang masih aktif

$countUserHobbies = mysqli_query($conn,"SELECT users.name AS name_user, COUNT(map_user_hobby.id_user) AS total
    FROM users
    LEFT JOIN map_user_hobby ON users.id = map_user_hobby.id_user
    WHERE users.status = 'active'
    GROUP BY users.id, users.name;" );

// Menghitung level rata-rata tiap user dari hobby yang dimiliki

$countAvgLevel = mysqli_query($conn,"SELECT users.name AS name, AVG(hobbies.level) AS level_avg
    FROM map_user_hobby
    JOIN users ON map_user_hobby.id_user = users.id
    JOIN hobbies ON map_user_hobby.id_hobby = hobbies.id
    GROUP BY name;");

?>


</body>
</html>
