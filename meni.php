<header id="mu-hero">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light mu-navbar">
				<a class="navbar-brand mu-logo" href="index.php"><span>GSP - Evidencija</span></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="fa fa-bars"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto mu-navbar-nav">
                    <?php
                        if($_SESSION['korisnik'] == null){
                            ?>
                            <li>
                                <a href="index.php">Login</a>
                            </li>
                    <?php
                        }else{
                            /** @var Korisnik $korisnik */
                            $korisnik = $_SESSION['korisnik'];
                            $administrator = $korisnik->getKorisnickaRola()->getNazivRole() == 'Administrator';
                            ?>
                            <li>
                                <a href="polasci.php">Polasci</a>
                            </li>
                    <?php
                            if($administrator){
?>
                                <li>
                                    <a href="upravljanjeKorisnicima.php"> Unos Korisnika</a>
                                </li>
                                <li>
                                    <a href="administracijaLinija.php">Unos Linije</a>
                                </li>
                                <li>
                                    <a href="administracijaPolazaka.php">Upravljanje polascima</a>
                                </li>
                     <?php
                            }
                            ?>
                            <li>
                                <a href="izlogujSe.php">Logout</a>
                            </li>
                    <?php
                        }
                    ?>

			     </ul>
			  </div>
			</nav>
		</div>
	</header>