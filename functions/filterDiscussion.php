<?php
require_once 'connection.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $niz =explode(",", $_POST['niz']);

        if($niz[0] != "") {
            $brPojmova = count($niz);
            $uslov = "select TopicID from topics where TopicName in(";
            for ($i = 0; $i < count($niz); $i++) {
                if ($i == count($niz) - 1) {
                    $uslov = $uslov . "'" . $niz[$i] . "'" . ")";
                } else {
                    $uslov = $uslov . "'" . $niz[$i] . "'" . ",";
                }
            }
            $result = mysqli_query($conn, $uslov);
//
            $niz = [];
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $niz[$i] = $row['TopicID'];
                $i++;
            }
            $sql = "SELECT COUNT(*), DiscusionID FROM discusion_topic WHERE TopicID IN (";

            for ($i = 0; $i < count($niz); $i++) {
                if ($i == count($niz) - 1) {
                    $sql = $sql . "'" . $niz[$i] . "'" . ")";
                } else {
                    $sql = $sql . "'" . $niz[$i] . "'" . ",";
                }
            }
            $sql = $sql . " GROUP BY DiscusionID HAVING COUNT(*) = " . $brPojmova;
            $result = mysqli_query($conn, $sql);
            //echo $sql;
            $niz = [];
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $niz[$i] = $row['DiscusionID'];
                $i++;
            }

            $row = mysqli_fetch_assoc($result);
            $sql = "SELECT Title, Body, Username FROM discusion, users WHERE discusion.UserID = users.UserID AND DiscusionID IN(";

            for ($i = 0; $i < count($niz); $i++) {
                if ($i == count($niz) - 1) {
                    $sql = $sql . "'" . $niz[$i] . "'" . ")";
                } else {
                    $sql = $sql . "'" . $niz[$i] . "'" . ",";
                }
            }
            $result = mysqli_query($conn, $sql);
            $niz = [];
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $niz[$i] = '<div class="main">
            <h1 id="content">'.$row['Title'].' <sup id="ime">'.$row['Username'].'</sup></h1><br>
            <textarea class="paragraf" disabled>'.$row['Body'].'</textarea>
                <br>
                <button class="like"><img src="images/lajk.jpg"id="thumbsup"></button>&nbsp;<button class="comment"><img src="images/kom.png"id="commenticon"></button>&nbsp;
        </div>';
            }
        }else{
            $sql = "SELECT Title, Body, Username FROM discusion, users WHERE discusion.UserID = users.UserID";
            $niz = [];
            $i = 0;
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $niz[$i] = '<div class="main">
            <h1 id="content">'.$row['Title'].' <sup id="ime">'.$row['Username'].'</sup></h1><br>
            <textarea class="paragraf" disabled>'.$row['Body'].'</textarea>
                <br>
                <button class="like"><img src="../brain-xxl.png"id="thumbsup"></button>&nbsp;<button class="comment"><img src="../speech-bubble-4-xxl.png"id="commenticon"></button>&nbsp;
        </div>';
                $i=$i+1;
            }
        }
        echo json_encode($niz);

    }
?>