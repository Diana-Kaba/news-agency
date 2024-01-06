<?php

include_once "dbconnect.php";

try {
    $conn->query("SET NAMES utf8mb4");
    $conn->query("SET CHARACTER SET utf8mb4");
    if (!$conn->query("CREATE TABLE IF NOT EXISTS articles (id INT NOT NULL AUTO_INCREMENT, nickname VARCHAR (255), date DATETIME, message TEXT, title TEXT, category VARCHAR(255), PRIMARY KEY (id))")) {
        throw new Exception('Error creation table articles: [' . $conn->error . ']');
    }

    if (!$conn->query("CREATE TABLE IF NOT EXISTS users (user_id INT NOT NULL AUTO_INCREMENT, log VARCHAR(255), pas VARCHAR(255), nickname VARCHAR (255), PRIMARY KEY (user_id))")) {
        throw new Exception('Error creation table users: [' . $conn->error . ']');
    }

    if (!$conn->query("INSERT INTO users (log, pas, nickname) VALUES ('pit', '123', 'Pit Bull')")) {
        throw new Exception('Error filling in the table users: [' . $conn->error . ']');
    }

    echo "Tables users and articles created successfull";
    $conn->close();

} catch (Exception $e) {
    echo $e->getMessage();
}
