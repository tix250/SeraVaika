<!-- <style type="text/css">



</style> -->

     <section>
          <div class="container">
               <div class="row">
                    <div class="col-md-6 col-xs-12">
                         <div>
                              <a href="<?php echo base_url();?>assets/images/<?php echo $first;?>"><img src="<?php echo base_url();?>assets/images/<?php echo $first;?>" alt="" class="img-responsive wc-image"></a>
                         </div>

                         <br> 
                         <div class="row">
                              <?php foreach ($images->result_array() as $image){ ?>  
                              
                                   <div class="col-sm-4 col-xs-6">
                                        <div>
                                             <a href="<?php echo base_url();?>assets/images/<?php echo $image['pathImage'];?>"><img src="<?php echo base_url();?>assets/images/<?php echo $image['pathImage'];?>" alt="" class="img-responsive"></a>
                                        </div>
                                        
                                        <br>
                                   </div>
                                   
                              <?php } ?>
                         </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                         <form action="<?php if(isset($_SESSION['user']))  echo site_url_spx("AjoutPanierContolleur/ajoutPanier"); else echo site_url_spx("welcome/login");?> " method="post" class="form">
                              <h2><?php echo $data['nomVoiture']; ?></h2>

                              <p class="lead"><?php echo $data['descriptionPlus'] ?></p>
                              
                              <p class="lead"><strong class="text-primary">Ar <?php echo number_format($data['prix']);?></strong></p>

                              <div class="row">
                                   <div class="col-md-4 col-sm-6">
                                        <p>
                                             <span>Type</span>

                                             <br>

                                             <strong><?php echo $data['nomCategorie'] ?></strong>
                                        </p>
                                   </div>




                                   <div class="col-md-4 col-sm-6">
                                        <p>
                                             <span>Places</span>

                                             <br>

                                             <strong><?php echo $data['places']; ?></strong>
                                        </p>
                                   </div>

                                   <div class="col-md-4 col-sm-6">
                                        <p>
                                             <span>Année</span>

                                             <br>

                                             <strong><?php echo $data['anne']?></strong>
                                        </p>
                                   </div>
                                   <div class="courses-info">
                                        <!-- <?php if(!isset($flag)){?>
                                             <a href="<?php echo site_url_spx("listeArticleController/".$action); ?>" class="section-btn btn btn-primary btn-block">Ajouter à la liste des souhaits</a>
                                        <?php } else {?>
                                             <a href="<?php echo site_url_spx("welcome/cart"); ?>" class="section-btn btn btn-primary btn-block">Voir dans la liste des souhaits</a>
                                        <?php } ?>      -->

                                             <input type="hidden" name="idProduit" value="<?php echo $data['idProduitsV'] ?>">
                                             <input type="hidden" name="prix" value="<?php echo $data['prix'] ?>">
                                              <input type="number" name="nombre" class="form-control" placeholder="Nombre" value="1">
                                             <input type="submit" name="envoyer" class="section-btn btn btn-primary btn-block" value="ajouter au panier">
                                   </div>

                              </div>
                         </form>
                    </div>
               </div>

               <div class="row">
                    <div class="col-md-6 col-xs-12">
                         <!-- <div class="panel panel-default">
                              <div class="panel-heading">
                                   <h4>Vehicle Description</h4>
                              </div>

                              <div class="panel-body">
                                   <p><?php echo $data['descriptionPlus'] ?></p>
                              </div>
                         </div> -->
                    </div>
                    <!-- tsy aiko oe za sa iza manao an'ito -->
                         <!-- <div class="col-lg-6 col-xs-12">
                              <div class="panel panel-default">
                                   <div class="panel-heading">
                                        <h4>Contact Details</h4>
                                   </div>

                                   <div class="panel-body">
                                        <p>
                                             <span>Name</span>

                                             <br>

                                             <strong>John Smith</strong>
                                        </p>

                                        <p>
                                             <span>Phone</span>

                                             <br>

                                             <strong><a href="tel:123-456-789">123-456-789</a></strong>
                                        </p>


                                        <p>
                                             <span>Mobile phone</span>

                                             <br>

                                             <strong><a href="tel:456789123">456789123</a></strong>
                                        </p>

                                        <p>
                                             <span>Email</span>

                                             <br>

                                             <strong><a href="mailto:john@carsales.com">john@carsales.com</a></strong>
                                        </p>
                                   </div>
                              </div>
                         </div> -->
               </div>
          </div>
     </section>

     