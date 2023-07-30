<?php
include('../config/config.php');
include('../connect.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $fee = $_POST['fees'];
    $sco = $_POST['sco'];
    $scon = $_POST['scom'];
    $staffco = $_POST['staffco'];
    $staffcon = $_POST['staffcon'];
    $date = $_POST['date'];
    $img = $_FILES['image']['name'];
    $tmp_img=$_FILES['image']['tmp_name'];
    move_uploaded_file($tmp_img,"./img/$img");
    $insert = "insert into `event` (name,fee,sco,scon,staffco,staffcon,date,img) values('$name','$fee','$sco','$scon','$staffco','$staffcon','$date','$img')";
    $result= mysqli_query($con,$insert);
    if($result){
        echo"<script>alert('event inserted')</script>";
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
        padding: 40px;
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
        margin-bottom: 15px;
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
                            <span>K</span>BTC<span>O</span>E ADMIN PANEL
                        </h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>

                        <li>
                            <a href="student.php" data-after="student data">Students</a>
                        </li>
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
    <section id="add">
        <div class="add container" style="min-height: 150vh;">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="eventname">Enter the name of Event</label>
                <input type="text" id="eventname" name="name" />

                <label for="fees">Enter the fees</label>
                <input type="text" id="fees" name="fees" />

                <label for="sco">Enter the Name of Student Co-ordinator</label>
                <input type="text" id="sco" name="sco" placeholder="Student Co-ordinator" />

                <label for="scom">Enter the mobile number of Student Co-ordinator</label>
                <input type="text" id="scom" name="scom" placeholder="Student Co-ordinator" />

                <label for="staffco">Enter the Name Co-ordinator</label>
                <input type="text" id="staffco" name="staffco" placeholder="staff Co-ordinator" />

                <label for="staffcon">Enter the mobile number staff of staff Co-ordinator</label>
                <input type="text" id="staffcon" name="staffcon" placeholder="staff Co-ordinator mobile number" />

                <label for="date">Enter the Date</label>
                <input type="text" id="date" name="date" placeholder="DD/MM/YYYY" />

                <label for="img">upload image</label>
                <input style="color: white" type="file" id="img" name="image" />

                <input type="submit" name="submit" id="submit" value="Insert">
                <a href="index.php" type="submit" class="cta" style="text-align: center; margin-top: 10px;">BACK</a>

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