<?php
include('../config/config.php');
include('../connect.php');
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
    </style>
</head>

<body>
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1 style="font-size: 3rem; color: white">
                            <span>K</span>BTC<span>O</span>E ADMIN PANEL
                        </h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href="index.php" data-after="Service">Events</a></li>
                        <li><a href="student.php" data-after="student data">Students</a></li>
                        <li>
                            <a href="studco.php" data-after="Co-ordinators">Studen co-ordinators</a>
                        </li>
                        <li><a href="staff.php" data-after="STAFF">Staff</a></li>
                        <li><a href="../index.php" data-after="LOG OUT">Log Out</a></li>
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
                <h1>EVEN<span>T</span>S</h1>
            </div>
            <div class="items">
                <?php
            $select = "Select * from `event` ";
            $result =mysqli_query($con,$select);
            while($row=mysqli_fetch_assoc($result)){
                $name = $row['name'];
                $img = $row['img'];
                $id = $row['event_id'];
                $date =$row['date'];
              echo"<div class='item'>
                <div class='event_img'><img src='./img/$img' alt'' />
                </div>
              
              <div class='bottom'>
                <h4>Date :$date </h4>
                <h2>$name</h2>
                <form action=''method='post'>
                  <button name= 'delete' value=$id type='submit'  class='btn'>Delete</a></form>
              </div>
            </div>";
            }

            if(isset($_POST['delete'])){
                $iid = $_POST['delete'];
                $delete = "delete from `event` where event_id ='$iid'";
                $run = mysqli_query($con,$delete);
                if($run){
                    echo"<script> window.open('index.php','_self')</script>";
                }
            }
           
          ?>
            </div>
            <div>
                <a href="addevent.php" class="cta" type="submit"> ADD EVENT </a>
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