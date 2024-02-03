<?php get_header(); ?>


<div class="content-area">
  <main>
    <section class="container">
      <div class="main-blog">
        <?php 
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              ?>
        <article class="col">
          <h1><?php the_title(); ?></h1>
          <div><?php the_content(); ?></div>
        </article>
        <?php 
            endwhile;
          else:
          ?>
        <p>Nothing to display.</p>
        <?php endif; ?>

      </div>
    </section>
    <section class="container">

      <?php
        if ( !is_shop() ) {
            echo '<h2>Popular Product</h2>';
            echo do_shortcode('[products limit="4" columns="3" orderby="popularity"]');
        }
        ?>

    </section>
  </main>
</div>

<?php get_footer(); ?>