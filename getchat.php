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
        $output = "";

            $sql = "SELECT * FROM `chat_table` WHERE (sender_id = {$sender_id} AND receiver_id	={$receiver_id})
            OR (sender_id = {$receiver_id} AND receiver_id	={$sender_id})";
            $query = mysqli_query($con,$sql);
        
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    if($row['sender_id'] == $sender_id ){
                        $output = '<li class="common-message is-you">
                                        <p class="common-message-content">
                                        '.$row['message'].'
                                        </p>
                                        <time datetime>'.$row['time'].'</time>
                                    </li> ';
                    }else if($row['sender_id'] == $receiver_id){
                        $output = '<li class="common-message is-other">        
                                        <p class="common-message-content">
                                        '.$row['message'].'
                                        </p>
                                        <time datetime>'.$row['time'].'</time>          
                                    </li>';
                    }
                    echo $output;
                }
            }
    }else{

    }
?>
