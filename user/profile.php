<?php
include('../config/config.php');
include('../connect.php');
session_start();
$kbt =$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Management</title>
    <link rel="stylesheet" href="../style.css?v=<?=$version?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    #header {
        background-color: rgb(41, 50, 60);
    }

    .btn {
        border: none;
        background-color: crimson;
        color: white;
        padding: 10px;
        border-radius: 20px;
    }

    .btn:hover {
        background-color: chartreuse;

        color: black;
    }

    span {
        text-transform: uppercase;
    }
    </style>
</head>

<body>
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h2 style="font-size: 3rem; color: white">

                            Welcome, <span><?php  if(isset($_SESSION['username'])){ $username=$_SESSION['username'];

                            $new = "Select * from `user` where kbtug = '$username'";
                            $r = mysqli_query($con,$new);
                            $fetch = mysqli_fetch_assoc($r);
                            $name = $fetch['name'];
                            echo $name;}else{
                                echo "<a href='login.php' type='submit' class='cta'>LOGIN</a>";
                            }
                                
                            
                            ?></span>
                        </h2>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href="profile.php" data-after="Service">Events</a></li>
                        <li><a href="profile.php?details=<?php echo $kbt?>" data-after="student data">Profile</a></li>
                        <li>
                            <a href="registered.php" data-after="Co-ordinators">Registerd Event</a>
                        </li>
                        <!-- <li><a href="staff.php" data-after="STAFF">Staff</a></li> -->
                        <li><a href="../logout.php" data-after="LOG OUT">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- <section id="home">
      <div class="home container">
        <div class="headline">
          <h1>Get ready to</h1>
          <h1>experience the</h1>
          <h1><span>best college</span> event yet !</h1>
          <a href="#" type="button" class="cta">Events</a>
        </div>
      </div>
    </section> -->

    <section id="events">
        <div class="event container">
            <div class="top">
                <h1>ONGOING EVEN<span>T</span>S</h1>
            </div>
            <div class="items">
                <?php
            $select = "Select * from `event` ";
            $result =mysqli_query($con,$select);
            while($row=mysqli_fetch_assoc($result)){
                $name = $row['name'];
                $img = $row['img'];
                $id = $row['event_id'];
                if(isset($_SESSION['username'])){
                echo"<div class='item'>
                <img src='../admin/img/$img' alt'' />
    
                <div class='bottom'>
                  <h2>$name</h2>
                  <form onsubmit=\"return confirm('Are you sure you want to register?');\" action='' method='post'>

                  <button name='register' value=$id type='submit'  class='btn'>Register</button>
                  </form>
                </div>
              </div>";
            }}

            if(isset($_POST['register'])){
                // echo "<script>confirm('Press a button!')</script>";
                $event_id = $_POST['register'];
                
                $register = "Select * from `user` where kbtug ='$kbt'";
                $run = mysqli_query($con,$register);
                $f =mysqli_fetch_assoc($run);
                $name=$f['name'];
                $year=$f['year'];
                $branch=$f['branch'];
                $mob=$f['mob'];
                $selecte = "Select * from `event` where event_id =$event_id ";
            $resulte =mysqli_query($con,$selecte);
            $fe=mysqli_fetch_assoc($resulte);
            $date =$fe['date'];
            $sco= $fe['sco'];
            $scon = $fe['scon'];
                $check= "Select * from `participation` where event_id = $event_id";
                $checks = mysqli_query($con,$check);
                $count = mysqli_num_rows($checks);
                if($count ==0){
                $event_register = "insert into `participation` (kbtug,name,year,branch,mob,event_id,date,sco,scon) values ('$kbt','$name','$year','$branch','$mob','$event_id','$date','$sco','$scon')";
                $result_register= mysqli_query($con,$event_register);
                if($result_register){
                    echo "<script>alert('You are succecfully registerd')</script>";
                }
            }else{
                echo "<script>alert('!!!!already register for event !!!!!!')</script>";
            }
            }
           
           
          ?>
            </div>

        </div>
    </section>

    <section id="footer">
        <div class="footer">
            <h2>Pages</h2>
            <p>About us | Events | Login | Register</p>
            <h2>Document</h2>
            <p>Privacy pollicy | Terms and Conditions</p>
            <h2>Follow us on</h2>
            <p>
                <a href=""><i class="fa-brands fa-instagram"></i></a> |
                <a href=""><i class="fa-brands fa-facebook"></i></a> |
                <a href=""><i class="fa-brands fa-linkedin"></i></a>
            </p>
            <br />
            <p style="color: white">
                Copyrights &copy; All rights are Reserved KBTCOE
            </p>
        </div>
    </section>

    <script>
    const hamburger = document.querySelector(
        ".header .nav-bar .nav-list .hamburger"
    );
    const mobile_menu = document.querySelector(
        ".header .nav-bar .nav-list ul"
    );
    const menu_item = document.querySelectorAll(
        ".header .nav-bar .nav-list ul li a"
    );
    const header = document.querySelector(".header.container");

    hamburger.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        mobile_menu.classList.toggle("active");
    });

    //   document.addEventListener("scroll", () => {
    //     var scroll_position = window.scrollY;
    //     if (scroll_position > 250) {
    //       header.style.backgroundColor = "#29323c";
    //     } else {
    //       header.style.backgroundColor = "transparent";
    //     }
    //   });

    menu_item.forEach((item) => {
        item.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            mobile_menu.classList.toggle("active");
        });
    });
    </script>
</body>

</html>


<?php

if(isset($_GET['details'])){
    echo "<script>window.open('details.php','_self')</script>";
}



?>