<!DOCTYPE HTML>
<!--
    Lloyd Empedrado
    Dagvadorj Mendsaikhan
    Fardeen Khan

    CS263-001
-->
<html>
    <head>
        <title>User Login</title>
        <style>
            body
            {
                font-weight: 500;
                font-size: 15px;
                line-height: 1.4;
                color: #fff;
                background-color: #1f2029;
                overflow-x: hidden;
                background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat-back.svg');
                background-position: center;
                background-repeat: repeat;
                background-size: 4%;
                width: 100%;
            }
            div
            {
              font-size: 17px;
              color: purple;
              font-size: 17px;
              font-weight: bold;
              display: block;
              box-sizing: border-box;
              border: 3px solid #ccc;
            }
            p
            {
              font-size: 18px;
              color: purple;
              text-align: center;

            }
            input
            {
              font-size: 17px;
              background-color: purple;
              border-block: bold;
              border: 2px solid #ccc;
            }


        </style>
    </head>

    <body>
        <div id = "center">
            <div style="text-align:center;">Please login to access Incident Reports <br>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <label for="uname">Email: </label>
                <input type="text" name="uname"> <br>

                <input onclick="fun();"type="submit" name="submit" value="Submit">
            </form>
            </div>
            <?php
                include 'connection.php';

                //query for user's email in database
                $sql = "SELECT * FROM PEOPLE WHERE EmailAddress = " . filter_var($_POST["uname"], FILTER_SANITIZE_EMAIL) . ";";
                $result = $conn->query($sql);
                //if email exists in database, redirect to home page
                if($result->num_rows > 0)
                {
                    header("Location: home.php");
                    exit();
                }
                //else prompt to reverify credentials
                else
                {
                    echo "<script>alert('Email not found. Please try again.')</script>";
                }
            ?>
        </div>
    </body>
</html>
