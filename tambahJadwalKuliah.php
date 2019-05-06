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
            $('.timepicker').timepicker();
        });
    </script>
    <div class="row">
        <?php include "adminDashboard.php" ?>
        <div class="col s10">
        <div style="text-align: center">
            <h1>Tambah Jadwal Kuliah</h1>
            <div class="container">
                <div class="input-field">
                <input type="text" class="timepicker">
                <label for="Nama">Waktu Awal</label>
                </div>
                <div class="input-field">
                <input type="text" class="timepicker">
                <label for="Password">Waktu Akhir</label>
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