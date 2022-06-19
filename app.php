<?php
include "connection.php";
session_start();
if(!isset($_SESSION["Username"]) && !isset($_SESSION["user_id"]) && !isset($_SESSION["Email"]) ){
    header('location:home.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="CSS/app.css" />
    <style>
         a {
      text-decoration:none;
      color:black;
   }
   ol, ul {
    list-style: none;
}
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
    margin: 0;}
    
    .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.show {display: block;}

input[type=text] {
  padding: 12px 303px;
  box-sizing: border-box;
  border-radius: 50px;
}

.button1 {
  background-color: #d9d9d9;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {font-size: 10px;}
    </style>
</head>
<body>
<section class="main-grid">  
  <aside class="main-side">
     <header class="common-header">
       <div class="common-header-start">
           <button class="u-flex js-user-nav">
            <?php
            include "connection.php";
                $id = $_SESSION['user_id'];

                $q = "SELECT * FROM `registration_table` WHERE id='$id'";
                $result = mysqli_query($con,$q);
                $num = mysqli_num_rows($result);
                while($row = mysqli_fetch_assoc($result)){
                    $img = $row['image'];
                    $fname = $row['first_Name'];
                    $lname = $row['last_Name'];
                }
            ?>
            <!-- <?php //echo $img ?> -->
             <img class="profile-image" src="<?php echo $img ?>" alt="<?php echo $_SESSION['Username'] ?>">
             <div class="common-header-content">
                <h1 class="common-header-title"><?php echo $fname .' '. $lname ?></h1>
            </div>
           </button>    
           <nav class="common-nav">
           <ul class="common-nav-list">
             <li class="common-nav-item">
                <div class="dropdown" >
                    <button onclick="myFunction()" class="dropbtn" >
                    &#xF22C;
                    </button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
             </li>
           </ul>
         </nav>
       </div>
     </header>
    <section class="common-alerts"><!-- optional alert message --></section>
    <section class="common-search">
        <input type="search" class="text-input" placeholder="Search or start new chat">
    </section>
    <section class="chats">
    <!-- <button class='u-flex js-user-nav'> -->
    <!-- echo "<li class='chats-item' onclick='Userid(".$row['id'].")'>
                            <div class='chats-item-button js-chat-button' role='button' tabindex='0'>
                                <img class='profile-image' src=".$row['image'].">
                                    <header class='chats-item-header'>
                                        <h3 class='chats-item-title'>".$row['first_Name']. " ". $row['last_Name'] ."</h3>
                                    </header>
                            </div>
                        </li>"; -->
      <ul class="chats-list">
        <?php
        $q = "SELECT * FROM `registration_table`";
        $result = mysqli_query($con,$q);
        $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){
            
            if($id != $row['id'] && $row['mobile_number'] != "")
            {
                echo "<li class='chats-item'>
                            <a href='app.php?id=".$row['id']."'>
                                <div class='chats-item-button js-chat-button' role='button' tabindex='0'>
                                    <img class='profile-image' src=".$row['image'].">
                                        <header class='chats-item-header'>
                                            <h3 class='chats-item-title'>".$row['first_Name']. " ". $row['last_Name'] ."</h3>
                                        </header>
                                </div>
                            </a>
                      </li>";
            }
        }
        ?> 
      </ul>
    </section>
  </aside>  
  
    <?php
        if(isset($_GET['id']) && $_GET['id'] != ""){

            echo '<main class="main-content">';
            $id = $_GET['id'];
            $q = "SELECT * FROM `registration_table` WHERE id='$id'";
            $result = mysqli_query($con,$q);
            $num = mysqli_num_rows($result);

            while($row = mysqli_fetch_assoc($result)){
                echo '<header class="common-header">
                         <div class="common-header-start">  
                            <button class="common-button is-only-mobile u-margin-end js-back"><span class="icon icon-back">⬅</span></button>
                            <button class="u-flex js-side-info-button">
                                    <img class="profile-image" id="imgPreview" src="'.$row['image'].'" alt="">
                                    <div class="common-header-content">
                                    <input type="hidden" id="ReciverID" name="ReciverID" value="">
                                    <h2 class="common-header-title" id="userid">'.$row['first_Name']. ' '. $row['last_Name'].'</h2>
                                    <p class="common-header-status" id="usid"></p>
                                    </div>
                            </button>       
                        </div>
                      </header>';

                
                echo '<div class="messanger">
                            <ol class="messanger-list">
                                
                                
                            </ol>
                            </div>    
                            <div class="message-box">
                                <form action="#" class="typing-area" autocomplete="off">
                                    <input type="number" name="sender_id" value="'.$_SESSION['user_id'].'" hidden>
                                    <input type="number" name="receiver_id" value="'.$id.'" hidden>
                                    <input type="text" class="input-field" name="message" placeholder="Type text here..">
                                    <button class="button1" id="button1">Send</button>
                                </form>
                            </div>
                        </div>  
                            </main>';
                    
                      
            }
        }else{

            echo '<main class="main-content" style ="background-color: #cccccc;">';
            echo '</main>';
        }
    ?>

    <script>
        var form = document.querySelector('.typing-area');
        var inputField = form.querySelector('.input-field');
        var sendbtn = form.querySelector('#button1');
        var chatBox = document.querySelector(".messanger-list"); 

        form.onsubmit = (e) => {
            e.preventDefault(); 
        }

        sendbtn.onclick = () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "services.php", true);
            xhr.onload = () => {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        inputField.value = "";
                    }
                }
            }

            let formData = new FormData(form);
            xhr.send(formData);
        }

        setInterval(()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "getchat.php", true);
            xhr.onload = () => {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        var data = xhr.response;
                        chatBox.innerHTML = data;
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }, 500);

    </script>
     
   
</section>

<script>
    // function Userid(x){
    //     var s = x;
    //     document.getElementById('ReciverID').value = Number(s);
    //     if (s == "") {
    //         document.getElementById("userid").innerHTML = "";
    //         return;
    //     } else {
    //         var xmlhttp = new XMLHttpRequest();
    //         xmlhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             var myObj =  JSON.parse(this.responseText); 
    //             document.getElementById('userid').innerHTML  = myObj[0] + " " + myObj[1];
    //             document.querySelector("#imgPreview").setAttribute("src", myObj[2]);
    //         }
    //         };
    //         xmlhttp.open("GET", "services.php?id=" + s, true);
    //         xmlhttp.send();
    //     }
    // }
</script>

<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


</body>
</html>