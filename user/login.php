<?php
include('../config/config.php');
include('../connect.php');
@session_start();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $pass= $_POST['pass'];

    $select = "Select * from `user` where kbtug = '$name'";
    $result= mysqli_query($con,$select);
    $count = mysqli_num_rows($result);
    if($count ==0){
        echo"<script>alert('invalid username or password')</script>";
    }
    else{
        $get = mysqli_fetch_assoc($result);
        $passo=$get['pass'];
        $n = $get['name'];
        if(password_verify($pass,$passo)){
            $_SESSION['username']= $name;
            echo"<script>window.open('./profile.php','_self')</script>";
        }
        else{
            echo"<script>alert('invalid username or password')</script>";
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
    </style>
</head>

<body>
    <section id="header">
        <div class="header">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1 style="font-size: 3rem; color: white">
                            <span>K</span>BTC<span>O</span>E Student Login
                        </h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>

                    </div>
                </div>
    </section>

    <section id="add">
        <div class="add container">
            <form action="" method="post">
                <label for="username">ENTER KBTUGID</label>
                <input type="text" id="username" name="name" autocomplete="off" />

                <label for="pass">Enter the password</label>
                <input type="password" id="pass" name="pass" />
               

                <input class="cta" type="submit" name="submit" id="submit" value="login">
                <p style="font-size: 1.6rem; color: white;">Don't Have Account ? <a style="color: white;" href="register.php">Register</a></p>
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