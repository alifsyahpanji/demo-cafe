<?php

# SQL Detail Pesanan

$sql_detail_pesanan = "SELECT detail_pesanan.jumlah, detail_pesanan.keterangan, detail_pesanan.jumlah * detail_pesanan.harga AS total_harga_item, menu.nama, menu.foto FROM pesanan INNER JOIN detail_pesanan ON pesanan.id = detail_pesanan.id_pesanan INNER JOIN menu ON detail_pesanan.id_menu = menu.id WHERE pesanan.id = $id_pesanan";
$run_detail_pesanan = mysqli_query($conn, $sql_detail_pesanan);
$count_detail_pesanan = mysqli_num_rows($run_detail_pesanan);

?>

<div class="container-card-center">
    <div class="container-card-size">


        <?php

        if ($count_detail_pesanan > 0) {
            while ($row_detail_pesanan = mysqli_fetch_assoc($run_detail_pesanan)) {
                ?>

                <div class="card card-margin" style="width: 290px">
                    <img src="../assets/image/file/<?php echo $row_detail_pesanan["foto"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row_detail_pesanan["nama"]; ?>
                        </h5>
                        <div>Jumlah: <span class="fw-bolder ms-1">
                                <?php echo $row_detail_pesanan["jumlah"]; ?>
                            </span></div>
                        <div>Total Harga Item: <span class="fw-bolder ms-1">
                                <?php echo rupiah($row_detail_pesanan["total_harga_item"]); ?>
                            </span></div>
                        <div>Keterangan: <span class="fw-bolder ms-1">
                                <?php echo $row_detail_pesanan["keterangan"]; ?>
                            </span></div>
                    </div>
                </div>

                <?php
            }
        }

        ?>


    </div>
</div>