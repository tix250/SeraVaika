
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="<?= base_url() ?>assets/css/accueil.css">
     <title>Document</title>
</head>

<body>
     <!-- <div id="one" style="background-image:url(<?php echo images_url("accueil/un.jpg") ?>);">
          <p id="bienvenue" class="text-center">Bienvenue sur e-Vaika</p> <br>
     </div> -->
     <section id="home">
          <div class="row">
               <div class="owl-carousel owl-theme home-slider">
                    <?php for ($i = 0; $i < sizeof($paginations); $i++) { ?>
                         <div class="item item-<?php echo $paginations[$i] ?>">
                              <div class="caption">
                                   <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                             <?php if($i==3){ ?>
                                                  <img src="<?php echo images_url("logo/logo.png")?>" style="width:200px;">
                                             <?php } ?>
                                             <h1><?php echo $textArray[$i]; ?></h1>
                                             <?php if($i==3){ ?>
                                                  <h1>Si vous ne pouvez pas l'acheter, louez la.</h1>
                                             <?php } ?>
                                             <?php if($i>0){ ?>
                                                  <a href="<?php echo site_url_spx("ListeArticleController/".$adresse[$i]."/1")?>" class="section-btn btn btn-default">Voir plus</a>
                                             <?php } ?>     
                                        </div>
                                   </div>
                              </div>
                         </div>
                    <?php } ?>
               </div>
          </div>
     </section>
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                         <br/>
                         <br/>
                         <h2>Les meilleures voitures <small></small></h2>
                    </div>
               </div>
               <?php for ($i = 0; $i < sizeof($paginations); $i++) { ?>
                    <?php if($i<3){ ?>
                         <div class="col-md-4 col-sm-4">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="<?php echo images_url($trioLocations[$i]['pathImage']); ?>" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                                  <span title="Author"><i class="fa fa-cube"></i> <?php echo $trioLocations[$i]['places'] ?> places</span>
                                                  <span title="Views"><i class="fa fa-cog"></i> <?php echo $trioLocations[$i]['nomCategorie'] ?></span>
                                        </div>
                                   </div>

                                   <div class="courses-detail">
                                        <h3><a href="<?php echo site_url_spx("listeArticleController/carsDetails/".$trioLocations[$i]['idProduitsV']); ?>"><?php echo $trioLocations[$i]['nomVoiture'] ?></a></h3>

                                        <p class="lead"><strong>Ar <?php echo number_format($trioLocations[$i]['prix']) ?></strong></p>

                                        <p></p>
                                   </div>

                                   <div class="courses-info">
                                        <a href="<?php echo site_url_spx("listeArticleController/carsDetails/".$trioLocations[$i]['idProduitsV']); ?>" class="section-btn btn btn-primary btn-block">Voir plus</a>
                                   </div>
                              </div>
                         </div>
                    <?php } ?>
               <?php } ?>
          </div>
     </div>

     <section id="home">
          <div class="row">
               <div class="owl-carousel owl-theme home-slider">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>Vente de voiture</h1>
                                        <h3></h3>
                                        <a href="<?php echo site_url_spx("ListeArticleController/ventes/1")?>" class="section-btn btn btn-default">Voir plus</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                         <br />
                         <br />
                         <h2>Notre sélection<small></small></h2>
                    </div>
               </div>
               <?php for ($i = 0; $i < sizeof($paginations); $i++) { ?>
                    <?php if($i<3){ ?>
                         <div class="col-md-4 col-sm-4">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="<?php echo images_url($trioVentes[$i]['pathImage']);?>" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                             <span title="Author"><i class="fa fa-cube"></i> <?php echo $trioVentes[$i]['places'] ?> places</span>
                                             <span title="Views"><i class="fa fa-cog"></i> <?php echo $trioVentes[$i]['nomCategorie'] ?></span>
                                        </div>
                                   </div>

                                   <div class="courses-detail">
                                        <h3><a href="<?php echo site_url_spx("listeArticleController/carsDetails/".$trioVentes[$i]['idProduitsV']); ?>"><?php echo $trioVentes[$i]['nomVoiture'] ?></a></h3>

                                        <p class="lead"><strong>Ar <?php echo number_format($trioVentes[$i]['prix']) ?></strong></p>

                                        <p></p>
                                   </div>

                                   <div class="courses-info">
                                        <a href="<?php echo site_url_spx("listeArticleController/carsDetails/".$trioVentes[$i]['idProduitsV']); ?>" class="section-btn btn btn-primary btn-block">Voir plus</a>
                                   </div>
                              </div>
                         </div>
                    <?php } ?>
               <?php } ?>

          </div>
     </div>

</body>

</html>