<?php

include("ceksession.php");


include("../env.php");

$sql_get_akun = "SELECT * FROM akun WHERE id = $id_akun";
$run_get_akun = mysqli_query($conn, $sql_get_akun);
$row_get_akun = mysqli_fetch_assoc($run_get_akun);


?>

<?php
include("head.php");
?>

<body>

    <?php
    include("nav.php");
    ?>

    <div class="container-menu">
        <div class="title-menu">Pengaturan</div>
    </div>

    <div class="center-container-margin">
        <div class="container-margin">

            <div class="card card-margin-kerajang size-card-informasi shadow">
                <div class="card-body">

                    <form action="simpanprofil.php" method="post">
                        <h5 class="card-title-informasi">Nama</h5>

                        <div class="mt-3 mb-3">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?php echo $row_get_akun["nama"]; ?>">
                        </div>

                        <h5 class="card-title-informasi">Telepon</h5>

                        <div class="mt-3 mb-3">
                            <input type="number" class="form-control" id="telepon" name="telepon"
                                value="<?php echo $row_get_akun["telepon"]; ?>" onchange="nomorWa()">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>


                </div>
            </div>


        </div>
    </div>

    <div class="blox-nav"></div>

    <?php include("../utility/nomorwa.php"); ?>
</body>

</html>