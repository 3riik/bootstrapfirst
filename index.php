<?php

get_header(); ?>
	
	
		
		<!-- main-column -->
		<div class="row">
			<!-- content -->
			<div id="content" class="col-sm-12">
			<?php
				
				$menu = new WP_Query(array('post_type' => 'page',
											'post__in' => array(98,56,46,38)
										));
				if ($menu->have_posts()) :
				while ($menu->have_posts()) : $menu->the_post();?>
					<div id="<?= $post->post_name;?>">
					<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
					
					<?php the_content();?>
					</div><?php 
				endwhile;

				else :
					echo '<p>No content found</p>';

				endif;
			?>	
			<!-- /content -->
		</div><!-- /main-column -->
		
	
	
	<?php get_footer();

?>