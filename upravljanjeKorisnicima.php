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
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.10.20/datatables.min.css"/>

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
										<h2>Unos korisnika</h2>
										<p id="odgovor"></p>
                                        <label for="imePrezime">Ime i prezime</label>
                                        <input type="text" id="imePrezime" class="form-control">
                                        <label for="username">Korisnicko Ime</label>
                                        <input type="text" id="username" class="form-control">
                                        <label for="password">Korisnicka Sifra</label>
                                        <input type="text" id="password" class="form-control">
                                        <hr>
                                        <button class="btn btn-primary" onclick="sacuvajKorisnika()">Sacuvaj korisnika</button>
									</div>
								</div>
							</div>

						</div>
					</div>
                    <div class="col-md-12">
                        <div class="mu-about-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-title">
                                        <h2>Promena role</h2>
                                        <div id="tabela">
                                        </div>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/dt-1.10.20/datatables.min.js"></script>


    <script>
      function sacuvajKorisnika() {
          let imePrezime = $("#imePrezime").val();
          let username = $("#username").val();
          let password = $("#password").val();

          $.ajax({
              url: 'sacuvajKorisnika.php',
              type: 'POST',
              data: {
                  imePrezime : imePrezime,
                  username : username,
                  password : password
              },
              success: function (data) {
                  console.log(data);
                  $("#odgovor").html(data);
                  vratiKorisnike();
              },
              error: function (podaci) {
                  console.log(podaci);
              }
          })
      }

      function promeniRolu(id) {
          $.ajax({
              url: 'vebServis/promeniRolu/'+id,
              type: 'PUT',
              success: function (data) {
                  $("#odgovor").html(data);
                  vratiKorisnike();
              }
          })
      }

      function vratiKorisnike() {
          $.ajax({
              url : 'vebServis/korisnici',
              success: function (data) {

                  let nalepi = '<table id="tabelaData" class="table table-responsive"><thead><tr><th>Ime i prezime</th><th>Promeni u administratora</th></tr></thead><tbody>';

                  $.each(data,function (i,korisnik) {
                      nalepi += "<tr>";
                      //nalepi += "<td>"+korisnik.korisnikID+"</td>";
                      nalepi += "<td>"+korisnik.imePrezime+"</td>";
                      nalepi += "<td><button class='btn btn-info' onclick='promeniRolu("+korisnik.korisnikID+")'>Promeni rolu</button></td>";
                      nalepi += "</tr>";
                  });

                  nalepi += '</tbody></table>';
                  $("#tabela").html(nalepi);
                  $('#tabelaData').DataTable();
              }
          });
      }
      vratiKorisnike();
  </script>


  </body>
</html>