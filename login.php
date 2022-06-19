<?php

class userLogin{
    public $username;
    public $password;
    public $num;
    public $result;

  public function __construct($Uname, $Pword){
    $this->username = $Uname;
    $this->password = $Pword;
  }
  public function where(){
    include "connection.php";
    
    $q = "SELECT * FROM `registration_table` WHERE username='$this->username' and password='$this->password'";
    $this->result = mysqli_query($con,$q);
    $this->num = mysqli_num_rows($this->result);
  }
}

class userdata extends userLogin{
  public function add(){
    include "connection.php";
    if($this->num > 0){
        while($row = mysqli_fetch_assoc($this->result)){
            session_start();
            $_SESSION["Username"] = $row['username'];
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["Email"] = $row['email'];
            $mobo = $row['mobile_number'];
        }
        if($mobo != "" ){
           header('location:app.php');
        }else{
          header('location:form.php');
        }
    }else{
        header('location:home.html');
    }
  }
}

$Username = $_POST['Username'];
$Password = $_POST['Password'];

if($Username != " " || $Password != " "){
    $user = new userdata($Username, $Password);
    $user->where();
    $user->add();
}
?>