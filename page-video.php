<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>	<?php wp_title( '|', true, 'right' ); bloginfo( 'name' );?> </title>
	
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
				<div class="row">
					<h2 class="content-title col-md-12">VIDEOS</h2>
				</div>
				<div class="row">
					<h3 class="content-sub-title">POPULAR VIDEOS</h3>
				</div>
				<?php $args=array('category_name' => 'video','showposts'=> 4, 'meta_key' => 'post_views_count','orderby'=>'meta_value_num','order'=>'DESC'); ?>
				<?php query_posts($args); ?>
				<?php if(have_posts()) : while(have_posts()) : the_post();?>
				<?php $the_ID = get_the_ID(); ?>
				<div class="row">
					<div class="article col-md-7">
						<div class="col-md-5">
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
						<div class="article-content col-md-7">
							<h5>Video Description:</h5>
							<?php the_content('');?>
							<span class="date-upload">Uploaded: <?php the_date('d/m/Y'); ?></span>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-5 video-comment">
						<?php 
							$args = array('status' => 'approve','number' => '1','post_id' => $the_ID);
							$comments = get_comments($args);
							foreach($comments as $comment) :
						?>
							<h5>
								<i class="fa fa-comment"></i>
								<a href="<?php echo get_comment_link($comment->comment_ID) ?>">
									<?php echo get_the_title($comment->comment_post_ID) ?>
								</a>
							</h5>
							<span><?php echo date('d/m/Y',strtotime($comment->comment_date)) ?> by <?php echo get_comment_author_link($comment->comment_post_ID) ?></span>
							<p><?php echo $comment->comment_content ?></p>
							<p><a class="video-more" href="<?php echo get_comment_link($comment->comment_ID) ?>">See all comments on this video</a></p>
						<?php endforeach;?>
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
			<section class="featured-news category-video col-md-12 alpha omega">
				<h2 class="content-title">All Videos <a href="<?php echo get_bloginfo('url').'/category/video'; ?>">Browse All Video</a></h2>
				<?php
				    $args=array('category_name' => 'video','showposts'=>4);
				    $my_query = new WP_Query($args);
				?>
				<div class="row">
				<?php if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();?>
					<div class="article mini-video col-md-3">
						<div class="">
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