<div class="checkout">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-inner">
                    <form action="<?php site_url_spx("") ?>" class="form">
                        <div class="billing-address">
                            <h2>Adresse</h2>
                            <div class="row">

                                <div class="col-md-12">
                                    <label>Address de livraison</label>
                                    <input class="form-control" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <p class="h6"> Vous allez recevoir un SMS et un recu PDF qui contient le CODE pour cette transaction </p>
                                        <p class="h6"> Votre produit vous sera livré dans 12H après validation du commande </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="submit" value="LANCER" class="btn btn-outline-success checkoutBUTN">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout">
                    <div class="checkout-inner">

                        <div class="checkout-summary">
                            <h1>Panier Total</h1>
                            <h2>Prix Total : <span><?php echo ($prixPanier); ?> AR</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>