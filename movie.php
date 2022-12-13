<?php
include("header.php")
?>
<main id="main">
  <?php

  ?>
  <!-- ======= Breadcrumbs ======= -->
  <div class="movienav">
    <ul class="list-unstyled d-flex gap-3 align-items-center">
      <li><a href="movie.php">Now Playing</a></li>
      <li><a href="movie.php?page=upcoming">Up Comming</a></li>
    </ul>
  </div>
  <!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <?php
    require_once("./koneksi/mainpage.php")
    ?>
  </section><!-- End Blog Section -->

</main><!-- End #main -->

<?php
include("footer.php")
?>