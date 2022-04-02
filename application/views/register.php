<style>
    .bg-register-image{background:url(<?php echo images_url('wallpapertip_car-wallpaper-hd-for_112010.jpg'); ?>);background-position:center;background-size:cover}
</style>
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?php echo site_url_spx("InscriptionController/confirmLogin") ?>">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="nom"
                                        placeholder="First Name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" name="prenom"
                                        placeholder="Last Name"required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                                    placeholder="Email Address"required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="contact" name="contact"
                                        placeholder="Contact"required>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" style="border-radius:20px; height:50px;" name="sexe">
                                        <option value="M">--Choose sexe --</option>
                                        <option value="M">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="date" class="form-control form-control-user" id="birthday" name="date"
                                        placeholder=""required>
                                </div>
                                <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="adresse" name="adresse"
                                        placeholder="Adresse"required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="cin" name="cin"
                                    placeholder="Entrez CIN"required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="pass"
                                        id="exampleInputPassword" placeholder="Password" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="passe"
                                        id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                </div>
                            </div>
                            <span id = "message" style="color:red"> </span> <br><br>
                            <div>
                                <?php if(isset($erreur)) {
                                    echo '<script>alert("Inscription échoué! Veuillez réessayez!")';
                                } ?>

                            </div>
                            <button type="submit" class="btn btn-primary" id="validation" style="width:500px;height: 40px;">Submit</button>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo site_url_spx("welcome/login") ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var myInput = document.getElementById("exampleRepeatPassword");
myInput.onkeyup = function()  {
  var pw1 = document.getElementById("exampleInputPassword").value;
  var pw2 = document.getElementById("exampleRepeatPassword").value;
  if(pw1 != pw2)
  {
    document.getElementById("message").innerHTML = "Password did not match";
    const button = document.getElementById('validation');
    button.disabled = true;
  }
  if(pw1 == pw2)
  {
    document.getElementById("message").innerHTML = "";
    const button = document.getElementById('validation');
    button.disabled = false;
  }
}
</script>
