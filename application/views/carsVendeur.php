 
     <section>
          <div class="container">
               <div class="text-center">
                    <h1>La liste de vos annonces</h1>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
                
               <div class="row">
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="courses-info">
                                <button href="#" style="font-size:20px" data-toggle="modal" data-target="#formModalAdd" class="section-btn btn btn-primary btn-block">Nouvelle Publication</button>
                        </div>
                    </div>

                    </div>
                    <div class="col-lg-3 col-xs-12">
                        <div class="form">
                            <form action="<?php echo site_url_spx("treatmentVendeur/recherche/1"); ?>" method="post">
                                
                                <div class="form-group">
                                    <label>Trouver un véhicule:</label>

                                    <input type="text" class="form-control" placeholder="Saisir le nom du véhicule...." name="nom">
                                </div>
                                <div class="form-group">
                                    <label>Categorie du véhicule:</label>

                                    <select class="form-control" name="categorie">
                                            <option value="" >--Tous --</option>
                                            <?php foreach ($lCategory as $category){ ?>
                                                <option value="<?php echo $category['idCategories']; ?>"><?php echo $category['nom']; ?></option>     
                                            <?php } ?>    
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Type de vente:</label>

                                    <select class="form-control" name="type">
                                            <option value="" >--Tous --</option>
                                            <?php foreach($lType as $type){ ?>
                                                <option value="<?php echo $type['idTypeA'] ?>" ><?php echo $type['nom'] ?></option>
                                            <?php } ?>   
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Places:</label>
                                    
                                    <select class="form-control"  name="place">
                                            <option value="">-- Tous --</option>
                                            <?php for ($i=1;$i<=30;$i++){ ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>     
                                            <?php } ?>
                                    </select>
                                </div>

                                <button type="submit" class="section-btn btn btn-primary btn-block">Rechecher</button>
                            </form>
                        </div>
                         
                    </div>

                    <div class="col-lg-9 col-xs-12">
                         <div class="row">
                         <?php foreach($listeVoiture as $voiture) { ?>
                              <div class="col-lg-4 col-md-3 col-sm-4">
                                   <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                              <img  src="<?php echo images_url($voiture['imgName']) ?>" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                              <span title="Author"><i class="fa fa-cube"></i><?php echo $voiture['places']?> places</span>
                                              <!-- <span title="Author"><i class="fa fa-cube"></i> 1800cc</span> -->
                                              <span title="Views"><i class="fa fa-cog"></i><?php echo $voiture['categorie']?> </span>
                                        </div>
                                    </div>

                                        <div class="courses-detail">
                                             <h3><a href="<?php echo site_url_spx("listeArticleController/carsDetails/".$voiture['idProduitsV']); ?>"><?php echo $voiture['nom'] ?></a></h3>

                                             <p class="lead"> <strong><?php echo $voiture['prix'] ?></strong></p>

                                             <p><?php echo $voiture['anne'] ?> &nbsp;&nbsp;/&nbsp;&nbsp; <?php echo $voiture['annonce'] ?></p>
                                        </div>

                                        <div class="courses-info">
                                             <a href="<?php echo site_url_spx("listeArticleController/carsDetails/".$voiture['idProduitsV']); ?>" class="section-btn btn btn-primary btn-block">Details</a>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <a  onclick="modify('<?php echo $voiture['idProduitsV'] ?>','<?php echo $voiture['nom'] ?>','<?php echo $voiture['anne'] ?>','<?php echo $voiture['places'] ?>','<?php echo $voiture['prix'] ?>','<?php echo $voiture['descriptionPlus'] ?>','<?php echo images_url($voiture['imgName']) ?>','<?php echo $voiture['idCategorie'] ?>','<?php echo $voiture['categorie'] ?>','<?php echo $voiture['idType'] ?>','<?php echo $voiture['annonce'] ?>')"  style="width:115px" data-toggle="modal" data-target="#formModal" class="section-btn btn btn-modify btn-block modify" onclick=""> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg> Modify</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a onclick="deletePub('<?php echo $voiture['idProduitsV'] ?>')" data-toggle="modal" data-target="#formModalDel" style="width:115px" class="section-btn btn btn-delete btn-block "> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg> Delete</a>
                                            </div>
                                        </div>

                                   </div>
                              </div>

                             <?php } ?>
                         </div>
                    </div>
               </div>
          </div>
     </section>



     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.bundle.js'></script>

<div class="modal fade" id="formModal"  tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color:antiquewhite; width:1000px">
            <div class="modal-header">
                <h3 class="modal-title" id="formModalLabel">Awesome Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url_spx('treatmentVendeur/updatePublication') ?>" method="post" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xs-4">
                                <div class="courses-image">
                                    <img  id="imgName"   class="img-responsive" alt="">
                                </div>
                                </br>
                                <input id="fileInput" name="imgFile" type="file" style="display:none;" />
                                <input
                                        type="button"
                                        class="section-btn btn btn-modify btn-block"
                                        value="Modifier la Photo"
                                        onclick="document.getElementById('fileInput').click();"
                                />
                        </div>
                        <div class="col-md-7 col-lg-7 col-xs-7">
                            <input type="hidden" id="idCar" name="idCar">
                            <div class="form-group row">
                            
                                <label for="carName" class="col-sm-6 col-form-label">
                                Nom de la voiture
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="carName" class="form-control" id="carName"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastName" class="col-sm-6 col-form-label">
                                    Anne
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="anne" class="form-control" id="anne"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastName" class="col-sm-6 col-form-label">
                                    Place
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="place" class="form-control" id="place"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastName" class="col-sm-6 col-form-label">
                                    Prix
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="prix" class="form-control" id="prix"  required>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="lastName" class="col-sm-6 col-form-label">
                                    Categorie
                                </label>
                                <div class="col-sm-6">
                                    <select id="categorie" name="categorie">
                                        <option  selected="selected" id="firstOption"></option>
                                        <?php foreach($lCategory as $Categ){ ?>
                                            <option value="<?php echo $Categ['idCategories'] ?>" ><?php echo $Categ['nom'] ?></option>
                                        <?php } ?> 
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastName" class="col-sm-6 col-form-label">
                                    Type
                                </label>
                                <div class="col-sm-6">
                                    <select id="type" name="type">
                                        <option  selected="selected" id="firstOption2"></option>
                                        <?php foreach($lType as $type){ ?>
                                            <option value="<?php echo $type['idTypeA'] ?>" ><?php echo $type['nom'] ?></option>
                                        <?php } ?> 
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastName" class="col-sm-6 col-form-label">
                                    Description
                                </label>
                                <div class="col-sm-6">
                                    <textarea style="height:150px"  name="description" class="form-control" id="description" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <div class="col-md-6">
                      <button  style="width:150px" class="section-btn btn btn-modify btn-block modify" >Modify</button>
                      
                  </div>
                  <div class="col-md-6">
                      <a  style="width:150px" data-dismiss="modal" class="section-btn btn btn-delete btn-block modify" >Cancel</a>
                      
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="formModalDel" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color:antiquewhite">
            <form action="<?php echo site_url_spx('treatmentVendeur/deletePublication') ?>" method="post" id="formAwesome">
                <div class="modal-body">
                   <input type="hidden" name="idCar" id="idCarDel">
                   <h3 style="color:red">Etes-vous sur de vouloir supprimer cette publication?</h3>
                </div>
                <div class="modal-footer">
                  <div class="col-md-6">
                      <button  style="width:150px" class="section-btn btn btn-delete btn-block modify" >Oui</button>
                      
                  </div>
                  <div class="col-md-6">
                      <a  style="width:150px" data-dismiss="modal" class="section-btn btn btn-primary btn-block modify" >Non</a>
                      
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="formModalAdd" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color:antiquewhite;width:800px">
                <div class="modal-body">
                <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Nouvelle Publication</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action=" <?php echo site_url_spx('treatmentVendeur/insertPublication') ?>" method="post" class="tm-edit-product-form">
                <input type="hidden" name="url" value="<?php echo site_url_spx('TreatmentVendeur/carsVendeur/') ?>">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Nom de la voiture 
                    </label>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Description</label
                    >
                    <textarea
                      class="form-control validate"
                      rows="3"
                      name="description"
                      
                    ></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category" name="categorie"
                    > 
                        <?php foreach($lCategory as $Categ){ ?>
                            <option value="<?php echo $Categ['idCategories'] ?>" ><?php echo $Categ['nom'] ?></option>
                        <?php } ?> 
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="expire_date"
                            >Anne
                          </label>
                          <input
                            id="expire_date"
                            name="anne"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Nombre de place
                          </label>
                          <input
                            id="stock"
                            name="place"
                            type="text"
                            class="form-control validate"
                            required
                          />
                        </div>
                        
                  </div>

                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="expire_date"
                            >Prix
                          </label>
                          <input
                            id="expire_date"
                            name="prix"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                            <label
                                for="category"
                                >Type</label
                                >
                            <select
                                class="custom-select tm-select-accounts" name="type" id="type">
                                <?php foreach($lType as $type){ ?>
                                    <option value="<?php echo $type['idTypeA'] ?>" ><?php echo $type['nom'] ?></option>
                                <?php } ?> 
                               
                            </select>

        
                        </div>
                        
                  </div>
                  
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                    <div class="tm-product-img-dummy mx-auto">
                    <i
                        class="fas fa-cloud-upload-alt tm-upload-icon"
                        onclick="document.getElementById('fileInput').click();"
                    ></i>
                    </div>
<!-- <input type="file" name="userfile" size="20" /> -->
                    <div class="custom-file mt-3 mb-3">
                    <input id="fileInput" name="userfile" type="file" style="display:none;" />
                    <input
                        type="button"
                        class="section-btn btn btn-modify btn-block"
                        value="UPLOAD PRODUCT IMAGE"
                        onclick="document.getElementById('fileInput').click();"
                    />
                    </div>
                </div>
              
                </div>
                <div class="row">
                <div class="row">
                    <div class="col-md-8">
                        <button  data-toggle="modal" data-target="#formModalAdd" class="section-btn btn btn-primary btn-block">Nouvelle Publication</button>
                    </div>
                    <div class="col-md-4">
                        <a  style="width:150px" data-dismiss="modal" class="section-btn btn btn-primary btn-block modify" >Annuler</a>   
                    </div>
                </div>
                </div>
               
            </form>
            </div>
          </div>
        </div>
      </div>
                </div>
        </div>

       
                 
                
    </div>
</div>



<script type="text/javascript">
// var form = document.getElementById("formAwesome");
// form.addEventListener("submit", onSubmitForm);

function cancel() {
    $('#modal fade').modal('hide');
}



function modify(idCar,carName,anne,place,prix,description,imgName,idCateg,categorie,idType,type){
  document.querySelector("#type").value=idType;
  document.querySelector("#categorie").value=idCateg;
  $("#idCar").val( idCar );
  $("#carName").val( carName );
  $("#anne").val(anne);
  $("#place").val(place);
  $("#prix").val(prix);
  $("#description").val(description);
  $("#imgName").attr("src", imgName);


  document.getElementsByName('type')[0].options[0].innerHTML = type;
  //$("#category")[0].options[0].innerHTML=categorie;
  document.getElementsByName('categorie')[0].options[0].innerHTML = categorie;
  //$("#categorie").value=idCateg;
  $("#firstOption").hide();
  $("#firstOption2").hide();
}



function deletePub(id){
  $("#idCarDel").val( id );
}
</script>

     