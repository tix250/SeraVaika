<!DOCTYPE html>
<html lang="en" ng-app>

<head>

     <title><?php echo $title ?></title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="<?php echo css_url("bootstrap.min.css") ?>">
     <link rel="stylesheet" href="<?php echo css_url("font-awesome.min.css") ?>">
     <link rel="stylesheet" href="<?php echo css_url("owl.carousel.css") ?>">
     <link rel="stylesheet" href="<?php echo css_url("owl.theme.default.min.css") ?>">
     <link rel="stylesheet" href="<?php echo icon_url("all.css") ?>">

     <!-- resaka checkout -->

     <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet"> -->
     <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
     <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> -->
     <!-- <link href="<?php echo base_url(); ?>/assets/lib/slick/slick.css" rel="stylesheet"> -->
     <!-- <link href="<?php echo base_url(); ?>/assets/lib/slick/slick-theme.css" rel="stylesheet"> -->
     <link rel="stylesheet" href="<?php echo css_url("style2.css") ?>">
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?php echo css_url("style.css") ?>">
     <style>
          .transaction a:hover {
               background-color: #29ca8e;
               color: white;
          }

          .depot input {
               margin-top: 10px;
               margin-bottom: 10px;
          }

          .validerDepot:hover {
               background-color: #29ca8e;
               color: white;
          }
          .checkoutBUTN:hover {
               background-color: #29ca8e;
               color: white;
          }
     </style>

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>

     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#"><img class="navbar-brand logo" src="<?php echo images_url("logo/logo.png"); ?>"></a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="<?php echo isActive($vue, "acceuil") ?>"><a href="<?php echo site_url_spx("welcome/index") ?>">Accueil</a></li>
                         <!-- <li class="<?php echo isActive($vue, "cars") ?>"><a href="<?php echo site_url_spx("welcome/cars") ?>">Voitures</a></li> -->

                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Annonces <span class="caret"></span></a>

                              <ul class="dropdown-menu">
                                   <li class="<?php echo isActive($vue, "blog-post") ?>"><a href="<?php echo site_url_spx("ListeArticleController/location/1") ?>">Location</a></li>
                                   <li class="<?php echo isActive($vue, "testimonials") ?>"><a href="<?php echo site_url_spx("ListeArticleController/ventes/1") ?>">Vente</a></li>
                              </ul>
                         </li>
                         <?php if (isset($this->session->user)) {  ?>
                              <li class="<?php echo isActive($vue, "profile") ?>"><a href="<?php echo site_url_spx("ProfileControlleur/accesProfile/"); ?>">Profile</a></li>
                         <?php } ?>
                       
                         <li class="<?php echo isActive($vue, "Panier") ?>"><a href="<?php echo site_url_spx("PanierControlleur/Panier") ?>">Panier</a></li>
                         <li class="dropdown">

                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Connexion <span class="caret"></span></a>

                              <ul class="dropdown-menu">
                                   <li class="">
                                        <?php if (isset($this->session->user)) {  ?>
                                             <a href="<?php echo site_url_spx("loginControlleur/logout") ?>">Se déconnecter</a></li>
                              <?php } else { ?>
                                   <a href="<?php echo site_url_spx("welcome/login/ok") ?>">Se connecter</a>
                         </li>
                         <li class=""><a href="<?php echo site_url_spx("welcome/register") ?>">S'inscrire</a></li>
                    <?php } ?>

                    </ul>
                    </li>
                    <li class="<?php echo isActive($vue, "about-us") ?>"><a href="<?php echo site_url_spx("AboutControlleur/about") ?>">A propos</a></li>
                    </ul>
               </div>

          </div>
     </section>
     <!-- MENU -->
     <?php include($vue); ?>

     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Headquarter</h2>
                              </div>
                              <address>
                                   <p>212 Barrington Court <br>New York, ABC 10001</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text">
                                   <p>Copyright &copy; 2020 Company Name</p>
                                   <p>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+1 333 4040 5566</p>
                                   <p><a href="mailto:contact@company.com">contact@company.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="terms.html">Terms & Conditions</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="footer-info newsletter-form">
                              <div class="section-title">
                                   <h2>Newsletter Signup</h2>
                              </div>
                              <div>
                                   <div class="form-group">
                                        <form action="#" method="get">
                                             <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                                             <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                                        </form>
                                        <span><sup>*</sup> Please note - we do not spam your email.</span>
                                   </div>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="<?php echo js_url("jquery.js") ?>"></script>
     <script src="<?php echo js_url("bootstrap.min.js") ?>"></script>
     <script src="<?php echo js_url("owl.carousel.min.js") ?>"></script>
     <script src="<?php echo js_url("smoothscroll.js") ?>"></script>
     <script src="<?php echo js_url("custom.js") ?>"></script>


     <!-- script checkout -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
     <script src="<?php echo base_url(); ?>/assets/lib/easing/easing.min.js"></script>
     <script src="<?php echo base_url(); ?>/assets/lib/slick/slick.min.js"></script>

     <!-- Template Javascript -->
     <script src="<?php echo js_url("main.js") ?>"></script>
     <script src="<?php echo angular_url("angular.min.js") ?>"></script>
     <script src="<?php echo js_url("controler.js") ?>"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.bundle.js'></script>
</body>

</html>