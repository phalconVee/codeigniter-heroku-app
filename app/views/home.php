<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Codeigniter 3 OAUTH App - Login</title>
  <!-- CORE CSS-->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<style type="text/css">
html,
body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
}
.margin {
  margin: 0 !important;
}
</style>
  
</head>

<body class="red">


  <div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form" method="post" action="<?=base_url('login');?>">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?=base_url('assets/img/logo-x.png');?>" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">Codeigniter 3.x OAUTH App Demo</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input class="validate" id="email" type="email">
            <label for="email" data-error="wrong" data-success="right" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
        
        <div class="row">
          <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
          	
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="input-field col s12">
            <a href="<?=$googelAuthUrl;?>"><img src="<?=base_url('assets/img/glogin.png');?>" alt="google" class="responsive-img valign profile-image-login"/></a>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <a href="<?=$facebookAuthUrl;?>"><img src="<?=base_url('assets/img/flogin.png');?>" alt="facebook" class="responsive-img valign profile-image-login"/></a>
          </div>
        </div>


        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="<?=base_url('register');?>">Register Now!</a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="<?=base_url('forgot_password');?>">Forgot password?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>


  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!--materialize js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>

  
   <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
            © 2017 BigBros LLC
            <a class="grey-text text-lighten-4 right" href="https://henryugochukwu.herokuapp.com">Henry Ugochukwu</a>
            </div>
          </div>
  </footer>
</body>

</html>