<?php get_header(); ?>

<div class="main clearfix">
  <div class="container">

    <div class="content">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <h2><?php the_title(); ?></h2>
        <?php if (get_field('project_link')) : ?>
        <h3><strong>Project link:</strong> <a href="<?php the_field('project_link'); ?>"><?php the_field('project_link'); ?></a> </h3>
        <p><?php the_field('short_desc') ?></p> 
        <?php endif; ?>

        <div class="post clearfix">
          <div class="gallery">
            <div id="spotlightImage">
              <img class="portfolioImage" src="<?php echo $image['sizes']['spotlight'] ?>">
            </div>

            <ul class="flex-container imageHolder">
              <?php while(have_rows('images')) : ?>
                <?php the_row(); ?>
                <?php // for every image/caption combo, this code is run ?>
                <li class="flex-item">

                  <?php $image = get_sub_field('image'); ?>
                  <a class="portfolioImageLink" href="#" data-largeimage="<?php echo $image['sizes']['spotlight'] ?>">
                   <img class="portfolioImage" src="<?php echo $image['sizes']['square'] ?>">
                  </a>
                  <p>
                    <?php $caption = get_sub_field('caption'); 
                    echo $caption ?>
                  </p>

                </li>
              <?php endwhile; ?>  
            </ul>
          </div>


          <?php // post content ?>
          <div class="portfolioPostContent">
          <?php the_content(); ?>
          </div>

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
                echo '<li>'.'<a class=taxonomy href='.$url.'>'.'<img class=taxonomy src='.$taxonomyPic.'>'.'<h6>'.$taxonomyItem->name.'</h6>'.'</a>'.'</li>';
               };
              ?>
          </ul>
        </div> <!-- end post -->

        <?php // NAVIGATIONS ARROWS TO PREV AND NEXT PAGES ?>
        <div id="nav-below" class="navigation clearfix">
          <?php if (previous_post_link('<p class=nav-previous>'.'&larr;'.'%link'.'</p>')) : ?>
          <?php endif; ?>
          <?php if (next_post_link('<p class=nav-next>'.'%link'.'&rarr;'.'</p>')) : ?>
          <?php endif; ?>        
        </div><!-- #nav-below -->

      <?php endwhile; // end of the loop. ?>

    </div> <!-- /.content -->

    <?php // get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>