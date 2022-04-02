  <!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script> -->
  <section class="section-background"> 
  <div class="container" ng-controller="profilControler">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="<?php echo images_url(""); ?>/<?php echo $user[0]->getImage(); ?>" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4><?php echo $user[0]->getNom() . " " . $user[0]->getPrenom(); ?></h4>
                  <p class="text-secondary mb-1"><?php echo $user[0]->getAdresse(); ?></p>

                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <p class="text-muted font-size-sm text-center">Transactions </p>
                <div class="text-center transaction">
                  <a class="btn btn-outline-primary" data-toggle="modal" data-target="#formModalDepot">Depot</a>
                  <a class="btn btn-outline-primary" data-toggle="modal" data-target="#formModalRetrait" onclick="depot()">Retrait</a>
                </div>
              </li>
            </ul>
            <p class="text-center">Vous avez <?php echo number_format($montant); ?> MGA sur votre compte</p>
          </div>
          <br>
         
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nom</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user[0]->getNom(); ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Prenom</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user[0]->getPrenom(); ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Date de naissance</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user[0]->getDateDeNaissance(); ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user[0]->getEmail(); ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $user[0]->getAdresse(); ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                </div>
              </div>
            </div>

          </div>
          <div class="row gutters-sm">

            <div class="col-sm-3 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3" style="text-align: center;">CATEGORIES</h6>
                  <hr />
                  <?php for ($i = 0; $i < count($categorie); $i++) { ?>
                    <p><a class="btn btn-block" href="<?php echo site_url_spx("ProfileControlleur/statistique/" . $categorie[$i]['idCategories'] . ""); ?>"><i class="material-icons text-info mr-2"><?php echo  $categorie[$i]['nom']; ?></i></a></p>
                  <?php } ?>
                </div>
              </div>
            </div>

            <div class="col-sm-9 mb-3">
              <div class="card h-100">
                <canvas id="Statistique"></canvas>
              </div>
            </div>

          </div>
        </div>
      </div>

      </br>
      <hr>
      <div class="col-md-12 col-sm-12">
        <div class="section-title text-center">
          <h2>My Featured Cars </h2>
        </div>
      </div>
      </br>
      </br>
      </br>
      <hr>
      </br>
      </br>


      <div class="col-lg-12 col-xs-12" style="background-color: #f3f6ff;">

        <div class="row" style="margin-bottom:1%;">
          <?php foreach ($listeVoiture as $voiture) { ?>
            <div class="col-lg-4 col-md-3 col-sm-4" style="margin-top: 1%;">
              <div class="courses-thumb courses-thumb-secondary">
                <div class="courses-top">
                  <div class="courses-image">
                    <img src="<?php echo images_url($voiture['imgName']) ?>" class="img-responsive" alt="">
                  </div>
                  <div class="courses-date">
                    <span title="Author"><i class="fa fa-cube"></i><?php echo $voiture['places'] ?> places</span>
                    <!-- <span title="Author"><i class="fa fa-cube"></i> 1800cc</span> -->
                    <span title="Views"><i class="fa fa-cog"></i><?php echo $voiture['categorie'] ?> </span>
                  </div>
                </div>

                <div class="courses-detail">
                  <h3><a href="car-details.html"><?php echo $voiture['nom'] ?></a></h3>

                  <p class="lead"> <strong><?php echo $voiture['prix'] ?></strong></p>

                  <p><?php echo $voiture['anne'] ?> &nbsp;&nbsp;/&nbsp;&nbsp; <?php echo $voiture['annonce'] ?></p>
                </div>

                <div class="courses-info">
                  <a href="<?php echo site_url_spx("listeArticleController/carsDetails/" . $voiture['idProduitsV']); ?>" class="section-btn btn btn-primary btn-block">Details</a>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <a onclick="modify('<?php echo $voiture['idProduitsV'] ?>','<?php echo $voiture['nom'] ?>','<?php echo $voiture['anne'] ?>','<?php echo $voiture['places'] ?>','<?php echo $voiture['prix'] ?>','<?php echo $voiture['descriptionPlus'] ?>','<?php echo images_url($voiture['imgName']) ?>','<?php echo $voiture['idCategorie'] ?>','<?php echo $voiture['categorie'] ?>','<?php echo $voiture['idType'] ?>','<?php echo $voiture['annonce'] ?>')" style="width:115px" data-toggle="modal" data-target="#formModal" class="section-btn btn btn-modify btn-block modify" onclick=""> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                      </svg> Modify</a>
                  </div>
                  <div class="col-md-4">
                    <a onclick="deletePub('<?php echo $voiture['idProduitsV'] ?>')" data-toggle="modal" data-target="#formModalDel" style="width:115px" class="section-btn btn btn-delete btn-block "> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                      </svg> Delete</a>
                  </div>
                </div>

              </div>
            </div>

          <?php } ?>

          <div class="col-md-12 col-md-12 col-xs-12">

            <a href="<?php echo site_url_spx("TreatmentVendeur/carsVendeur/") ?>" class="section-btn btn btn-primary btn-block">Tout Afficher</a>

          </div>
          </br>
          </br>

        </div>
        </br>
      </div>
      
      <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="background-color:antiquewhite; width:1000px">
            <div class="modal-header">
              <h3 class="modal-title" id="formModalLabel">Awesome Form</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <input type="hidden" name="url" value="<?php echo site_url_spx('ProfileControlleur/accesProfile/') ?>">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4 col-lg-4 col-xs-4">
                  <div class="courses-image">
                    <img id="imgName" class="img-responsive" alt="">
                  </div>
                  </br>
                  <form action="<?php echo site_url_spx('UploadImage/do_upload') ?>" method="POST" enctype='multipart/form-data'>
                    <input type="file" name="file"> <br /><br />
                    <input type="submit" value="Upload" name="upload" />
                  </form>
                </div>
                <form action="<?php echo site_url_spx('treatmentVendeur/updatePublication') ?>" method="post">
                  <div class="col-md-7 col-lg-7 col-xs-7">
                    <input type="hidden" id="idCar" name="idCar">
                    <div class="form-group row">

                      <label for="carName" class="col-sm-6 col-form-label">
                        Nom de la voiture
                      </label>
                      <div class="col-sm-6">
                        <input type="text" name="carName" class="form-control" id="carName" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="lastName" class="col-sm-6 col-form-label">
                        Anne
                      </label>
                      <div class="col-sm-6">
                        <input type="text" name="anne" class="form-control" id="anne" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="lastName" class="col-sm-6 col-form-label">
                        Place
                      </label>
                      <div class="col-sm-6">
                        <input type="text" name="place" class="form-control" id="place" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="lastName" class="col-sm-6 col-form-label">
                        Prix
                      </label>
                      <div class="col-sm-6">
                        <input type="text" name="prix" class="form-control" id="prix" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="lastName" class="col-sm-6 col-form-label">
                        Categorie
                      </label>
                      <div class="col-sm-6">
                        <select id="categorie" name="categorie">
                          <option selected="selected" id="firstOption"></option>
                          <?php foreach ($lCategory as $Categ) { ?>
                            <option value="<?php echo $Categ['idCategories'] ?>"><?php echo $Categ['nom'] ?></option>
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
                          <option selected="selected" id="firstOption2"></option>
                          <?php foreach ($lType as $type) { ?>
                            <option value="<?php echo $type['idTypeA'] ?>"><?php echo $type['nom'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="lastName" class="col-sm-6 col-form-label">
                        Description
                      </label>
                      <div class="col-sm-6">
                        <textarea style="height:150px" name="description" class="form-control" id="description"></textarea>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="col-md-6">
                <button style="width:150px" class="section-btn btn btn-modify btn-block modify">Modify</button>

              </div>
              <div class="col-md-6">
                <a style="width:150px" data-dismiss="modal" class="section-btn btn btn-delete btn-block modify">Cancel</a>

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
                  <button style="width:150px" class="section-btn btn btn-delete btn-block modify">Oui</button>

                </div>
                <div class="col-md-6">
                  <a style="width:150px" data-dismiss="modal" class="section-btn btn btn-primary btn-block modify">Non</a>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="formModalDepot" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content text-center depot" style="background-color:white;margin-bottom:10px;" class="">
            <h2>Formulaire de depot</h2>
            <p>Le depot minimum autorisé est de 5000 MGA </p>
            <form action="<?php echo site_url_spx('Transaction/depot') ?>" method="post" id="formAwesome">
              <span> Montant : <br> <input type="text" name="argent" ng-model="argent" ng-init="argent=0" /> </span> <br>
              <p ng-if="!isPositive(argent)"> Entrer un chiffre </p>
              <span ng-if="isPositive(argent)"> <input class="btn btn-outline-primary validerDepot" type="submit" value="VALIDER"> </span>

            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="formModalRetrait" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content text-center depot" style="background-color:white;margin-bottom:10px;" class="">
            <h2>Formulaire de retrait</h2>
            <p ng-model="montant" ng-init="montant=<?php echo $montant ?>">Vous avez <?php echo $montant ?> MGA sur votre compte</p>
            <form action="<?php echo site_url_spx('Transaction/retrait') ?>" method="post" id="formAwesome">
              <p ng-if="montant==0"> Retrait impossible </p>
              <span> Montant : <br> <input type="text" name="argent" ng-model="argent2" ng-init="argent2=0" /> </span> <br>
              <p ng-if="!isPositive(argent2) "> Entrer un chiffre </p>

              <span ng-if="isPositive(argent2) && montant>0"> <input class="btn btn-outline-primary validerDepot" type="submit" value="VALIDER"> </span>

            </form>
          </div>
        </div>
      </div>
      <style type="text/css">
        body {
          margin-top: 20px;
          color: #1a202c;
          text-align: left;
          background-color: #e2e8f0;
        }

        .main-body {
          padding: 15px;
        }

        .card {
          box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
          position: relative;
          display: flex;
          flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          background-color: #fff;
          background-clip: border-box;
          border: 0 solid rgba(0, 0, 0, .125);
          border-radius: .25rem;
        }

        .card-body {
          flex: 1 1 auto;
          min-height: 1px;
          padding: 1rem;
        }

        .gutters-sm {
          margin-right: -8px;
          margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
          padding-right: 8px;
          padding-left: 8px;
        }

        .mb-3,
        .my-3 {
          margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
          background-color: #e2e8f0;
        }

        .h-100 {
          height: 100% !important;
        }

        .shadow-none {
          box-shadow: none !important;
        }
      </style>

      <script>
        (function() {
          var donnees = JSON.parse('<?php echo $tousVoitureC; ?>');
          var total = JSON.parse('<?php echo $nombreVoitureParCategorie; ?>');
          var ctx = $("#Statistique");
          var labelsIn = [];
          var dataIn = [];
          var compteur = 0;
          if (donnees.voitureCategorie.length > 5) {
            compteur = 5;
          } else compteur = donnees.voitureCategorie.length;
          for (let index = 0; index < compteur; index++) {
            labelsIn.push(donnees.voitureCategorie[index]['nomVoiture']);
            dataIn.push((donnees.voitureCategorie[index]['nombreVoitureParCategorie'] * 100) / total.total[0]['nombreVoiture']);
          }
          var data = {
            labels: labelsIn,
            datasets: [{
              backgroundColor: "#29ca8e",
              borderColor: "#29ca8e",
              data: dataIn,
            }]
          };
          var options = {
            responsive: true,
            title: {
              display: true,
              position: "top",
              text: "STASTIQUE",
              fontSize: 30,
              fontColor: "#29ca8e"
            },
            legend: {
              display: false,
            },
            scales: {
              xAxes: [{
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                maxBarThickness: 30,
              }],
              yAxes: [{
                ticks: {
                  min: 0,
                  max: 100,
                  stepSize: 20
                }
              }],
            }
          };
          var chart1 = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options
          });

        });
      </script>
      <script>
        // var form = document.getElementById("formAwesome");
        // form.addEventListener("submit", onSubmitForm);

        function onSubmitForm(e) {
          e.preventDefault();
          $('#formModal').modal('hide');
          $('#btnStart').hide();
          $('#message').show();
          $('modal fade').modal('hide');
        }

        function cancel() {
          $('#modal fade').modal('hide');
        }

        function modify(idCar, carName, anne, place, prix, description, imgName, idCateg, categorie, idType, type) {
          document.querySelector("#type").value = idType;
          document.querySelector("#categorie").value = idCateg;
          $("#idCar").val(idCar);
          $("#carName").val(carName);
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

        function depot() {

        }


        function deletePub(id) {
          $("#idCarDel").val(id);
        }
      </script>

    </div>
    </div>
    </section>
