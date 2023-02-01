<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['userid']) && isset($_POST['statecode']) &&
        isset($_POST['villageid']) && isset($_POST['gender']) &&
        isset($_POST['age']) && isset($_POST['reason'])) {
        
        $userid = $_POST['userid'];
        $statecode = $_POST['statecode'];
        $villageid = $_POST['villageid'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $reason = $_POST['reason'];

        $host = "localhost";
        $dbUsername = "root";

        $dbPassword = "";
        $dbName = "project";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT userid FROM register WHERE userid = ? LIMIT 1";
            $Insert = "INSERT INTO register(statecode, villageid, gender, age, reason) values(?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $userid);
            $stmt->execute();
            $stmt->bind_result($userid);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();


                
                $stmt->bind_param("ssssis",$userid, $statecode, $villageid, $gender, $age, $reason);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this user-id.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>