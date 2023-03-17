<?php
session_start();
include ("classes/dbh.classes.php");
include ("classes/profileinfo.classes.php");
include("classes/profileinfo-view.php");
$profileInfo = new ProfileInfoView();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edição de Perfil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">


  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">


  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="page-contact">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a class="logo d-flex align-items-center">
        <h1 class="d-flex align-items-center">PROJETO POO PHP</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="anunciarvaga.php">Minhas Vagas</a></li>
          <li><a href="vagas.php">Vagas</a></li>
          <li><a href="./includes/logout.inc.php">Logout</a></li>
      </nav>

    </div>
  </header>

  <main id="main">


    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Edição de Perfil</h2>

      </div>
      
    </div>
    <section id="contact" class="contact">
      

            <form method="POST" action="./includes/update.inc.php" role="form">
            <div class="container" data-aos="fade-up">
            <div class="row gy-4">
            <div class="center" data-aos="fade-up">
            <div class="team-member">
            <div class="member-info">
                <h3>Sobre:</h3>
                <br>
                <textarea name="sobre" rows="10" cols="60" placeholder="Diga um pouco sobre você e sobre seus objetivos."><?php $profileInfo->fetchSobre($_SESSION["userid"]);?></textarea>
                <br><br>
                <h3>Experiência de trabalho: </h3>
                <br>
                <textarea name="xp" rows="10" cols="60" placeholder="Diga um pouco sua experiencia de trabalho!"><?php $profileInfo->fetchXP($_SESSION["userid"]); ?></textarea>
                <br><br>
                <button type="submit" name="submit">Editar</button></div>
                </div>
              </div>
            </div>
            </form>


    
  </main>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>