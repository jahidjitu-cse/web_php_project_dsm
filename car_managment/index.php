<?php

error_reporting(0);
session_start();
session_destroy();

if ($_SESSION["message"]){
    $messege=$_SESSION["message"];
    echo "<script type='text/javascript'>

        alert('$messege');
    </script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driving School Managment</title>
    <link rel="stylesheet" href="./styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    <nav>
        <label class="logo">Driving School</label>
        <ul>
            <li><a href="#"  class="btn btn-primary">Home</a></li>
            <li><a href="./contact_me.php"  class="btn btn-primary">Contact</a></li>
            <li><a href="./addmission_page.php"  class="btn btn-primary">Admission</a></li>
            <li><a href="./login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text">Unlock Your Driving Potential with Expert Training</label>
        <img class="main_img" src="./images/cover.jpg" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="./images/shcool image.jpeg" alt="">
            </div>
            <div class="col-md-8">
                <h1>Welcome to Driving School</h1>
                <p> Welcome, where we prioritize safe,
                    confident driving for everyone. With years of experience,
                    certified instructors, and a commitment to excellence,
                    we help students master driving skills through personalized, hands-on training.
                    Whether you're a beginner or looking to refine your skills,
                    our comprehensive courses and flexible schedules cater to all needs.
                    Join us and take the first step towards becoming a skilled, responsible driver!</p>
            </div>
        </div>
    </div>
    <center>
        <h1>Our Best Instructors For You Journey</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="./images/teacher1.jfif" alt="teacher">
                <h3>Jessica Huang</h3>
                <p>Jessica Huang is an experienced driving instructor known for her patience and clear guidance. 
                    She specializes in teaching safe driving skills and building confidence in new drivers. </p>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="./images/teacher3.jfif" alt="teacher">
                <h3>Stacey Scowley</h3>
                <p>Stacey Scowley is a skilled driving instructor with a calm and supportive teaching style. 
                    She focuses on helping new drivers build confidence and master safe driving techniques. </p>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="./images/teacher2.jfif" alt="teacher">
                <h3>Jahid Hasan Jitu</h3>
                <p>Jahid Hasan Jitu is an experienced driving instructor with a friendly and patient approach. 
                    He excels at teaching safe driving skills and boosting confidence in new drivers.</p>
            </div>

        </div>
    </div>
    <center>
        <h1>Our Training Packages</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="./images/Automatic Car Training.jfif" alt="teacher">
                <h3>Automatic Car Training </h3>
            </div>
            <div class="col-md-4">
                <img class="teacher" src="./images/manual car training.png" alt="teacher">
                <h3>Manual Car Training </h3>
            </div>
        </div>
    </div>

    <!-- <center>
        <h1 class="adm" >Admission Form</h1>
    </center>

    <div align="center" class="admission_form">

        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="number" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message" ></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" type="submit" id="submit" value="apply" name="apply" >
            </div>
        </form>
    </div> -->
    <footer>
        <p class="footer_text" >© <span id="copyright"></span> JHJ™. All Rights Reserved.</p>
    </footer>
    <script>
        const date = new Date().getFullYear();
        const copyTag = document.getElementById("copyright");

        copyTag.innerHTML = date;
    </script>
</body>

</html>