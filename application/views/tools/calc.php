<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/')  ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/')  ?>css/sb-admin-2.min.css" rel="stylesheet">
    <style media="screen">
    .register{
      background: -webkit-linear-gradient(left, #3931af, #00c6ff);
      margin-top: 3%;
      padding: 3%;
    }
    .register-left{
      text-align: center;
      color: #fff;
      margin-top: 4%;
    }
    .register-left input{
      border: none;
      border-radius: 1.5rem;
      padding: 2%;
      width: 60%;
      background: #f8f9fa;
      font-weight: bold;
      color: #383d41;
      margin-top: 30%;
      margin-bottom: 3%;
      cursor: pointer;
    }
    .register-right{
      background: #f8f9fa;
      border-top-left-radius: 10% 50%;
      border-bottom-left-radius: 10% 50%;
    }
    .register-left img{
      margin-top: 15%;
      margin-bottom: 5%;
      width: 25%;
      -webkit-animation: mover 2s infinite  alternate;
      animation: mover 1s infinite  alternate;
    }
    @-webkit-keyframes mover {
      0% { transform: translateY(0); }
      100% { transform: translateY(-20px); }
    }
    @keyframes mover {
      0% { transform: translateY(0); }
      100% { transform: translateY(-20px); }
    }
    .register-left p{
      font-weight: lighter;
      padding: 12%;
      margin-top: -9%;
    }
    .register .register-form{
      padding: 10%;
      margin-top: 10%;
    }
    .btnRegister{
      float: right;
      margin-top: 10%;
      border: none;
      border-radius: 1.5rem;
      padding: 2%;
      background: #0062cc;
      color: #fff;
      font-weight: 600;
      width: 50%;
      cursor: pointer;
    }
    .register .selectpicker{
      margin-top: 3%;
      border: none;
      background: #0062cc;
      border-radius: 1.5rem;
      width: 28%;
      float: right;
      color: white;
      text-align: center;
    }
    .register .selectpicker optgroup{
      padding: 2%;
      height: 34px;
      font-weight: 600;
      color: black;
      border-top-right-radius: 1.5rem;
      border-bottom-right-radius: 1.5rem;
    }
    .register .selectpicker option{
      border: none;
    }
    .register .selectpicker option{
      width: 100px;
      color: #0062cc;
      border: 2px solid #0062cc;
      border-top-left-radius: 1.5rem;
      border-bottom-left-radius: 1.5rem;
    }
    .register-heading{
      text-align: center;
      margin-top: 8%;
      margin-bottom: -15%;
      color: #495057;
    }
    </style>
  </head>
  <body>


<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from reaching your good grade!</p>
                        <!-- <input type="submit" name="" value="Login"/><br/> -->
                    </div>
                    <div class="col-md-9 register-right">
                      <select name="pilih" id="mySelect"class="selectpicker" onchange="myFunction();">
                        <option selected isabled>pilih menu</option>
                        <optgroup label="Distribusi Teoritis Diskrit">
                          <option value="1">Binominal</option>
                          <option value="2">Poisson</option>
                          <option value="3">hipergeometrik</option>
                          <option value="4">multinominal</option>
                        </optgroup>
                        </select>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading" id="untuk">Stat Calculator to </h3>
                                <div class="row register-form">
                                    <div class="col-md-6" >
                                      <form class="" action="<?= base_url('tools/calc')  ?>" method="get" id="yourDivName">

                                      </form>
                                    </div>

                                    <div class="col-md-6">
                                        <p>hasil : <?php echo $hasil; ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>





    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/')  ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/')  ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/')  ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/')  ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url('assets/')  ?>js/calc.js" ></script>

  </body>



</html>
