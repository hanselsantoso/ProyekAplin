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
            <h1>Tambah Kelas</h1>
            <div class="container">
                <div class="input-field">
                    <select>
                    <option value="" disabled selected>Pilih Mata Kuliah</option>
                    <option value="1">ASIB</option>
                    <option value="2">APLIN</option>
                    <option value="3">ADS</option>
                    </select>
                    <label>Pilih Mata Kuliah</label>
                </div>
                <div class="input-field">
                    <select>
                    <option value="" disabled selected>Pilih Jadwal Kuliah</option>
                    <option value="1">08.00-10.30</option>
                    <option value="2">10.30-13.00</option>
                    <option value="3">13.00-15.30</option>
                    </select>
                    <label>Pilih Jadwal Kuliah</label>
                </div>
                <div class="input-field">
                    <select>
                    <option value="" disabled selected>Pilih Dosen Pengajar</option>
                    <option value="1">Hansel</option>
                    <option value="2">Kevin</option>
                    <option value="3">Adriel</option>
                    <option value="3">Aldo</option>
                    </select>
                    <label>Pilih Dosen Pengajar</label>
                </div>
                <div class="input-field">
                    <select>
                    <option value="" disabled selected>Pilih Ruangan</option>
                    <option value="1">L-304</option>
                    <option value="2">L-204</option>
                    <option value="3">N-110</option>
                    <option value="3">E-305</option>
                    </select>
                    <label>Pilih Ruangan</label>
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