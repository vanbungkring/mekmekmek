<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>3M Mining Partner | Safety And Mining Equipment Video</title>
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<meta name="title" content="3M Mining Partner | Safety And Mining Equipment Video" />
	<meta name="description" content="Find video about 3M safety and mining products, get the latest information about safety and other mining equipment related news" />
	<meta name="keywords" content="Mining videos" />
	
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
			<section class="featured-news category-video col-md-12">
				<h2 class="content-title">VIDEOS</h2>
				<h3 class="content-sub-title">ALL VIDEOS</h3>
				<a class="back" href="<?php echo get_bloginfo('url').'/video'; ?>">&#8592; BACK TO POPULAR VIDEOS</a>
				<div class="clearfix"></div>
				<div class="row">
				<?php $args=array('category_name' => 'video','showposts'=> 999); ?>
				<?php query_posts($args); ?>
				<?php if(have_posts()) : while(have_posts()) : the_post();?>
				<?php $the_ID = get_the_ID(); ?>
					<div class="article col-md-6">
						<div class="col-md-6">
							<?php
								// check if the post has a Post Thumbnail assigned to it.
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('thumbnail');
								} 
							?>
							<a class="article-title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
								<h3><?php the_title();?></h3>
							</a>
							<span class="comment-number"><?php comments_number(); ?></span>
						</div>
						<div class="article-content col-md-6">
							<h5>Video Description:</h5>
							<?php the_content('');?>
							<span class="date-upload">Uploaded: <?php the_date('d/m/Y'); ?></span>
						</div>
					</div>
				<?php 
					endwhile;
					wp_reset_query();  // Restore global post data stomped by the_post().
					else : 		
				?>
					<center><h4>Not found</h4></center>
				<?php endif; ?>
				</div>
			</section>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>