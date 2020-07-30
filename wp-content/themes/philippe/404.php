<?php get_header(); ?>

<!-- Section 1 -->
<div id="section1" class="h-100 container-fluid">

<header class="container-fluid">

  <!-- Barre de navigation -->
  <nav class="navbar navbar-light bg-auto justify-content-around">

    <div class="dropdown">
      <button class="btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?php bloginfo('template_directory'); ?>/img/faun_template_3TRAITS.webp" alt="Menu">
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php">Accueil</a>
        <a class="dropdown-item" href="index.php#section1">Us</a>
        <a class="dropdown-item" href="les-concerts-du-coin/">Concerts</a>
        <a class="dropdown-item" href="index.php#section3">Videos</a>
        <a class="dropdown-item" href="index.php?page_id=63">Archives</a>
        <a class="dropdown-item" href="index.php#section4">Contact</a>
      </div>
    </div>

    <a href="index.php#section4" class="btn text-center font-weight-bold text-uppercase" id="faunNav">faun</a>

    <div class="dropdown">
      <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?php bloginfo('template_directory'); ?>/img/faun_template_LOUPE.webp" alt="Recherche">
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <?php get_search_form(); ?>
      </div>
    </div>

  </nav>

</header>

<div class="row" id="musicMore">
  <div class="icon-bar col-4 d-flex flex-column">
    <a href="#section1" class="effetBar">1</a>
    <a href="#section2" class="effetBar">2</a>
    <a href="#section3" class="effetBar">3</a>
    <a href="#section4" class="effetBar">4</a>
  </div>

  <div class="row d-flex flex-column text-uppercase">

    <h1 class="d-flex flex-column align-items-start pb-5 pt-5">
      <span id="safe">a safe kind</span><br>
      <span id="music" class="font-weight-bold">music is</span><br>
      <span id="high" class="font-weight-bold">of high</span>
    </h1>

    <div class="d-flex">
      <a href="noway.php" class="btn btn-outline-light font-weight-bold text-center"><span id="viewMore">view more</span></a>
    </div>

  </div>
</div>

</div>

<!-- Section 2 -->
<div id="section2" class="container-fluid">

  <div class="row">

    <div class="container">

      <div class="row">
        <div class="container col-sm-12">
        <!-- <div id="outUs">out us</div> -->
        <div id="about" class="container-fluid px-3 py-3">

          <h1 class="display-2 page-title text-center py-5">Erreur 404 : Page Non Trouvée</h1>
          <p align="center"><a href="index.php"><img src="https://cdn.webandseo.fr/wp-content/uploads/2015/07/onsydney.webp" alt="Erreur 404" /></a></p>
          <p class="lead text-center py-3">Nous sommes désolé mais la page que vous cherchez n'est pas ou plus disponible.<br>
            Nous vous suggérons de vous rendre sur <a href="<?php bloginfo('wpurl'); ?>">la page
            d'accueil</a> du site ou d'effectuer une nouvelle recherche :</p>

          <?php //get_search_form(); ?>

          <div class="text-center bg-light lead">
          <p class="font-weight-bold">Découvrez nos derniers articles :</p>
          <ul>
            <?php
            $my_query = new WP_Query('showposts=2');
            while ($my_query->have_posts()) : $my_query->the_post();
            ?>
            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
            <?php
          endwhile;
          ?>
        </ul>
      </div>

        </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Footer -->
<div id="footer" class="d-flex container-fluid flex-column text-uppercase text-center">
  <a href="#section1" class="btn font-weight-bold" id="faun">faun</a>
  <div id="allRights">all rights reserved by faun template for rock band</div>
</div>


<?php get_footer(); ?>
