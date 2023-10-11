<div class="container-pagination">
    <div>
        <ul class="pagination flex-pagination">
            <li class="page-item <?php if ($halaman == 1) {
                echo "disabled";
            } ?>">
                <a class="page-link" <?php if ($halaman > 1) {
                    echo "href=?halaman=" . $previous;
                } ?>>Previous</a>
            </li>

            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                <li class="page-item"><a class="page-link <?php if ($x == $halaman) {
                    echo "active";
                } ?>" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php

            }

            ?>



            <li class="page-item <?php if ($halaman == $total_halaman) {
                echo "disabled";
            } ?>">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                    echo "href=?halaman=" . $next;
                } ?>>Next</a>
            </li>
        </ul>
    </div>
</div>