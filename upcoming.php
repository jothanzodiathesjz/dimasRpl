<div class="container" data-aos="fade-up">
    <div class="section-header">
        <h2>Up Coming</h2>
    </div>
    <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        <?php
        require_once('./koneksi/db-konek.php');
        $query = mysqli_query($koneksi, "SELECT * FROM film WHERE kategory='upcoming'");
        $url = './public/images/';
        while ($q = mysqli_fetch_array($query)) {
        ?>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="service-item  position-relative mx-auto">
                    <img src="<?php echo filter_var($q["poster"], FILTER_VALIDATE_URL) ? $q["poster"] : './public/images/' . $q['poster'] ?>">
                </div>
                <h5 class="text-center mt-3"><?php echo $q['judul'] ?></h5>
            </div>
        <?php
        }
        ?>
    </div>

</div>