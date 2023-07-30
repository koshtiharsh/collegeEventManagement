<?php
include('./config/config.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Management</title>
    <link rel="stylesheet" href="./style.css?v=<?=$version?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1 style="font-size: 3rem; color: white">
                            <span>K</span>BTC<span>O</span>E
                        </h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href="#home" data-after="Home">Home</a></li>
                        <li><a href="#events" data-after="Service">Events</a></li>
                        <li><a href="./user/login.php" data-after="Projects">Login</a></li>
                        <li><a href="./user/register.php" data-after="About">Register</a></li>
                        <li><a href="index.php?admin" data-after="About">Admin Login</a></li>
                        <li><a href="#contact" data-after="Contact">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="home">
        <div class="home container">
            <div class="headline">
                <h1>Get ready to</h1>
                <h1>experience the</h1>
                <h1><span>best college</span> event yet !</h1>
                <a href="#events" type="button" class="cta">Events</a>
            </div>
        </div>
    </section>

    <section id="events">
        <div class="event container">
            <div class="top">
                <h1>EVEN<span>T</span>S</h1>
            </div>
            <div class="items">
                <?php
          include('./connect.php');
          $select = "Select * from `event` ";
          $result =mysqli_query($con,$select);
          while($row=mysqli_fetch_assoc($result)){
              $name = $row['name'];
              $img = $row['img'];
              $date =$row['date'];
              echo"<div class='item'>
                <div class='event_img'><img src='./admin/img/$img' alt'' />
                </div>
              
              <div class='bottom'>
                <h4>Date :$date </h4>
                <h2>$name</h2>
                <a href='./user/login.php' type='button' class='ct'>Register</a>
              </div>
            </div>";
          }
          
          if(isset($_GET['admin'])){
           echo" <script>window.open('admin.php','_self')</script>";
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

    document.addEventListener("scroll", () => {
        var scroll_position = window.scrollY;
        if (scroll_position > 250) {
            header.style.backgroundColor = "#29323c";
        } else {
            header.style.backgroundColor = "transparent";
        }
    });

    menu_item.forEach((item) => {
        item.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            mobile_menu.classList.toggle("active");
        });
    });
    </script>
</body>

</html>