<?php
include "init.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Evidencija GSP polazaka</title>
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="assets/css/slick.css" rel="stylesheet">
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/circlebars@1.0.3/dist/circle.css">

    <link href="style.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">
 
	</head>
  <body>

    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
    </a>

	<?php include 'meni.php'; ?>

	<main>
		<section id="mu-about">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-about-area">
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Pregled polazaka</h2>
										<p>Izaberite liniju za koju zelite da vidite polaske</p>
                                        <label for="linija">Linije</label>
                                        <select id="linija" class="form-control" onchange="pretrazi()">
                                        </select>
									</div>
								</div>
                                <div class="col-md-12" id="rezultat">

                                </div>

                                <div class="col-md-12">
                                    <iframe src="https://snazzymaps.com/embed/216021" width="100%" height="600px" style="border:none;"></iframe>
                                </div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer id="mu-footer">
		<div class="mu-footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-footer-bottom-area">
							<p class="mu-copy-right">Gradska uprava za saobracaj</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script src="https://unpkg.com/circlebars@1.0.3/dist/circle.js"></script>
    <script type="text/javascript" src="assets/js/jquery.filterizr.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="assets/js/counter.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>

	<script type="text/javascript" src="assets/js/custom.js"></script>

  <script>
      function unesiLinije() {
          $.ajax({
             url : 'vebServis/linije',
              success: function (data) {

                  let nalepi = '';

                  $.each(data,function (i,linija) {
                      console.log(linija);
                        nalepi += '<option value="' + linija.linijaID + '">'+linija.brojLinije +': ('+linija.od+' - '+ linija.do +')'+'</option>';
                  });
                  $("#linija").html(nalepi);
              }
          });
      }
      unesiLinije();

      function pretrazi() {
          let linijaID  = $("#linija").val();
          $.ajax({
              url: 'generisiPodatkeOPolascima.php',
              data: {linijaID : linijaID},
              success: function (data) {
                  $("#rezultat").html(data);
              }
          })
      }
  </script>

  </body>
</html>