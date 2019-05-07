<?php
    include "connection.php";
    include "function.php";
   // if(isset($_REQUEST["session"]))
   // {
      session_destroy();
    //}
    if (isset($_POST["loginDosen"])) {
      header("location:loginDosen.php");
    }
    if (isset($_POST["loginMhs"])) {
      header("location:loginMahasiswa.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "navbar.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <br><br><br>
  <div class="container">
    <div class="row">
      <div style="width:40%; height:400px; border-radius: 30%;" class="col s5 light-blue">
      <br><br><br><br><br>
          <div style="text-align: center; color: white"><h3>Login Dosen</h3></div>
          <div style="text-align: center">
          <form method="post">
            <button class="btn waves-effect waves-light light-blue darken-3" type="submit" name="loginDosen">Login
              <i class="material-icons right">send</i>
            </button>
          </form>
          </div>
          
      </div>
      <div class="col s2">  
      </div>
      <div style="width:40%; height:400px; border-radius: 30%;" class="col s5 light-blue">
      <br><br><br><br><br>
          <div style="text-align: center; color: white"><h3>Login Mahasiswa</h3></div>
          <div style="text-align: center">
          <form method="post">
            <button class="btn waves-effect waves-light light-blue darken-3" type="submit" name="loginMhs">Login
              <i class="material-icons right">send</i>
            </button>
          </form>
            
          </div>
          
      </div>
    </div>
  </div>

</body>
<script>
    $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
</script>
</html>