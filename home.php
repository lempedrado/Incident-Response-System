<!DOCTYPE HTML>
<!--
    Lloyd Empedrado
    Dagvadorj Mendsaikhan
    Fardeen Khan

    CS263-001
-->
<html>
    <head>
        <title>Incident Records</title>
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
            .table
            {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                position: relative;
                max-width: 100%;
                text-align: center;
                z-index: 200;
                margin-top: 150px;
            }
            .header
            {
                font-family: Arial, Helvetica, sans-serif;
                font-size: larger;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            #good-button
            {
                background: linear-gradient(to right, #fbc2eb 0%, #a6c1ee 51%, #fbc2eb 100%);;
                width: 150px;
                flex: 1 1 auto;
                padding: 20px;
                text-align: center;
                text-transform: uppercase;
                transition: 0.5s;
                background-size: 200% auto;
                color: #5f3694;
                border-radius: 10px;
                font-weight: 150px;
                margin-top: 30px;
            }
            #good-button:hover
            {
                text-decoration: none;
                background-position: right center;
                color: white;
            }
            #op
            {
                margin-top: 10px;
                width: 200px;
                height: 50px;
            }

        </style>
        <?php
            //script to display the edit options if the user selects "Edit Record"
            echo "<script type='text/javascript'>
                function submit()
                {
                    var selection = document.getElementById('op');
                    if(selection.value == 'Add')
                    {
                        location.href = 'post.php';
                    }
                    else if (selection.value == 'Edit')
                    {
                        console.log('edit');
                        document.getElementById('form').style.opacity = 1;
                    }
                    else
                    {
                        location.href = 'get.php';
                    }
                }
            </script>";
        ?>
    </head>

    <body>
        <div class="table">
            <div class="header">
                <h1>CSIRT Incident Record</h1>

                <label for="operation">What would you like to do?</label>
                <div class="custom-select">
                    <select id="op" name="operation">
                        <option value="Add">Add Record</option>
                        <option value="Edit">Edit Record</option>
                        <option value="Get">Get Record</option>
                    </select>
                </div>

                <button onclick="submit();">Submit</button>
            </div>
            <br><br><br>
            <div id="form">
                <form method="post" action="edit.php">
                    <input type="checkbox" name="status" value="status">
                    <label for="status">Change Status</label> <br>
                    <input type="checkbox" name="comments" value="comments">
                    <label for="comments">Add Comments</label> <br>
                    <input type="checkbox" name="IP" value="addIP">
                    <label for="addIP">Add IP</label> <br>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </body>

</html>
