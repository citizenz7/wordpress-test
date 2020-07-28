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
      <div class="dropdown-menu"  >
        <a class="dropdown-item" href="index.php#section1">Us</a>
        <a class="dropdown-item" href="les-concerts-du-coin/">Concerts</a>
        <a class="dropdown-item" href="index.php#section3">Videos</a>
        <a class="dropdown-item" href="index.php#section4">Contact</a>
      </div>
    </div>

    <a href="index.php#section4" class="btn text-center font-weight-bold text-uppercase" id="faunNav">faun</a>

    <div class="dropdown">
      <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?php bloginfo('template_directory'); ?>/img/faun_template_LOUPE.webp" alt="Recherche">
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Seek and Destroy !" aria-label="Search">
          <button class="btn btn-outline-light font-weight-bold my-2 my-sm-0" type="submit">Go !</button>
        </form>
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

    <div class="container col col-md-6 col-sm-12 d-flex flex-column font-weight-bold text-uppercase">

      <div class="row">
        <div class="container col col-md-12 col-sm-12 d-flex flex-column">
        <div id="outUs">out us</div>
        <div id="about" class="container-fluid ml-5">
          <!-- <div class="post-content">
            <p>Nombre de Posts : <strong><?php echo wp_count_posts()->publish; ?></strong></p>
            <p>Nombre de Pages : <strong><?php echo wp_count_posts('page')->publish; ?></strong></p>
            <p>Nombre de commentaires publiés : <strong><?php echo wp_count_comments()->approved; ?></strong></p>
          </div> -->

          <?php if(have_posts()) : ?>
            <div id="loop">
              <?php while(have_posts()) : the_post(); ?>
              <article>
                <p id="aboutUs" class="d-flex"><?php the_title(); ?></p>
                <p>Publié le <?php the_time('d/m/Y'); ?><?php if(!is_page()) : ?> dans <?php the_category(', '); ?>, par <?php the_author(); ?><?php endif; ?>
                <p style="font-size:11px;">
                  <?php comments_popup_link('Aucun commentaire pour cet article »', '1 commentaire pour cet article »', '% commentaires pour cet article »'); ?>
                </p>
                <?php if(is_singular()) : ?>
                <?php the_content(); ?>
                <?php else : ?>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Lire la suite</a>
                <?php comments_template(); // Par ici les commentaires ?>
                <?php endif; ?>
              </article>
            <?php endwhile; ?>
          </div>
          <div id="pagination">
            <?php echo paginate_links(); ?>
          </div>
        <?php else : ?>
          <p>Aucun résultat</p>
        <?php endif; ?>

            <p class="pt-5"><a href="noway.php" class="btn btn-outline-secondary font-weight-bold mb-5 "><span id="checkOur">check our tour</span></a></p>
        </div>

        <?php
        if (function_exists("awepop_popularity_list")) {
          awepop_popularity_list();
        }
        ?>

        </div>
      </div>
    </div>

    <div class="container col col-md-6 col-sm-12 d-flex flex-column justify-content-center align-items-center">
      <div id="abo" class="font-weight-bold text-uppercase">abo</div>
      <img src="<?php bloginfo('template_directory'); ?>/img/faun_template_Photo_ABOUTUS.webp" alt="Photo Concert" class="img-fluid" id="imgConcert">
      <div id="concert" class="font-weight-bold text-uppercase">concert</div>
    </div>

  </div>

</div>

<!-- Section 3 -->
<div id="section3" class="d-flex vh-100 container-fluid">

  <div id="player" class="col-3 d-flex justify-content-center">
    <a id="playClic" href="https://www.youtube.com/watch?v=C_ijc7A5oAc" target="_blank"><img id="elipsePlay" src="<?php bloginfo('template_directory'); ?>/img//faun_template_Player.webp" alt="Play"><img id="elipsePlayRed" src="wp-content/themes/philippe/img/faun_template_PlayerRed.webp" alt="Play"></a>

    <img src="<?php bloginfo('template_directory'); ?>/img/faun_template_ElipseL.webp" alt="Elipse Large" id="elipseL">
    <img src="<?php bloginfo('template_directory'); ?>/img/faun_template_ElipseM.webp" alt="Elipse Medium" id="elipseM">
    <img src="<?php bloginfo('template_directory'); ?>/img/faun_template_ElipseS.webp" alt="Elips Small" id="elipseS">
  </div>

  <div class="col-6 d-flex flex-column justify-content-center font-weight-bold pl-5">
    <p id="video" class="text-uppercase ">our newest video</p>
    <p id="loremB">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
  </div>

  <div class="icon-bar col-3 d-flex flex-column">
    <a href="#section1" class="effetBar">1</a>
    <a href="#section2" class="effetBar">2</a>
    <a href="#section3" class="effetBar">3</a>
    <a href="#section4" class="effetBar">4</a>
  </div>

</div>

<div class="progress" style="height: 4px" id="progress">
  <div class="progress-bar" id="progressBar" role="progressbar" style="width:30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<!-- Section 4 -->
<div id="section4" class="h-100 flex-column container-fluid d-flex">

  <div id="barrePhotos" class="container-fluid flex-row d-flex">
    <div>
      <a href="photo1.php"><img src="<?php bloginfo('template_directory'); ?>/img/faun_template_1.webp" alt="Photo n°1" class="img-fluid"></a>
    </div>
    <div>
      <a href="photo2.php"><img src="<?php bloginfo('template_directory'); ?>/img/faun_template_2.webp" alt="Photo n°2" class="img-fluid"></a>
    </div>
    <div>
      <a href="photo3.php"><img src="<?php bloginfo('template_directory'); ?>/img/faun_template_3.webp" alt="Photo n°3" class="img-fluid"></a>
    </div>
    <div>
      <a href="photo4.php"><img src="<?php bloginfo('template_directory'); ?>/img/faun_template_4.webp" alt="Photo n°4" class="img-fluid"></a>
    </div>
  </div>

  <div class="container d-flex flex-column justify-content-center">
    <p id="wantTo" class="text-uppercase text-center font-weight-bold">want to hire us ?</p>
    <p id="loremC" class="text-center ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <div class="d-flex justify-content-center">
      <a href="noway.php" class="btn btn-outline-light font-weight-bold text-uppercase"><span id="contactUs">contact with us</span></a>
    </div>
  </div>

</div>

<!-- Footer -->
<div id="footer" class="d-flex container-fluid flex-column text-uppercase text-center">
  <a href="#section1" class="btn font-weight-bold" id="faun">faun</a>
  <div id="allRights">all rights reserved by faun template for rock band</div>
</div>


<?php get_footer(); ?>
