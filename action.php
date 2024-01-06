<?php

include "./db/dbconnect.php";

if (!isset($_SESSION)) {
    session_start();
}

function out($count)
{
    global $conn;
    $arr_out = [];
    try {
        if (!$result = $conn->query("SELECT * FROM articles ORDER BY date DESC LIMIT " . $count)) {
            throw new Exception('Error selection from table articles: [' . $conn->error . ']');
        }
        while ($row = $result->fetch_assoc()) {
            $arr_out[] = $row;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $arr_out;
}

function check_autorize($log, $pas)
{
    global $conn;
    $sql = "SELECT log FROM users WHERE log = '" . $log . "' AND pas='" . $pas . "';";

    if ($result = $conn->query($sql)) {
        $n = $result->num_rows;
        if ($n != 0) {
            $_SESSION['user_login'] = $log;
            return true;
        } else {
            return false;
        }
    }
}

function check_log($log)
{
    global $conn;
    try {
        $sql = "SELECT log FROM users WHERE log = '" . $log . "'";
        $result = $conn->query($sql);
        $n = $result->num_rows;
        if ($n != 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function registration($log, $pas, $nick)
{
    global $conn;
    $sql = "INSERT INTO users (log, pas, nickname) VALUES (" . "'" . $log . "', " . "'" . $pas . "', " . "'" . $nick . "')";
    if (!$conn->query($sql)) {
        return false;
    } else {
        $_SESSION['user_login'] = $log;
        return true;
    }
}

function logout()
{
    unset($_SESSION['user_login']);
    session_unset();
    header("Location: index.php");
}

function add()
{
    global $conn;

    $result = $conn->query("SELECT nickname FROM users WHERE log = '{$_SESSION['user_login']}'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nick = $row['nickname'];
    } else {
        return; // Exit the function if no nickname is found
    }

    $message = mysqli_real_escape_string($conn, $_REQUEST['message']);
    $title = mysqli_real_escape_string($conn, $_REQUEST['title']);

    try {
        if (!$conn->query("INSERT INTO articles(nickname, date, message, title, category) VALUES ('$nick', NOW(), '$message', '$title', 'Other')")) {
            throw new Exception('Table filling error articles: [' . $conn->error . ']');
        }

        $_SESSION['add'] = true;
        header("Location: admin_panel.php");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    switch ($action) {
        case 'add':
            add();
            break;
        case 'logout':
            logout();
            break;
        default:
            header("Location: index.php");
    }
}
