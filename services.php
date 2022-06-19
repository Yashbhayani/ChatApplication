<?php
include "connection.php";
session_start();
if(!isset($_SESSION["Username"]) && !isset($_SESSION["user_id"]) && !isset($_SESSION["Email"]) ){
    header('location:home.html');
}
?>
<!-- <?php
        /* $id = $_REQUEST['id'];
        include "connection.php";
        if($id != ""){
            $result = mysqli_query($con, "SELECT * FROM `registration_table` WHERE id='$id'");
            $num = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)){
                $first_Name = $row['first_Name'];
                $last_Name = $row['last_Name'];
                $image =  $row['image'];
            }
        }
            
        $ans = array("$first_Name", "$last_Name", "$image");
        $myJSON = json_encode($ans);
        echo $myJSON;*/
?> -->

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
