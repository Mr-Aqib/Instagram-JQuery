<?php
session_start();
include './config.php';
$current_url = $_SERVER['HTTP_REFERER'];
$username = $_POST['siname'];
$password = $_POST['sipass'];
// if ($username = '' || $password = '') {
//     $_SESSION['login-fields-notset'] = "Enter Above Fields First";
//     header("Location: $current_url");
// } else {
$read = "SELECT * FROM Signup WHERE Username ='{$username}' AND Password = '{$password}'";
$result = mysqli_query($connection, $read);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['Welcome'] = 'Welcome' . $ror['Username'];
        $_SESSION['Username'] = $row['Username'];
    }
    header("Location: $base_url/login-check.php");
} else {
    $_SESSION["Login-Details-Err"] = "Enter Valid Username Or Password.";
    header("Location: $current_url");
}
// }