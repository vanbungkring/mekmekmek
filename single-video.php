<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>	3M Mining Partner | Safety And Mining Equipment Video </title>
	
	<?php wp_head();?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-49441522-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<?php get_header(); ?>
	<div class="content container">
		<div class="row">
			<?php if(have_posts()) : while(have_posts()) : the_post();?>
			<?php $the_ID = get_the_ID(); ?>
			<?php setPostViews($the_ID) ?>
			<div class="single-post-right col-md-7">
				<div class="row">
					<h4 class="title-head col-md-12">VIDEOS</h4>
				</div>
				<div class="row">
					<div class="post-info col-md-7 alpha">
						<h2><?php the_title();?></h2>
						<p>
							<?php comments_number( 'no responses', 'Comment <i class="fa fa-comment"></i> %', 'Comments <i class="fa fa-comment"></i> % ' ); ?>
						</p>
					</div>
					<div class="col-md-5 post-nav omega">
						<p>
							<?php previous_post_link('%link', '&#9664;', TRUE); ?> 
							<?php next_post_link('%link','&#9654;', TRUE); ?> 
						</p>
					</div>
				</div>
				<?php
					// check if the post has a Post Thumbnail assigned to it.
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('post-thumb');
					} 
				?>
			</div>
			<div class="single-post-left col-md-5">
				<p class="breadcrumb hidden-sm hidden-xs">VIDEOS  >  <?php the_title();?></p>
				<article class="video-desc">
					<h5>Video Description:</h5>
					<?php the_content();?>
					<span class="date-upload">Uploaded: <?php the_date('d/m/Y'); ?></span>
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