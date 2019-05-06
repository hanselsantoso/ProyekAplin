<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "connection.php";
        include "adminNavbar.php";
    ?>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
    <div class="row">
        <?php include "adminDashboard.php" ?>
        <div class="col s10">
        <div style="text-align: center">
            <h1>Tambah Ruangan</h1>
            <div class="container">
                <div class="input-field">
                <input id="Nama" type="text" class="validate">
                <label for="Nama">Nama Ruangan</label>
                </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
        </div>
    </div>
    
</body>

</html>