<?php get_header(); ?>

<div class="main">
  <div class="container">

    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <h2><?php the_title(); ?></h2>
        <p><strong>Client name:</strong> <?php the_field('client_name'); ?></p>
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


        <?php // post content ?>
        <?php the_content(); ?>
        


        <ul>
            <?php $taxonomyItems = get_the_terms($post->ID, 'technologies', '', ',', '');

            //performs one time for each taxonomy item
            foreach ($taxonomyItems as $taxonomyItem) {
              $taxonomySlug = $taxonomyItem->slug;
              $taxonomyLink = $taxonomyItem->taxonomy;

              $terms = apply_filters( 'taxonomy-images-get-terms', '' );
              pre_r($terms);

              // taxonomy image [NOT WORKING CURRENTLY]
              // print apply_filters( 'taxonomy-images-queried-term-image', '' );

              // dynamically stores the site url and is appending the taxonomy and its items. http is a before argument
              $url = site_url( '/'.$taxonomyLink.'/'.$taxonomySlug, 'http' );

              // prints the taxonomy name (e.g jQuery) within an anchor tag that links to the url defined above it is all wrapped in a list item
              echo '<li>'.'<a href='.$url.'>'.$taxonomyItem->name.'</a>'.'</li>';
             };
            ?>
        </ul>
        
        <div id="nav-below" class="navigation">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
        </div><!-- #nav-below -->

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

    <?php // get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>