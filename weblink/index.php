<?php
include 'koneksi.php';
include 'function.php';
?>
<?php include 'header.php'; ?>
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="assets_home/assets/img/bg.jpg" alt="">
          <div class="carousel-container">
            <h2>Selamat Datang Di Website B-Link</h2>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
		<img src="assets_home/assets/img/bg.jpg" alt="">
          <div class="carousel-container">
            <h2>Selamat Datang Di Website B-Link</h2>
          </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->
</main>
<?php
include 'footer.php';
?>