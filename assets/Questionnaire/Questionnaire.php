<!doctype html>
<html lang="en">
  <head>
    <title>Guide energiemoinschere</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="questionnaire.css">
    <!-- jQuery files -->
    <script type="text/javascript" src="..\js\jquery.min.js"></script>
    <script type="text/javascript" src="typed.min.js"></script>
    <script type="text/javascript" src="jq3.js"></script>
     <!-- Font-Awesome -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
</head>
<body class="questionnaire">
<div class="progress">
     <div class="progress-bar bg-warning" style="width:5%"></div>
  </div><br>
		<div class="typed_wrap">
      <img class="icon iconsmile" src="smile_icon.png">
      <img class="icon iconwink" src="wink_icon.png">
      <h1>
      <span class="typed1"></span><span class="typed2" style="display: none;"></span>
      <span class="typed3" style="display: none;"></span></h1>
    </div>
  <div class="reponse">
    <form method="post" action="/" id="reponse1">
        <input type="submit" name="s" value="Oui, je suis très motivé(e) … Allons y" class="btn1 btnq btn btn-warning btn-arrow-right" style="display: none;">
    </form>
    <form method="post" action="/" id="reponse2" class="alignbutton">
        <input type="submit" name="s" value="Electricité" class="btn2 btne btnq btn btn-warning btn-arrow-right" style="display: none; margin-top: 20%; margin-left: 120%;">
    </form>
    <form method="post" action="/" id="reponse2" class="alignbutton">
        <input type="submit" name="s" value="Gaz" class="btn2 btng btnq btn btn-warning btn-arrow-right" style="display: none; margin-top: 20%; margin-left: 130%;">
    </form>
    <form method="post" action="/" id="reponse2">
        <input type="submit" name="s" value="Electricité et Gaz" class="btn2 btneg btnq btn btn-warning btn-arrow-right" style="display: none; margin-top: 3%; margin-left: 39%;">
    </form>
    <form id="reponse3" class="alignbutton">
        <input type="" name="" value="Cuisine" class="btn3 btnq btn btn-unclicked btn-warning btn-arrow-right" style="display: none; margin-bottom: 66%; margin-left: 125%;">
    </form>
    <form id="reponse3" class="alignbutton">
        <input type="" name="" value="Eau chaude" class="btn3 btnq btn btn-unclicked btn-warning btn-arrow-right" style="display: none; margin-bottom: 66%; margin-left: 135%;">
    </form>
    <form id="reponse3" class="alignbutton">
        <input type="" name="" value="Chauffage" class="btn3 btnq btn btn-unclicked btn-warning btn-arrow-right" style="display: none; margin-left: -78%;">
    </form>
    <form id="reponse3" class="alignbutton">
        <input type="" name="" value="Eclairage" class="btn3 btnq btn btn-unclicked btn-warning btn-arrow-right" style="display: none; margin-left: -68%;">
    </form>
    <form id="reponse3" class="alignbutton">
        <input type="" name="" value="Piscine" class="btn3 btnq btn btn-unclicked btn-warning btn-arrow-right" style="display: none; margin-left: 125%; margin-top: -36%;">
    </form>
    <form id="reponse3" class="alignbutton">
        <input type="" name="" value="Electroménager" class="btn3 btnq btn btn-unclicked btn-warning btn-arrow-right" style="display: none; margin-left: 135%; margin-top: -36%;">
    </form>
  </div>
  <div class="choixmultiple" style="display: none;"><a>Choix multiple</a></div>

</body>
</html>
