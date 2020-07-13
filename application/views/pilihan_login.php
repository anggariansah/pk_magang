<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
  <title>Pilihan Login</title>
  <style>
    #card {
        background: #fbfbfb;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        height: 450px;
        margin: 5rem auto 8.1rem auto;
        width: 875px;
}
#cardpilihan1 {
        background: #fbfbfb;
        border-radius: 8px;
        box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
        margin-left: 70px;
        margin: 3rem;
        height: 160px;
        width: 160px;
        background-image: url('.../image/panitia.jpeg');
}


#gambar {
    cursor: pointer;
    cursor: hand;
}

#bg-img {
    background-image: url('.../image/panitia.jpeg');
    height: 200px;
    width: 200px;
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



body {
       background: -webkit-linear-gradient(bottom, #263578, #FFF8DC);
       background-repeat: no-repeat;
}

  </style>
</head> 
<body>
<div id="card">
<div id="card-content">
  <div id="card-title">
    <h2>LOGIN SIAK PKL</h2>
    <div class="underline-title"></div>
  </div>
  <table>
  <td>
  <div id="cardpilihan1">
  <a class="gambar" href="<?php echo site_url("login/login_panitia")?>"><img src="<?php echo base_url(); ?>assets/image/panitia.jpeg" style="width: 200px; height: 200px;"></a>
  </div>
  </td>
  <td>
  <div id="cardpilihan1">

  <a class="gambar" href="<?php echo site_url("login/login_mahasiswa")?>"><img src="<?php echo base_url(); ?>assets/image/mahasiswa.jpeg" style="width: 200px; height: 200px;"></a>

  </div>
  </td>
  <td>
  <div id="cardpilihan1">
  <a class="gambar" href="<?php echo site_url("login/login_pembimbing")?>"><img src="<?php echo base_url(); ?>assets/image/dosen.jpeg" style="width: 200px; height: 200px;"></a>

  </div>
  </td>
  </table>


</div>
</div>
  
</div>

</body>
</html>

