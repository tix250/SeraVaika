<section class="section-background">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="text-center">
                         <h2 class="h2"><u><strong>L'équipe de e-Vaika comporte <?php echo (count($nous)); ?> developpeurs : </strong></u> </h2>
                              <?php for($i=0;$i<count($nous);$i++) { ?>
                                   <h3><?php echo $nous[$i]->getNom()." ".$nous[$i]->getPrenom();?></h3>
                                   <p><?php echo $nous[$i]->getPromotion()." de l'".$nous[$i]->getUniv().", groupe".$nous[$i]->getGroupe().", ".$nous[$i]->getEtu().", numero ".$nous[$i]->getNumero();?></p>
                              <?php } ?>
                         </div>
                    </div>
               </div>
          </div>
     </section>
