<?php

    if(isset($_GET['userid']) && isset($_POST['editform'])){
        $userid = $_GET['userid'];
        $statecode = $_POST['statecode'];
        $villageid = $_POST['villageid'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $reason = $_POST['reason'];
        $sql = "UPDATE `register` SET 
                `statecode`= '$statecode',
                `villageid`= '$villageid',
                `gender`= '$gender',
                `age`= '$age',
                `reason`= '$reason'
                WHERE userid = $userid";

        if($con->query($sql) === TRUE){
            echo "change has been made";
        }else{
            echo "something went wrong";
        }
        
    }else{
        echo "UPDATES HAVE BEEN MADE";
    }
?>

