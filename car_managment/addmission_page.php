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
    <title>Admission Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .adm_int {
            margin-bottom: 15px;
        }
        .label_text {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .input_deg, .input_txt {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .input_txt {
            resize: vertical;
        }
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        h1.adm {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .return-button {
            display: inline-block;
            margin: 20px 0;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .return-button:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
        }
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="adm">Admission Form</h1>

        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name" required>
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="email" name="email" required>
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="tel" name="phone" required>
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="input_txt" name="message" rows="4" required></textarea>
            </div>
            <div class="adm_int">
                <input class="btn" type="submit" id="submit" value="Apply" name="apply">
            </div>
        </form>

        <a href="index.php" class="return-button">Return to Home</a>
    </div>

    <!-- <footer>
        <div>
            &copy; 2023 Your Institution Name. All rights reserved.
        </div>
    </footer> -->

    <footer>
        <div>
        <p class="footer_text" >© <span id="copyright"></span> JHJ™. All Rights Reserved.</p>
        </div>
        
    </footer>
    <script>
        const date = new Date().getFullYear();
        const copyTag = document.getElementById("copyright");

        copyTag.innerHTML = date;
    </script>

</body>
</html>