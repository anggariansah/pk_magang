
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

  <label for="user-email">&nbsp;NIM</label><br>
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
<a href="<?php echo site_url("daftar")?>" id="signup"><br>Belum punya akun?</a>
</div>

	
</div>
</body>
</html>
