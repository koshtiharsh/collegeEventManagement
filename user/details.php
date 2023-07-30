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

    form {
        display: flex;
        flex-direction: column;

        padding: 10px;
        font-size: 2rem;

        /* font-size: 2.5rem; */
    }

    input {
        margin-bottom: 10px;
        font-size: 2rem;
        padding: 5px;
    }

    label {
        margin-bottom: 5px;
        font-size: large;
        padding: 10px;
    }

    select {
        margin-bottom: 10px;
        font-size: 2rem;
        padding: 5px;
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
    echo"Guest";
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
                <h1 style="font-size: 3rem; font-weight: 900">
                    Student details<span>T</span>S
                </h1>
            </div>
            <?php  if(isset($_SESSION['username'])){
        $select = "Select * from `user` where kbtug = '$kbt'";
        $r = mysqli_query($con,$select);
        $f = mysqli_fetch_assoc($r);
        $name=$f['name'];
        $year=$f['year'];
        $branch=$f['branch'];
        $mob=$f['mob'];
       
        echo "<form action='' method='post'>
            <label for='username'>KBTUGID</label>
            <input type='text'value=$kbt id='username' name='kbtug' autocomplete='off' />
  
            <label for='nam'>ENTER YOUR NAME</label>
            <input type='text' id='nam' name='name'value='$name' autocomplete='off' />
  
            <label for='year'> Select Year</label>
            <input type='text' value='$year' id='mob' name='mob' autocomplete='off' />
           
            <label for='branch'> BRANCH</label>
            <input type='text' value='$branch' id='mob' name='mob' autocomplete='off' />
           
  
            <label for='mob'>ENTER YOUR MOBILE NUMBER</label>
            <input type='text' value='$mob' id='mob' name='mob' autocomplete='off' />
          </form>";}
          else{
            echo "<a href='login.php' type='submit' class='cta'>LOGIN</a>";
          }
           // <select name='year' id='year' value='$year'>
            //   <option value=''>Select</option>
            //   <option value='FE'>FE</option>
            //   <option value='SE'>SE</option>
            //   <option value='TE'>TE</option>
            //   <option value='BE'>BE</option>
            // </select>

             // <select name='branch' id='branch' value='$branch'>
            //   <option value='$branch'>Select</option>
            //   <option value='IT'>IT</option>
            //   <option value='COMPUTER'>COMPUTER</option>
            //   <option value='CIVIL'>CIVIL</option>
            //   <option value='INSTRU'>INSTRU</option>
            //   <option value='MECH'>MECH</option>
            // </select>
        ?>

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