<!DOCTYPE HTML>
<!--
    Lloyd Empedrado
    Dagvadorj Mendsaikhan
    Fardeen Khan

    CS263-001
-->
<html>
    <head>
        <title>Get Report</title>
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
            #form
            {
                opacity: 0;
            }
            label
            {
              color: purple;
              font-size: 17px;
              font-weight: bold;
              display: block;
              width: 150px;
              float: left;
              border: 3px #ccc;
            }
            input
            {
              width: 100;
              padding: 6px 8px;
              margin: 6px 0;
              box-sizing: border-box;
              background-color: purple;
              border: 3px #ccc;

            }
            a
            {
              color: purple;

            }

        </style>
    </head>

    <body>
        <a href="home.php">Home</a>
        <h1>Get Incident Record</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <label for="iID">Incident ID:</label>
            <input name="iID" type="text" value="XXXX">

            <input type="submit" value="Submit">
        </form>
        <?php
            //import database connection
            include 'connection.php';

            if($conn->connect_error)
            {
                die("Connection error: " . $conn->connection_error . "<br>");
            }

            //get the Incident Record
            $sql = "SELECT IncidentNumber, IncidentType, IncidentState, IncidentDate FROM Incident WHERE IncidentNumber = " . $_POST["iID"];
            $result = $conn->query($sql);

            //if no records found, give message and return
            if($result->num_rows == 0)
            {
                echo "No records were found with ID#" . $_POST["iID"];
                return;
            }
            //else display record and history of comments
            $data = $result->fetch_assoc();
            echo "<div>Incident ID: " . $data["IncidentNumber"] . "<br>Incident Type: " .
            $data["IncidentType"] . "&emsp;Incident Status: " . $data["IncidentState"] .
            "<br>Incident Date: " . $data["IncidentDate"] . "<hr>";

            //get and post comments ordered by date
            $sql = "SELECT FreeformComment, CommentDate FROM Comment WHERE IncidentNumber = " . $_POST["iID"] . " ORDER BY CommentDate DESC;";
            $result = $conn->query($sql);

            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    echo "Date: ". $row["CommentDate"] . "<br>Comment: " . $row["FreeformComment"] . "<hr>";
                }
            }
        ?>
    </body>

</html>
