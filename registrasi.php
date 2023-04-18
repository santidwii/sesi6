<?php
    include_once("konfigurasi.php");
    $spn ="";
    if(isset($_POST["txNAMA"])){
       $pass1 = $_POST["txPASS1"];
       $pass2 = $_POST["txPASS2"];
       if($pass1==$pass2){
            $nama = $_POST["txNAMA"];
            $email = $_POST["txEMAIL"];
            $user = $_POST["txUSER"];

            $sql = "INSERT INTO tbuser(nama,email,username,passkey,iduser) VALUES('$nama','$email','$user','$pass1',md5($nama));";
            
            $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBPORT, DBNAME) or die("gagal koneksi ke dbms");
            $hasil = mysqli_query($cnn, $sql);
            if($hasil){
                $spn ="registrasi User Sukses, Silahkan login dengan user tersebut";
            }else{
                $spn = "registrasi Gagal, silahkan diulangi";
            }

      }else{
        $psn = "password tidak sama dengan konfirmasi password";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regestrasi</title>
</head>
<body>

<?php
    if($spn==""){
        echo"<div>".$spn."</div>";
    }
?>
<form action="registrasi.php" method="POST">
    <div>
        nama lengkap User 
        <input type="next" name="txNAMA">
    </div>
    <div>
        email 
        <input type="email" name="txEMAIL">
    </div>
    <div>
        User name 
        <input type="text" name="txUSER">
    </div>
    <div>
        Password  
        <input type="password" name="txPASS1">
    </div>
    <div>
        password<sup>konfirmasi</sup>
        <input type="password" name="txPASS2">
    </div>
    <div>
        <button type="submit">registrasi</button>
    </div>
</form>
</body>
</html>