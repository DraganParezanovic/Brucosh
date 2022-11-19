<?php
session_start();
$url = "";
if(isset($_SESSION['id'])) {
    $url = "dodaj.php";

}else{
    $url = "login.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/diskusija.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@300&display=swap" rel="stylesheet">
    <title>Diskusija</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<div class="main1">
    <div class="nav-bar">
        <ul>
            <li><a class="active" href="index.php">Home Page</a></li>
            <li><a href="O_Nama.php">O Nama</a></li>
        </ul>
    </div>
    <div id="myNav" class="overlay">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div class="overlay-content">
            <div>
                <label for="filteri" id="tekst">Izaberi tag:</label>

                <input id="topics" name="topics" list="browsers">
                <datalist id="browsers">
                    <?php
                    require_once "functions/connection.php";

                    $sql="Select TopicName from Topics";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        echo "<option class='opcija' value='".$row['TopicName']."'>";
                    }
                    ?>
                </datalist>
                <input type="submit" onclick="pretraga()" id="submit"><br><br>
                <div id="dugmici" style="width: 100%; height: auto;"> </div><br>
                <button id="odustani" onclick="ponistiFiltere()">Obriši filtere</button>

            </div>
        </div>
    </div>

    <img onclick="openNav()" class="slika" src="imageedit_7_6233829175.png" style="align-items: center;position: fixed;z-index: 1;margin-left: -4vh;height: 10vh;width: 10vh;"></img>
    <div id = "main">
    <?php
        $sql = "SELECT discusion.UserID,DiscusionID,Title, Body, Username FROM discusion, users WHERE discusion.UserID = users.UserID ORDER BY Datum DESC";
        $result=mysqli_query($conn,$sql);
        //echo mysqli_error($conn);
        while($row=mysqli_fetch_assoc($result))
        {
            echo '<div class="main">
            <h1 id="content">'.$row['Title'].'</h1> <h2 id="ime">'.$row['Username'].'</h2><br>
            <textarea class="paragraf" disabled>'.$row['Body'].'</textarea>
                <br>
                <button class="like"><img src="brain-xxl.png"id="thumbsup"></button>&nbsp;<button class="comment" name="'.$row['DiscusionID'].'" onclick="redirectToComments('.$row['DiscusionID'].')"><img src="speech-bubble-4-xxl.png"id="commenticon"></button>&nbsp;
        </div>';

        }
    ?>
    </div>
</div>

<script>
    function openNav() {
        document.getElementById("myNav").style.height = "100%";
    }

    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }
    let cmb = $("#topics");
    let opcije = $(".opcija");
    let vrednosti = [];
    for(let i=0; i<opcije.length; i++){
        vrednosti.push(opcije[i].value)
    }
    console.log(vrednosti)
    $(cmb).on('input', function () {
        let val = document.getElementById('topics').value;
        let dodatiElementi=$('#dugmici').children();
        let vrednostDodatih=[];
        for (let i=0;i<dodatiElementi.length;i++)
        {
            vrednostDodatih.push($(dodatiElementi[i]).text());
        }
        console.log(vrednostDodatih);
        if(vrednosti.indexOf(val) != -1){
            if (vrednostDodatih.indexOf(val)==-1)
                $("#dugmici").append('<button onclick="obrisi(this)" id=\"tag\">'+val+'</button> &nbsp;&nbsp;')

            document.getElementById('topics').value = "";
        }
    })
function obrisi(e) {
    e.remove();
}
    function ponistiFiltere(){
        let dodatiElementi=$('#dugmici').children();
        for (let i=0;i<dodatiElementi.length;i++)
        {
            $(dodatiElementi[i]).remove();
        }
    }
    function pretraga() {
        let dodatiElementi = $('#dugmici').children();
        let selectedFilters = [];
        for (let i = 0; i < dodatiElementi.length; i++) {
            selectedFilters.push($(dodatiElementi[i]).text());
        }
        let diskusije = $('#discusions').children();
        for (let i = 0; i < diskusije.length; i++) {
            diskusije[i].remove();

        }

        $.post("functions/filterDiscussion.php", {niz: selectedFilters.toString()})
            .done(function (data) {
                let dat = JSON.stringify(data);
                for(let i=0;i<dat.length;i++){
                    console.log(dat[i]);
                    $('#discusions').append(dat[i]);
                }
                closeNav();
            });
    }
    function openNav() {
        document.getElementById("myNav").style.height = "100%";
    }

    /* Close when someone clicks on the "x" symbol inside the overlay */
    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }
</script>

<button  class="dodaj" name="<?php echo $url;?>" onclick="redirektuj()">+</button>
<script>
    /* Open when someone clicks on the span element */
    function openNav() {
        document.getElementById("myNav").style.height = "100%";
    }

    /* Close when someone clicks on the "x" symbol inside the overlay */
    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
    }
    function redirektuj() {
        window.location.href = "<?php echo $url;?>";
    }
    function redirectToComments(br){

        window.location.href = "Read_more.php?id="+br;
    }
</script>
</body>
</html>