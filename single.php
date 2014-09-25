<?php
	// If this post has a post format of 'video'
	if( has_post_format( 'video', $post->ID ) ):
	    // Then get and display 'single-video.php'
	    get_template_part( 'single', 'video' );
	else:
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<title>3M Mining Partner | <?php the_title();?> </title>
	
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
		<?php if(have_posts()) : while(have_posts()) : the_post();?>
		<?php $the_ID = get_the_ID(); ?>
		<?php setPostViews($the_ID) ?>
		<div class="row">
		<div class="single-post-right col-md-5">
			<h4 class="title-head">3M SOLUTIONS- ARTICLES</h4>
			<div class="post-info grid_5 alpha">
				<h2><?php the_title();?></h2>
				<p>
					Page Views&nbsp;<i class="fa fa-eye"></i>&nbsp;<?php echo getPostViews(get_the_ID()); ?> &nbsp;&nbsp;
					<?php comments_number( 'no responses', 'Comment&nbsp;<i class="fa fa-comment"></i>&nbsp;1', 'Comments&nbsp;<i class="fa fa-comment"></i>&nbsp; % ' ); ?>
				</p>
			</div>
			<?php
				// check if the post has a Post Thumbnail assigned to it.
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('post-thumb');
				} 
			?>
		</div>
		<div class="single-post-left col-md-7">
			<p class="breadcrumb">3M SOLUTIONS  >  NEWS 001</p>
			<header class="post-nav">
				<p>
					<?php previous_post_link('%link', '&#9664;', TRUE); ?> 
					<?php next_post_link('%link','&#9654;', TRUE); ?> 
				</p>
			</header>
			<article>
				<?php the_content();?>
			</article>
		</div>
		<?php endwhile;else :?>
			<center><h3>Post Not found</h3></center>
		<?php endif;?>
		</div>
		<?php comments_template(); ?>
	</div>
	<?php get_footer(); ?>
</body>
</html>
<?php endif; ?>