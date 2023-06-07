
<?php
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style_login.css">
    <title> Login - Dokter</title>
</head>
<body>


     <div class="container d-flex justify-content-center align-items-center min-vh-100">
     <div class="row border rounded-5 p-3 bg-white shadow box-area">
     <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="vendor/1.png" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Bersama Kami</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Memberdayakan Kesehatan, Mengubah Hidup</small>
       </div> 


        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Login Dokter</h2>
                     
                </div>
             <form action="proses_login.php" method="POST">
                 <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<center>Login gagal! username dan password salah!</center>";
                } else if ($_GET['pesan'] == "logout") {
                    echo "<center>Anda telah berhasil logout</center>";
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "<center>Anda harus login untuk mengakses halaman dokter</center>";
                }
            }
            ?>
                <div class="input-group mb-3">
                 
                    <input type="text" name="username" class="form-control form-control-lg bg-light fs-6" placeholder="Username">
                </div>
                <div class="input-group mb-1">
                    <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                </div>
               <div>  <br></div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                </div>
                
          </div>
       </div> 
</form>
      </div>
    </div>

</body>
</html>