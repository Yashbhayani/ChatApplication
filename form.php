<?php
include "connection.php";
session_start();
if(!isset($_SESSION["Username"]) && !isset($_SESSION["user_id"]) && !isset($_SESSION["Email"]) ){
    header('location:home.html');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>Chat App</title>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/form.css" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <style>
        #display_image, #imgPreview{
        width: 250px;
        height: 175px;
        border: 1px solid black;
        background-position: center;
        background-size: cover;
    }
    a {
      text-decoration:none;
   }
     </style>
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form method="post"  action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
        <div class="user-details">

          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your name" name="firstname" required>
          </div>
          
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your name" name="lastname" required>
          </div>
          
          <div class="input-box">
            <span class="details">Birthday Date</span>
            <input type="date" placeholder="Enter your username" name="bdate" required>
          </div>
          
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phonenumber" required>
          </div>
          
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="file" id="img" name="img" accept="image/*" required>
          </div>
          
          <div id="display_image">
            <img src="img/image_placeholder.png" id="imgPreview" alt="Preview">
          </div>

        </div>

        <div class="gender-details">
          <input type="radio" name="gender" value="male" id="dot-1">
          <input type="radio" name="gender" value="female" id="dot-2">
          <input type="radio" name="gender" value="other" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Other</span>
            </label>
          </div>
        </div>


        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
    <div class>
            <div class="container-fluid">
                <?php
                if(isset($_SESSION["Username"])){
                     echo "<a href='logout.php'>".$_SESSION["Username"]."Logout</a>";
                     }else{
                     echo "<a href='log.php'>LOGIN & REGISTER</a>";
                     }
                ?>
            </div>
        </div>
  </div>

  <script src="JS/form.js"></script>

  <?php
   include "connection.php";

    class Register{
        public $firstname;
        public $lastname;
        public $bdate;
        public $phonenumber;
        public $img;
        public $gender;

        public function FunctionName($firstname,$lastname,$bdate,$phonenumber,$images,$gender)
        {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->bdate = $bdate;
            $this->phonenumber = $phonenumber;
            $this->img = $images;
            $this->gender = $gender;

        }
    }

    class AddRegister extends Register{

        public function FName()
        {
            include "connection.php";
            $username = $_SESSION["Username"];
            $user_id = $_SESSION["user_id"];
            $email = $_SESSION["Email"];

            $qb = "UPDATE `registration_table` SET `first_Name`='$this->firstname',
            `last_Name`='$this->lastname', `birthday_date`='$this->bdate', `gender`='$this->gender',
            `image`='$this->img', `mobile_number`='$this->phonenumber' WHERE `id` = $user_id";
            $result = mysqli_query($con,$qb) or exit("query faild");
            if($result){
                header('location:app.php');
            }else{
                header('location:form.php');
            }
        }
    }   

        if (!empty($_POST['gender'])){

            include "connection.php";
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $bdate = $_POST['bdate'];
            $phonenumber = $_POST['phonenumber'];
            $img = $_FILES['img'];
            $gender = $_POST['gender'];

            $q = "SELECT * FROM `registration_table` WHERE mobile_number='$phonenumber'";
            $result = mysqli_query($con,$q);
            $num = mysqli_num_rows($result);

            if($num == 1){
                $alert = "<script>alert('This Mobile Number is Alredy Exixt!');</script>";
                echo $alert;
            }else{
                $files_name = $img['name'];
                $files_size = $img['size'];
                $files_tmp = $img['tmp_name'];
                $fie_type = $img['type'];
                
                $images = "images/".$files_name;
                move_uploaded_file($files_tmp,$images);
                
                $add = new AddRegister();
                $add->FunctionName($firstname,$lastname,$bdate,$phonenumber,$images,$gender);
                $add->FName();
            }
    }
  ?>

</body>
</html>
