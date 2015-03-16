<?php get_header(); ?>

<div class="main">
  <div class="container">
    <h2><?php post_type_archive_title(); ?></h2>

    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <a href="<?php the_permalink(); ?>">
          <h2><?php the_title(); ?></h2>
        </a>
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail( 'medium' ); ?>
        </a>
        <p><strong>Client name:</strong> <?php the_field('client_name'); ?></p>

        <?php the_terms($post->ID, 'technologies', '', 'X'); ?>

        <p><?php the_field('short_desc') ?></p> 
        
        <div class="images">
          <?php while(has_sub_field('images')) : ?>
            <?php // for every image/caption combo, this code is run ?>
            <figure>
              <?php $image = get_sub_field('image'); ?>
              <img src="<?php echo $image['sizes']['square'] ?>">
              <figcaption><?php the_sub_field('caption'); ?></figcaption>
            </figure>

          <?php endwhile; ?>  
        </div>
        
        <!--
        If let's say that we were gonna put these images into a FLEXSLIDER then we'd probably 
        <div class="images">
          <?php while(has_sub_field('images')) : ?>
            <?php // for every image/caption combo, this code is run ?>
            <figure>
              <?php $image = get_sub_field('image'); ?>
              <img src="<?php echo $image['sizes']['square'] ?>">
              <figcaption><?php the_sub_field('caption'); ?></figcaption>
            </figure>
          <?php endwhile; ?>  
        </div>
        -->

        <?php // the_content(); ?>
        
        <?php 
          echo '<hr>';
        ?>

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

    <?php // get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>