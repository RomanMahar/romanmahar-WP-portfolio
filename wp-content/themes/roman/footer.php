<footer class="siteFooter">
  <div class="container">
    <div id="footer-sidebar" class="secondary clearfix">
	    <div id="footer-sidebar1">
		    <?php
		    if(is_active_sidebar('footer-sidebar-1')){
		    dynamic_sidebar('footer-sidebar-1');
		    echo '<h3>'.'&copy;'.' Omar Rahman '.date('Y').'</h3>';
		    }
		    ?>
	    </div>
	    <div id="footer-sidebar2">
		    <?php
		    if(is_active_sidebar('footer-sidebar-2')){
		    dynamic_sidebar('footer-sidebar-2');
		    }
		    ?>
	    </div>
	    <div id="footer-sidebar3">
	    <span id="contact"></span>
		    <?php
		    if(is_active_sidebar('footer-sidebar-3')){
		    dynamic_sidebar('footer-sidebar-3');
		    }
		    ?>
	    </div>
    </div>
  </div>
</footer>

<script>
/* Google Analytics! */
 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
 s.parentNode.insertBefore(g,s)}(document,"script"));
</script>

<?php wp_footer(); ?>
</body>
</html>