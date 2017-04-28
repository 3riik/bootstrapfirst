<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<meta name="viewport" content="width=device-width">
<title><?php bloginfo('name');?></title>
		<?php wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Boogaloo|Caesar+Dressing|Cinzel" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php 
$query_images_args = array(
		'post_parent'	 => 124,
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'post_status'    => 'inherit',
		'posts_per_page' => - 1,
);

$query_images = new WP_Query( $query_images_args );
$images = array();
foreach ( $query_images->posts as $image ) {
	$images[] = wp_get_attachment_url( $image->ID );
}
wp_reset_postdata();
	
?>
<script>


</script>
<div class="container-fluid">
	<div class="row">
	<div id="headerImg" class="col-sm-12">
		<?php
			$id = 1;
			foreach($images as $image) : ?>
			
			<img id="header<?=$id?>" class="<?php echo $id != 1 ? 'out' : 'fade-in'?>" src="<?=$image?>" alt=""
				/>
			<?php $id++; 
		  	endforeach;?>

	</div>
	</div>
	
			<!-- site-header -->
				<div class="row site-header">
					<div class="col-xs-12 col-sm-12">
						<h1><a href="<?= home_url();?>"><?php bloginfo('name'); ?></a></h1>
						<h5><?php bloginfo('description');?></h5>
					</div>
				</div>
				
			<!-- /site-header -->		
	
		<!-- row -->
		<div class="row">
			<div class="col-xs-12 col-sm-12"   id = "header-menu">
				<?php 
				
					$args = array(
							'theme_location' => 'primary',
							'menu_class'	=> 'nav nav-tabs',
					);
				
				?>
				
				<?php wp_nav_menu( $args );?>
			</div>			
		</div>
		<!-- /row -->
	

	 
