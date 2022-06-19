<?php
include "connection.php";
?>
<?php
class userRegi{
    public $username;
    public $email;
    public $password;
    public $num;
    public $result;

  public function __construct($Uname, $email, $Pword){
    $this->username = $Uname;
    $this->email = $email;
    $this->password = $Pword;
  }
  public function where(){
    include "connection.php";
    $q = "SELECT * FROM `registration_table` WHERE email='$this->email'";
    $this->result = mysqli_query($con,$q);
    $this->num = mysqli_num_rows($this->result);
  }
}

class userdata extends userRegi{
  public function add(){
    include "connection.php";
    if($this->num == 1){
        $alert = "<script>alert('Data is Alredy Exixt!');</script>";
        echo $alert;
        // header('location:home.html');
    }else{
    $date = date("Y/m/d");
     $qy = "INSERT INTO `registration_table`(`first_Name`, `last_Name`, `username`, `email`, `password`, `birthday_date`, `gender`, `image`, `regi_date`, `mobile_number`) VALUES 
            ('', '', '$this->username', '$this->email', '$this->password', '', '', '', '$date', '')";
     $this->result = mysqli_query($con,$qy) or exit("query faild");
     if($this->result){
        $q = "SELECT * FROM `registration_table` WHERE email='$this->email'";
        $this->result = mysqli_query($con,$q);
        $this->num = mysqli_num_rows($this->result);
        while($row = mysqli_fetch_assoc($this->result)){
            session_start();
            $_SESSION["Username"] = $row['username'];
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["Email"] = $row['email'];
        }
        header('location:form.php');
     }
    }
  }
}

$Username = $_POST['Username'];
$Email = $_POST['email'];
$Password = $_POST['Password'];

if($Username != " " || $Password != " " || $Email != " "){
    $user = new userdata($Username, $Email ,$Password);
    $user->where();
    $user->add();
}
?>