<?php get_header(); ?>

<div class="main">
  <div class="container">

    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <h2><?php the_title(); ?></h2>
        <h3><strong>Project link:</strong> <a href="<?php the_field('project_link'); ?>"><?php the_field('project_link'); ?></a> </h3>
        <p><?php the_field('short_desc') ?></p> 
        

        <ul class="flex-container">
          <?php while(have_rows('images')) : ?>
            <?php the_row(); ?>
            <?php // for every image/caption combo, this code is run ?>
            <li class="flex-item">
              <?php $image = get_sub_field('image'); ?>
              <img class="portfolioImage" src="<?php echo $image['sizes']['square'] ?>" data-largeimage="<?php echo $image['sizes']['spotlight'] ?>">
              <figcaption><?php the_sub_field('caption'); ?></figcaption>
            </li>
          <?php endwhile; ?>  
        </ul>


        <?php // post content ?>
        <?php the_content(); ?>
        

        <?php // BEGINNING OF TECHNOLOGIES UL ?>
        <ul class="taxonomyList">
            <?php $taxonomyItems = get_the_terms($post->ID, 'technologies', '', ',', '');

            //performs one time for each taxonomy item
            foreach ($taxonomyItems as $taxonomyItem) {

              $taxonomyPic = z_taxonomy_image_url($taxonomyItem->term_id);
              // echo '<img src='.$taxonomyPic.'/>';

              //
              $taxonomySlug = $taxonomyItem->slug;
              $taxonomyLink = $taxonomyItem->taxonomy;

              // dynamically stores the site url and is appending the taxonomy and its items. http is a before argument
              $url = site_url( '/'.$taxonomyLink.'/'.$taxonomySlug, 'http' );

              // prints the taxonomy name (e.g jQuery) within an anchor tag that links to the url defined above it is all wrapped in a list item
              echo '<li>'.'<a class=taxonomy href='.$url.'>'.'<img class=taxonomy src='.$taxonomyPic.'>'.'<br>'.$taxonomyItem->name.'</a>'.'</li>';
             };
            ?>
        </ul>


        <?php // NAVIGATIONS ARROWS TO PREV AND NEXT PAGES ?>
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