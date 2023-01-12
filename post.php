<!DOCTYPE HTML>
<!--
    Lloyd Empedrado
    Dagvadorj Mendsaikhan
    Fardeen Khan

    CS263-001
-->
<html>
    <head>
        <title>Add Incident Record</title>
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
        <form action="home.php">
            <label for="ID">Incident ID#</label>
            <input name="ID" id="ID" type="text">
            
            <label for="type">Incident Type</label>
            <input name="type" id="incidentType" type="text"/> <br>
            
            <label for="date">Date of Incident<label>
            <input name="date" id="date" type="date" />
            
            <label for="status">Incident Status:</label>
            <select name="status" id="status">
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
                <option value="Stalled">Stalled</option>
            </select> <br>
            
            <textarea id="comment" rows=5 cols="50"></textarea>
            <br>
            
            <label for="fName">User First Name:</label>
            <input name="fName" id="fName2" type="text">

            <label for"lName">User Last Name:</label>
            <input name="lName" id="lName2" type="text"><br>

            <label for="IP">IP Address:</label>
            <input name="IP" id="IP" type="text"> <br>
            
            <label for="IPReason">Reason for IP</label><br>
            <textarea name="IPReason" id="reason" rows=5 cols="50"></textarea> <br>


            <input type="submit">

        </form>

        <?php
            include 'connection.php';

            //add the incident report
            $sql = "INSERT INTO Incident VALUES (" . $_POST["ID"] . ", " . $_POST["type"] . ", '" . $_POST["date"] . "', '" . $_POST["status"] . "');";
            $conn->query($sql);

            //add the incident comment
            $sql = "INSERT INTO Comment VALUES(null, " . $_POST["comment"] . ", " . $_POST["fName"] . ", " . $_POST["lName"] . ", " . $_POST["ID"] . ", '" . $_POST["date"] . "');";
            $conn->query($sql);

            //add IP
            $sql = "INSERT INTO IPAddress VALUES(" . $_POST["IP"] . ", " . $_POST["reason"] . ", " . $_POST["ID"] . ");";
            $conn->query($sql);
        ?>

    </body>

</html>
