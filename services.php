<?php
include "connection.php";
session_start();
if(!isset($_SESSION["Username"]) && !isset($_SESSION["user_id"]) && !isset($_SESSION["Email"]) ){
    header('location:home.html');
}
?>
<?php
    if(isset($_SESSION["user_id"])){
        include "connection.php";
        $sender_id = mysqli_real_escape_string($con, $_POST["sender_id"]);
        $receiver_id = mysqli_real_escape_string($con, $_POST["receiver_id"]);
        $message = mysqli_real_escape_string($con, $_POST["message"]);
        $date = date("Y/m/d");
        date_default_timezone_set("Asia/Kolkata");
        $time = date("h:i:sa");

        if(!empty($message)){
            $sql = mysqli_query($con, "INSERT INTO `chat_table`(`sender_id`, `receiver_id`, `message`, `date`, `time`) 
            VALUES ('{$sender_id}', '{$receiver_id}', '{$message}', '{$date}','$time')");

        }

    }else{

    }
?>
