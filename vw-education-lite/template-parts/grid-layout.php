<?php
/**
 * The template part for displaying slider
 *
 * @package VW Education Lite
 * @subpackage vw-education-lite
 * @since VW Education Lite 1.0
 */
?>
<div class="col-md-4 col-sm-4">
	<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>	
		<div class="services-box">
	    	<div class="service-image">
	          	<?php 
	            	if(has_post_thumbnail()) { 
	              		the_post_thumbnail(); 
	            	}
	            ?>
	      	</div>
	    	<div class="service-text">
	        	<h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>	        	
				<p><?php the_excerpt();?></p>
	        	<a href="<?php the_permalink(); ?>" class="Masters-In-Digital-Marketing" title="<?php esc_html_e('Read More','vw-education-lite'); ?>"><?php esc_html_e('Read More','vw-education-lite'); ?></a>   
	      	</div>
	    </div>
    </div>    
</div>