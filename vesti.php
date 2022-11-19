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
    <link rel="stylesheet" href="css/vesti.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@300&display=swap" rel="stylesheet">
    <title>Vesti</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<div class="main1">
    <div class="nav-bar"style="position: absolute; z-index:5">
        <ul>
            <li><a class="active" href="index.php">Home Page</a></li>
            <li><a class="active" href="O_Nama.php">O Nama</a></li>
        </ul>
    </div>

    <div id = "main">
       <div class="main">
            <h1 id="content">Stipendije</h1> <br>
            <textarea class="paragraf" disabled>            U Republici Srbiji, za studente tehničkih fakulteta obezbeđen je veliki broj stipendija:
            republička stipendija za studente svih godina studija,
            stipendija "Dositej Obradović" za studente završnih godina osnovnih, master i doktorskih studija,
            stipendija za nadarene studente,
            brojne gradske stipendije, itd.
            Za svaku od navedenih, uslovi su slični i podrazumevaju finansiranje iz budžeta Republike Srbije, prosek najmanje 8,00 i očišćene prethodne godine studija.
            </textarea>
                 </div>
    </div>
    <div class="main">
        <h1 id="content">ESPB</h1><br>
        <textarea class="paragraf" disabled>            Jedan od velikih ciljeva svih studenata državnih fakulteta jeste upis na budžet, kako u prvu, tako i u sve ostale godine studija.
            Za prvu godinu, kriterijumi i zahtevi su raznovrsni i zavise od broja zainteresovanih učesnika, ali za ostale godine, uslovi su uglavnom sledeći:
            Za drugu godinu studija, osvojeno 48 ESPB ili 37 za upis na samofinansiranje.
            Za treću godinu studija, osvojeno 96 ESPB ili 74 za upis na samofinansiranje.
            Za četvrtu godinu studija, osvojeno 144 ESPB ili 111 za upis na samofinansiranje.
            </textarea>
    </div>
</div>
</div>
</body>
</html>