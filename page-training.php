<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>3M Mining Partner | Browse All Safety Training For Miners</title>
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<meta name="title" content="3M Mining Partner | Browse All Safety Training For Miners" />
	<meta name="description" content="Be our customer and register to be eligible for free training from 3M, after sales of safety equipments and mining products" />
	<meta name="keywords" content="Safety Training" />

	<?php wp_head();?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php get_header(); ?>
	<div class="content container">
		<div class="row">
			<section clearfixass="col-md-12">
				<?php if(have_posts()) : while(have_posts()) : the_post();?>
					<div class="row">
						<h2 class="content-title col-md-12"><?php the_title();?></h2>
					</div>
					<div class="row">
						<h2 class="contact-title col-md-12">Here is the list of our training schedule</h2>
					</div>
					<div class="row">
						<div class="traning-content col-md-9">
							<?php the_content('');?>
						</div>
					</div>
				<?php 
					endwhile;
					wp_reset_query();  // Restore global post data stomped by the_post().
					endif; 		
				?>

				<?php $args=array('category_name' => 'training','showposts'=> 10); ?>
				<?php query_posts($args); ?>
				<?php if(have_posts()) : while(have_posts()) : the_post();?>
				<?php $the_ID = get_the_ID(); ?>
					<div class="row">
						<div class="article training-article col-md-9">
							<div class="row">
								<div class="col-md-3 training-img">
									<?php
										// check if the post has a Post Thumbnail assigned to it.
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('thumbnail');
										} 
									?>
								</div>
								<div class="article-content col-md-5">
									<h3>
										<?php the_title();?>
									</h3>
									<?php the_content('');?>
								</div>
								<div class="col-md-1">
									<a target="_blank" class="a-req" href="<?php echo get_bloginfo('url').'/training-form'; ?>">
										Request
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php 
					endwhile;
					wp_reset_query();  // Restore global post data stomped by the_post().
					else : 		
				?>
					<center><h4>Not found</h4></center>
				<?php endif; ?>
			</section>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php get_footer(); ?>
</body>
</html>