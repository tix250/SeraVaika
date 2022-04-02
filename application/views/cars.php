<section>
          <div class="container">
               <div class="text-center">
                    <h1><?php echo $title2; ?></h1>

                    <br>

                    <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p> -->
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">

               <div class="row">
                    <div class="col-lg-3 col-xs-12">
                         <div class="form">
                              <form action="<?php echo site_url_spx("SearchController/Recherche".$type."/1"); ?>" method="post">
                                   
                                   <div class="form-group">
                                        <label>Trouver un véhicule:</label>

                                        <input type="text" class="form-control" placeholder="saisir nom du véhicule...." name="nom">
                                   </div>
                                   <div class="form-group">
                                        <label>Type du véhicule:</label>

                                        <select class="form-control" name="categorie">
                                             <option value="" >--All --</option>
                                             <?php foreach ($allCategories->result_array() as $category){ ?>
                                                  <option value="<?php echo $category['nom']; ?>"><?php echo $category['nom']; ?></option>     
                                             <?php } ?>    
                                        </select>
                                   </div>

                                   

                                   <div class="form-group">
                                        <label>Places:</label>
                                        
                                        <select class="form-control"  name="place">
                                             <option value="">-- All --</option>
                                             <?php foreach ($allPlaces->result_array() as $places){ ?>
                                                  <option value="<?php echo $places['places']; ?>"><?php echo $places['places']; ?></option>     
                                             <?php } ?>
                                        </select>
                                   </div>

                                   <button type="submit" class="section-btn btn btn-primary btn-block">Search</button>
                              </form>
                         </div>
                    </div>

                    <div class="col-lg-9 col-xs-12">
                         <div class="row">
                              <?php foreach ($data->result_array() as $row){ ?>
                                   <div class="col-lg-6 col-md-4 col-sm-6">
                                        <div class="courses-thumb courses-thumb-secondary">
                                             <div class="courses-top">
                                                  <div class="courses-image">
                                                       <img src="<?php echo base_url();?>assets/images/<?php echo $row['pathImage'] ?>" class="img-responsive" alt="">
                                                  </div>
                                                  <div class="courses-date">
                                                       <span title="Author"><i class="fa fa-cube"></i><?php echo $row['places']; ?> places</span>
                                                       <!-- <span title="Author"><i class="fa fa-cube"></i> 1800cc</span> -->
                                                       <span title="Views"><i class="fa fa-cog"></i> <?php echo $row['nomCategorie']; ?></span>
                                                  </div>
                                             </div>

                                             <div class="courses-detail">
                                                  <h3><a href="car-details.html"><?php echo $row['nomVoiture']; ?></a></h3>

                                                  <p class="lead"> <strong>Ar <?php echo number_format($row['prix']);?></strong></p>

                                                  <p><?php echo $row['places']; ?> places &nbsp;&nbsp;/&nbsp;&nbsp; </i> <?php echo $row['nomCategorie']; ?> &nbsp;&nbsp;/&nbsp;&nbsp; <?php echo $row['anne']; ?></p>
                                             </div>

                                             <div class="courses-info">
                                                  <a href="<?php echo site_url_spx("listeArticleController/carsDetails/".$row['idProduitsV']); ?>" class="section-btn btn btn-primary btn-block">Plus d'informations</a>
                                             </div>
                                        </div>
                                   </div>
                                   <?php } ?>
                         </div>
                         <nav aria-label="...">
                         <?php if(!isset($recherche)){ ?>
                              <ul class="pagination">
                                   <?php if($page!=1) { ?>
                                        <li class="page-item">
                                             <a class="page-link" href="<?php echo site_url_spx("listeArticleController/".$type."/".$page-1) ?>" tabindex="-1">Précédent</a>
                                        </li>
                                   <?php } ?>
                                   <?php for($index = 1; $index<= $nombre; $index++) {  ?>
                                        <li class="page-item"><a class="page-link" href="<?php echo site_url_spx("listeArticleController/".$type."/".$index) ?>"><?php echo $index; ?></a></li>
                                   <?php } ?>
          
                                   <?php if($page!=$nombre) { ?>
                                   <li class="page-item">
                                        <a class="page-link" href="<?php echo site_url_spx("listeArticleController/".$type."/".$page+1) ?>" tabindex="-1">Suivant</a>
                                   </li>  
                                   <?php } ?>
                              </ul>
                         <?php }else{ ?>
                              <?php if($number_of_result==0) { ?>
                                   <div class="page-item">
                                        <h2>Aucun resultat.</h2>
                                   </div>
                              <?php } ?>
                         <?php } ?>
                         </nav>
                    </div>
               </div>
          </div>
     </section>

     