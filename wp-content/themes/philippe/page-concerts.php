<?php
/*
Template Name: Modèle de Page Concerts
*/
?>

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
      <div class="dropdown-menu" >
        <a class="dropdown-item" href="<?php bloginfo('wpurl'); ?>/index.php#section1">Us</a>
        <a class="dropdown-item" href="les-concerts-du-coin/">Concerts</<?php bloginfo('template_directory'); ?>a>
        <a class="dropdown-item" href="<?php bloginfo('wpurl'); ?>/index.php#section3">Videos</a>
        <a class="dropdown-item" href="<?php bloginfo('wpurl'); ?>/index.php?page_id=63">Archives</a>
        <a class="dropdown-item" href="<?php bloginfo('wpurl'); ?>/index.php#section4">Contact</a>
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

        <?php
          query_posts(array(
            'post_type' => 'concerts',
            'showposts' => 10
          ) );
        ?>

        <?php
          while (have_posts()) : the_post(); ?>
            <div class="concerts">

                <div class="text">
                  <h2><b><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></b></h2>
                  <p><i>Concert proposé le <?php the_time('d/m/Y'); ?>, par <?php the_author(); ?></i></p>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p class="text-right"><a href="<?php the_permalink(); ?>"><i class="fas fa-angle-double-right"></i> Lire la suite</a></p>
                </div>
              </div>
        <?php endwhile;?>


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
