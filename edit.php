<!DOCTYPE HTML>
<!--
    Lloyd Empedrado
    Dagvadorj Mendsaikhan
    Fardeen Khan

    CS263-001
-->
<html>
    <head>
        <title>Edit Incident Record</title>
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
            input
            {
              width: 100;
              padding: 6px 8px;
              margin: 6px 0;
              box-sizing: border-box;
              border: 3px solid #ccc;
            }
            select
            {
              width: 100;
              padding: 6px 8px;
              margin: 6px 0;
              box-sizing: border-box;
              border: 3px solid #ccc;
            }
            textarea
            {
              width: 70%;
              height: 150px;
              padding: 12px 20px;
              box-sizing: border-box;
              border: 3px solid #ccc;
              border-radius: 4px;
              background-color: #f8f8f8;
              font-size: 16px;
              resize: none;
            }

        </style>
    </head>

    <body>
        <a href="home.php">Home</a><br><br><br>
        <label for="ID">Incident ID#</label>
        <input name="ID" id="ID" type="text">
        <form action="home.php">
            <?php
                //display fields to edit based on selection on previous page
                if(isset($_POST['status']))
                {
                    echo "
                    <label for='status'>Incident Status:</label>
                    <select name='status' id='status'>
                        <option value='Open'>Open</option>
                        <option value='Closed'>Closed</option>
                        <option value='Stalled'>Stalled</option>
                    </select> <br>
                    ";
                }
                
                if(isset($_POST['comments']))
                {
                    echo "
                    <label for='comment'>Comment</label><br>
                    <textarea name='comment' id='comment' rows=5 cols=50></textarea>
                    <br>
                    ";
                }
                
                if(isset($_POST['IP']))
                {
                    echo "
                    <select name='option' id='option'>
                        <option value='Remove'>Remove</option>
                        <option value='Add'>Add</option>
                    </select>

                    <label for='IP'>IP Address:</label>
                    <input name='IP' id='IP' type='text'> <br>
                    
                    <label for='IPReason'>Reason for IP</label><br>
                    <textarea name='IPReason' id='reason' rows=5 cols=50></textarea> <br>
                    ";
                }
            ?>
            <label for="fName">User First Name:</label>
            <input name="fName" id="fName" type="text">

            <label for"lName">User Last Name:</label>
            <input name="lName" id="lName" type="text"><br>
            <input type="submit">
        </form>

        <?php
            include 'connection.php';

            //verify record exists
            $sql = "SELECT * FROM Incident WHERE IncidentNumber=" . $_POST["ID"] . ";";
            $result = $conn->query($sql);
            if(result->num_rows == 0)
            {
                echo "No records found with ID#" . $_POST["ID"];
                return;
            }

            //update the incident report
            if(isset($_POST['status']))
            {
                $sql = "UPDATE Incident SET IncidentState=" . $_POST["status"] . " WHERE IncidentNumber=" . $_POST["iID"] . ";";
                $conn->query($sql);
            }

            //add the incident comment
            if(isset($_POST['comments']))
            {
                $sql = "INSERT INTO Comment VALUES(null, " . $_POST["comment"] . ", " . $_POST["fName"] . ", " . $_POST["lName"] . ", " . $_POST["ID"] . ", '" . $_POST["date"] . "');";
                $conn->query($sql);
            }

            //add IP
            if(isset($_POST['IP']))
            {
                $sql = "INSERT INTO IPAddress VALUES(" . $_POST["IP"] . ", " . $_POST["reason"] . ", " . $_POST["ID"] . ");";
                $conn->query($sql);
            }
        ?>

    </body>

</html>
