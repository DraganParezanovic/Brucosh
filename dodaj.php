<!DOCTYPE html>
<html lg="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dodavanje.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<div class="dodavanje_komentara">
    <div>
        <h1 id="tema" style="text-align:center; font-size: 24px">DISKUSIJA</h1>
        <label for="unos_teme" id = "tema">Tema:</label>
        <input list="teme" name="unos" id="unos" style="background-color: #b2e2f5;">
        <datalist id="teme">
            <?php
            require_once "functions/connection.php";

            $sql="Select TopicName from Topics";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option class='opcije' value='".$row['TopicName']."'>";
            }
            ?>
        </datalist>&nbsp;&nbsp;
        <div class="tagovi" style="background: none">

        </div>
        <input type="text" id="subject" placeholder="Naslov" style="background-color: #b2e2f5;">

        <br><br>
        <textarea  rows="10" class="textarea"></textarea>
        <br><br>
        <button class="objavi" onclick="dodaj()">Objavi</button>
        <form action="discussion.php">
            <input type="submit" id="izadji" value="Izadji">
        </form>
    </div>
</div>
</body>
    <script>
        let vrednosti = [];
        let opcije = $(".opcije");
        for(let i=0; i<opcije.length; i++){
            vrednosti.push(opcije[i].value)
        }
        console.log(vrednosti)
        let cmb = $("#unos")
        $(cmb).on('input', function () {

            let val = document.getElementById('unos').value;
            let dodatiElementi=$('.tagovi').children();
            let vrednostDodatih=[];
            for (let i=0;i<dodatiElementi.length;i++)
            {
                vrednostDodatih.push($(dodatiElementi[i]).text());
            }
            console.log(vrednostDodatih);
            if(vrednosti.indexOf(val) != -1){
                if (vrednostDodatih.indexOf(val)==-1) {
                    $(".tagovi").append('<button onclick="obrisi(this)" id=\"tag\">' + val + '</button> &nbsp;&nbsp;')
                }

                document.getElementById('unos').value = "";
            }
        })

        function dodaj() {
            let subject = document.getElementById("subject").value;
            console.log(subject)
            let body = document.getElementsByClassName("textarea")[0].value;
            let topics = [];
            let selectedTopics = $(".tagovi").children();
            for (let i = 0; i < selectedTopics.length; i++) {
                topics.push($(selectedTopics[i]).text());
            }
            $.post("functions/addDiscussion.php", {subject: subject, body: body, topics: topics.toString()})
                .done(function (data) {
                    console.log("Done " + data);
                    window.location.href = "discussion.php";

                });
        }
    </script>
</html>