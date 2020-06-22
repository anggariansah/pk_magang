<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/dist/css/adminlte.min.css">
  <!-- Link css-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-20">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="media">
              <img src="<?php echo base_url(); ?>assets/image/undraw_quitting_time_dm8t.png" alt="User Avatar">
              <!-- <img src="<?php echo base_url(); ?>assets/image/himatik.jpeg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
              <div class="col-lg-7">
              <div class="col-lg-7">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Cari dan Daftarkan perusahaan yang ingin kamu tuju</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="NIM">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="text-right">
                    <a class="small" href="forgot-password.html">lupa password?</a>
                  </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <a href="<?php echo site_url("pkl_mahasiswa")?>" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
                  <div class="text-center">
                    <a class="small" href="<?php echo site_url("daftar")?>">Daftar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>




</body>
</head>
</html>
	<title>LOGIN SIAPKL</title>
<style>
	body {

       background: -webkit-linear-gradient(bottom, #FFFFFF, #FFFFFF);
       background-repeat: no-repeat;

	}
	#login {
        background: #fbfbfb;;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        height: 440px;
        margin: 6rem auto 8.1rem auto;
        width: 365px;
	}

	#card-content {
      padding: 12px 44px;
	}
	#card-title {
      font-family: "Raleway Thin", sans-serif;
      letter-spacing: 4px;
      padding-bottom: 23px;
      padding-top: 13px;
      text-align: center;
	}
	.underline-title {
      background: -webkit-linear-gradient(right, #263578, #FFF8DC);
      height: 2px;
      margin: -1.1rem auto 0 auto;
      width: 89px;
	}
	a {
    text-decoration: none;
}
label {
    font-family: "Raleway", sans-serif;
    font-size: 11pt;
}
#forgot-pass {
    color: #263578;
    font-family: "Raleway", sans-serif;
    font-size: 10pt;
    margin-top: 3px;
    text-align: right;
}
.form {
    align-items: left;
    display: flex;
    flex-direction: column;
}
.form-border {
    background: -webkit-linear-gradient(right, #263578, #263578);
    height: 1px;
    width: 100%;
}
.form-content {
    background: #fbfbfb;
    border: none;
    outline: none;
    padding-top: 30px;
}
#signup {
    color: #263578;
    font-family: "Raleway", sans-serif;
    font-size: 10pt;
    margin-top: 16px;
    text-align: center;
}
#submit-btn {
    background: -webkit-linear-gradient(right, #263578, #263578);
    border: none;
    border-radius: 21px;
    box-shadow: 0px 1px 8px #263578;
    cursor: pointer;
    color: white;
    font-family: "Raleway SemiBold", sans-serif;
    height: 42.3px;
    margin: 0 auto;
    margin-top: 60px;
    transition: 0.25s;
    width: 278px;
}
#submit-btn:hover {
    box-shadow: 0px 1px 18px #263578;
}
	
</style>
</head>
<body>
<div id="login">
<div id="card-content">
  <div id="card-title">
    <h2>LOGIN</h2>
    <div class="underline-title"></div>
  </div><br>

  <label for="user-email">&nbsp;Username</label><br>
  <input
   id="user-email"
   class="form-content"
   type="email"
   name="email"
   required />
  <div class="form-border"></div><br>

  <label for="user-password">&nbsp;Password</label><br>
  <input
   id="user-password"
   class="form-content"
   type="password"
   name="password"
   required />
  <div class="form-border"></div>

<a href="#"><legend id="forgot-pass">Lupa password?</legend></a>
<input id="submit-btn" type="submit" name="submit" value="LOGIN" />
<a href="<?php echo site_url("pkl_mahasiswa/daftar")?>" id="signup"><br>Belum punya akun?</a>
</div>

	
</div>
</body>
</html>
