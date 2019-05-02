<?php require 'process/t-contactfran.php'; ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		  <title>Accueil</title>
		  <meta charset="utf-8" />
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"/>
		  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	</head>
	<body>
		<header>
	       <?php include("include/menu.php"); ?>
	       
	    </header>
	    <div class="container">

            <div class="row">
                <h2>Contactez-moi</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Coordonnées de Lisa -->
                    <div class="col-lg-offset-2 col-lg-4">
                        <!-- Adresse de Lisa-->
                        <div class="row">
                            <!--<p class="col-lg-6">-->
                                <span><i class="fa fa-3x fa-fw fa-map-marker"></i> <?php echo " " . $c['code_postal']." ".$c['ville']; ?></span>
                            <!--</p>
                            <p class="col-lg-4">-->
                            <br><span><i class="fa fa-3x fa-fw fa-phone"></i> <?= $c['phone']; ?></span>
                            <br><span><i class="fa fa-3x fa-fw fa-envelope"></i> <?php echo " " . $c['email']; ?></span>
                            <!--</p>-->

                        </div>
                        <!-- Carte Google Maps-->
                        <div class="row">
                            <div id="map">
                                <!--<iframe src="https://www.google.com/maps/dir//Landr%C3%A9varzec,
                                +29510/@48.0908867,-4.1286036,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x48112eb2cdbb92b1:
                                0x40ca5cd36e56a80!2m2!1d-4.0585639!2d48.090908?hl=fr"
                                        frameborder="0"></iframe>-->
                            </div>
                        </div>
                    </div>
                    <!-- Formulaire de contact -->
                    <div class="col-lg-4">
                        <!-- Message résultant de l'action -->
                        <div id="result" style="display: none;"></div>
                        <!--./ Message résultant de l'action-->
                        <form method="post" novalidate data-parsley-validate id="form-contact">
                            <div class="form-group">
                                <label for="nom">Nom <span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="nom" required name="nom"
                                       placeholder="Nom" data-parsley-required-message="Entrez votre nom svp" />
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail <span style="color: red">*</span></label>
                                <input type="email" class="form-control" id="email" required name="email"
                                       placeholder="Adresse email" data-parsley-required-message="Entrez votre adresse email svp">
                            </div>
                            <div class="form-group">
                                <label for="phone">Téléphone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="Numéro de téléphone">
                            </div>
                            <div class="form-group">
                                <label for="msg">Message <span style="color: red">*</span></label>
                                <textarea name="msg" id="msg" cols="30" rows="7" class="form-control" required
                                          placeholder="Message" data-parsley-required-message="Entrez votre message svp"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="send" value="Envoyer le message"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>

	      

	    </div>
		<!-- Pieds de page -->
	      <footer>
	        <?php include("include/footer.php"); ?>
	      </footer>
	      <!-- /Pieds de page -->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
	  	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script src="assets/js/parsley.min.js"></script>

        <!-- Traitement en ajax du formulaire de contact -->
        <script>
            $(document).ready(function () {
                $("#nom").focus(); // Donner le focus au champ nom au chargement de la page
                /* Masquage du message d'erreur en cas de presse dur une touche clavier */
                $("#nom").on('keyup', function () {
                    $("#result").css('display', 'none');
                });
                $("#email").on('keyup', function () {
                    $("#result").css('display', 'none');
                });
                $("#phone").on('keyup', function () {
                    $("#result").css('display', 'none');
                });
                $("#msg").on('keyup', function () {
                    $("#result").css('display', 'none');
                });
                /* Masquage du message d'erreur en cas de presse dur une touche clavier */

                /* Traitement du formulaire à la soumission */
                $("#form-contact").on('submit', function () {
                    var nom = $("#nom").val();
                    var email = $("#email").val();
                    var tel = $("#phone").val();
                    var msg = $("#msg").val();

                    $.post(
                        // Chmin vers le script php
                        "process/t-form-contact.php",
                        // Transmission des variable au script php
                        {
                            name: nom,
                            mail: email,
                            tel: tel,
                            message: msg
                        },
                        // Récupération du retour
                        function (data) {
                            $('#result').html('<?php ?>')
                            if (data === "Succes"){
                                $('#result')
                                    .html('<p>Votre message a bien été envoyé</p>')
                                    .addClass('alert alert-success')
                                    .css('display', 'block');
                                // Vide les champs après envoi réussi
                                $("#nom").val("");
                                $("#email").val("");
                                $("#phone").val("");
                                $("#msg").val("");
                            }else{
                                $('#result')
                                    .html('<p>Message non envoyé</p>')
                                    .addClass('alert alert-danger')
                                    .css('display', 'block');
                            }
                            var page = for(i = 1; i <= 5; i++){<a href='page.php'></a>};
                            $('#result').html('+ page +');
                        },
                    )
                    return false;
                });
            });
        </script>
	</body>
</html>