<?php
require_once 'connection.php';
require_once 'redirect.php';
session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $body = $_POST['body'];
        $header = $_POST['subject'];
        $topics = explode(",", $_POST['topics']);
        $userID = $_SESSION['id'];
        if($body== "" && $header == "")
        {
            echo "Prazno";
        }
        else
            {
                $sql = "INSERT INTO discusion VALUES(NULL, '".$header."', '".$body."', '".$userID."', '".date("Y/m/d")."')";
                $result = mysqli_query($conn, $sql);

                $id = mysqli_insert_id($conn);
                for($i = 0;$i < count($topics); $i++){

                    $sql = "SELECT TopicID FROM TOPICS WHERE TopicName = '".$topics[$i]."'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $d=strtotime('today');

                    $sql = "INSERT INTO discusion_topic VALUES('".$id."', '".$row['TopicID']."')";
                    mysqli_query($conn, $sql);
                    echo mysqli_error($conn);
                    //redirect("../discussion.php");
                }
            }

    }
    ?>