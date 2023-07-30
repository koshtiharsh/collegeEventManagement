<?php
include('../config/config.php');
include('../connect.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $kbt = $_POST['kbtug'];
    $ye = $_POST['year'];
    $br = $_POST['branch'];
    $mob= $_POST['mob'];
    $pass= $_POST['pass'];
    $hashing = password_hash($pass,PASSWORD_DEFAULT);
    $select= "Select * from `user` where kbtug='$kbt'";
    $results=mysqli_query($con,$select);
    $count = mysqli_num_rows($results);
    if($count>0){
        echo "<script>alert(username already exist)</script>";
    }
    else{
        $insert = "insert into `user` (kbtug,name,year,branch,mob,pass) values('$kbt','$name','$ye','$br','$mob','$hashing')";
        $resulti=mysqli_query($con,$insert);
        if($resulti){
            echo"<script>window.open('./login.php','_self')</script>";
        }
    }

   
  

}
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

    #add form {
        display: flex;
        flex-direction: column;
        border: 2px solid black;
        padding: 50px;
        /* font-size: 2.5rem; */
        border-radius: 20px;
        background-color: rgb(41, 50, 60);
    }

    #add label {
        margin-bottom: 5px;
        font-size: large;
        color: white;
    }

    #add input {
        margin-bottom: 25px;
        font-size: large;
        padding: 10px;
    }

    select {
        margin-bottom: 25px;
        font-size: large;
        padding: 10px;
    }
    </style>
</head>

<body>
    <section id="header">
        <div class="header">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1 style="font-size: 3rem; color: white">
                            <span>K</span>BTC<span>O</span>E Student Registration
                        </h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>

                    </div>
                </div>
    </section>

    <section id="add" style="min-height: 130vh;">
        <div class="add container">
            <form action="" method="post">
                <label for="username">ENTER KBTUGID</label>
                <input type="text" id="username" name="kbtug" autocomplete="off" />

                <label for="name">ENTER YOUR NAME</label>
                <input type="text" id="name" name="name" autocomplete="off" />

                <label for="year"> Select Year</label>
                <!-- <input type="text" id="username" name="name" autocomplete="off" /> -->
                <select name="year" id="year">
                    <option value="">Select</option>
                    <option value="FE">FE</option>
                    <option value="SE">SE</option>
                    <option value="TE">TE</option>
                    <option value="BE">BE</option>
                </select>
                <label for="branch"> BRANCH</label>
                <!-- <input type="text" id="username" name="name" autocomplete="off" /> -->
                <select name="branch" id="branch">
                    <option value="">Select</option>
                    <option value="IT">IT</option>
                    <option value="COMPUTER">COMPUTER</option>
                    <option value="CIVIL">CIVIL</option>
                    <option value="INSTRU">INSTRU</option>
                    <option value="MECH">MECH</option>
                </select>

                <label for="mob">ENTER YOUR MOBILE NUMBER</label>
                <input type="text" id="mob" name="mob" autocomplete="off" />

                <label for="pass">CREATE PASSWORD</label>
                <input type="password" id="pass" name="pass" />



                <input class="cta" type="submit" name="submit" id="submit" value="Register">
                <p style="font-size: 1.6rem; color: white;">Already Registered ? <a style="color: white;"
                        href="login.php">Login</a></p>
                <a href="../index.php" type="submit" class="cta" style="text-align: center;">BACK</a>

            </form>
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
    <!-- 
    <section id="events">
      <div class="event container">
        <div class="top">
          <h1>EVEN<span>T</span>S</h1>
        </div>
        <div class="items">
          <div class="item">
            <img src="code.jpg" alt="" />

            <div class="bottom">
              <h2>Coding Event</h2>
              <a href="" type="button" class="ct">Register</a>
            </div>
          </div>
        </div>
        <div>
          <button class="cta" type="submit">ADD EVENT</button>
        </div>
      </div>
    </section> -->

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
                Copyrights &copy; All rights are Reserved KBTCOE <a style="color:rgb(41, 50, 60) ;"
                    href="./admin/index.php">code</a>
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