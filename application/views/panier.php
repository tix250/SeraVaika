<div class="container">

  <div class="row">
  <div class="col-lg-1 m-0">
  </div>
    <div class="col-lg-10">
      <h1>Les produits dans votre panier</h1>
      <table class="table">
        <thead class="thead-light">
          <tr>

            <th>Nom</th>
            <th>Année </th>
            <th>Description</th>
            <th>Prix</th>
          </tr>
        </thead>
        <tbody>

          <?php if ($produitPanier != null) { ?>
            <?php for ($i = 0; $i < count($produitPanier); $i++) { ?>
              <tr>
                <form action="<?php echo base_url(); ?>index.php/PanierControlleur/modifier/<?php echo ($produitPanier[$i]['idProduitsV']); ?>" method="get">
                  <td><?php echo ($produitPanier[$i]['nom']); ?></td>
                  <td><?php echo ($produitPanier[$i]['anne']); ?></td>
                  <td><?php echo ($produitPanier[$i]['descriptionPlus']); ?></td>
                  <td><?php echo ($produitPanier[$i]['prixAchat']); ?></td>
                  <td><input value="<?php echo ($produitPanier[$i]['nombre']); ?>" type="number" min="1" name="quantite"></td>
                  <td><a href="<?php echo base_url(); ?>index.php/PanierControlleur/suprimer/<?php echo ($produitPanier[$i]['idProduitsV']); ?>"><img src="<?php echo images_url("supprimer.png"); ?>" alt="" width="40%"> </a></td>
                  <td><button>
                      <!--<i class="far fa-edit"></i>--><img src="<?php echo images_url("modifier.png"); ?>" alt="" width="60%"></button></td>
                </form>
            <?php }
          } ?>

        </tbody>
      </table>


    </div>
  </div>

  <div class="row">
  <div class="col-lg-1 m-0">
  </div>
  <div class="col-lg-10 m-0">
    <div class="checkout">
      <div class="checkout-inner">

        <div class="checkout-summary">
          <h1>Panier Total</h1>
          <h2>Prix Total : <span><?php echo ($prixPanier); ?> MGA</span></h2>
        </div>


        <div class="checkout-payment">
          <form action="<?php echo site_url_spx('Checkout') ?>">
            <div class="checkout-btn">
              <button>Valider</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>