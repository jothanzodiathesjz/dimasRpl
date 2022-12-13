<?php
include("header.php")
?>
<section id="hero" class="hero bg-dark">
    <div class="container position-relative">
        <div class="row gy-5" data-aos="fade-in">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>Welcome to <span>DMovie</span></h2>
                <p>Nikmati Layanan Kami sekarang juga</p>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#services" class="btn-get-started">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=0uf6QUacVgs" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <img src="./public/images/banner.jpg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
            </div>
        </div>
    </div>

    </div>
</section>
<!-- End Hero Section -->

<main id="main">
    <section id="services" class="services sections-bg">
        <?php
        include("./nowplaying.php")
        ?>
    </section><!-- End Our Services Section -->

</main><!-- End #main -->

<?php
include("footer.php")
?>