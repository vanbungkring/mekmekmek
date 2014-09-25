<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>	<?php wp_title( '|', true, 'right' ); bloginfo( 'name' );?> </title>
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<meta name="title" content="3M Mining Partner | Find Safety Equipment, Solution And Training" />
	<meta name="description" content="3M provides mining products for mining solutions that consist of safety sign, electrical maintenance, worker and site safety products" />
	<meta name="keywords" content="Safety equipment" />
	
	<?php wp_head();?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php get_header(); ?>
	<div class="content container_12">
		<section class="grid_12 ">
			<?php if(have_posts()) : while(have_posts()) : the_post();?>
				<h2 class="content-title"><?php the_title();?></h2>

				<div class="traning-content grid_10 alpha omega">
					<?php the_content('');?>
				</div>
			<?php 
				endwhile;
				wp_reset_query();  // Restore global post data stomped by the_post().
				endif; 		
			?>
			<div class="clearfix"></div>

			<?php $args=array('category_name' => 'training','showposts'=> 10); ?>
			<?php query_posts($args); ?>
			<?php if(have_posts()) : while(have_posts()) : the_post();?>
			<?php $the_ID = get_the_ID(); ?>
				<div class="article training-article grid_9 alpha">
					<div class="grid_3 training-img alpha omega">
						<?php
							// check if the post has a Post Thumbnail assigned to it.
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('thumbnail');
							} 
						?>
					</div>
					<div class="article-content grid_5 alpha omega">
						<h3>
							<?php the_title();?>
						</h3>
						<?php the_content('');?>
					</div>
					<div class="grid_1">
						<a target="_blank" class="a-req" href="<?php echo get_post_meta(get_the_ID(), 'training_request_link', true); ?>">
							Request
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php 
				endwhile;
				wp_reset_query();  // Restore global post data stomped by the_post().
				else : 		
			?>
				<center><h4>Not found</h4></center>
			<?php endif; ?>
		</section>
		<div class="clearfix"></div>
	</div>
	<?php get_footer(); ?>
</body>
</html>