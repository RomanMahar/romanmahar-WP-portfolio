<?php

/*
	Template Name: Custom homepage
*/

get_header();  ?>
<main class="hero">
    <img src="<?php echo get_bloginfo('template_url') ?>/images/bg7.jpg" alt="">
    <h2 class="heroHeading">
        Designer, Developer, Consultant
    </h2>
</main>
<div class="wrapper">
    <div class="main homePage">
      <div class="container">

        <?php // Start the loop ?>
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    	
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>

        <?php endwhile; // end the loop?>



        <?php $aboutMe = new WP_Query(array(
            'post_type' => 'page', 
        )); ?> 

        <?php if($aboutMe->have_posts()) while($aboutMe->have_posts()) : $aboutMe->the_post(); ?>
            <section class="aboutMe">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </section>
        <?php endwhile; // end custom loop ?>

        <?php  //we are going to pull in our latest 4 blog posts ?>
        <?php $latestPosts = new WP_Query(array(
        	'post_type' => 'portfolio', // if we only want blog posts put in 'post'
        	'posts_per_page' => 4
        )); ?> 

        <?php if($latestPosts->have_posts()) while($latestPosts->have_posts()) : $latestPosts->the_post(); ?>
        	<div class="featuredPost">
        		<h2><?php the_title(); ?></h2>
        		<?php // include('author.php') include is a function to take not e of... it will inject the file?> 
        		<?php the_excerpt(); ?>
        	</div>
        <?php endwhile; // end custom loop ?>
        <?php wp_reset_postdata(); // return env back to normal ?>

      </div> <!-- /.container -->
    </div> <!-- /.main -->
</div> <!-- wrapper -->
<?php get_footer(); ?>