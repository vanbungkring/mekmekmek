<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width,maximum-scale=1.0" />
	<title>	<?php wp_title( '|', true, 'right' ); bloginfo( 'name' );?> </title>
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
	<div class="content container">
		<?php if( function_exists('cyclone_slider') ) cyclone_slider('tester'); ?>
	</div>
	<div class="content container">
		<div class="row blok">
		<section class="featured-news col-md-7">
			<div class="row">
				<h2 class="content-title col-md-12">FEATURED NEWS</h2>
			</div>
			<?php
			    $args=array('tag' => 'featured','showposts'=>5,);
			    $my_query = new WP_Query($args);
			?>
			<?php if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();?>
				<div class="row">
					<div class="article col-md-12 alpha omega">
						<div class="row">
							<div class="article-content col-md-8">
								<a class="article-title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
									<h3><?php the_title();?></h3>
								</a>
								<?php the_content('');?>
							</div>
							<div class="col-md-4">
								<?php
									// check if the post has a Post Thumbnail assigned to it.
									if ( has_post_thumbnail() ) {
										the_post_thumbnail('thumbnail');
									} 
								?>
							</div>
						</div>
						<div class="row">
							<div class="article-footer col-md-12">
								Page Views&nbsp;<i class="fa fa-eye"></i>&nbsp;<?php echo getPostViews(get_the_ID()); ?> &nbsp;&nbsp;
								<?php comments_number( 'no responses', 'Comment&nbsp;<i class="fa fa-comment"></i>&nbsp;1', 'Comments&nbsp;<i class="fa fa-comment"></i>&nbsp; % ' ); ?>
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
		<section class="recent-comment col-md-5">
			<div class="row">
				<h2 class="content-title col-md-12">Recent Comments</h2>
			</div>
			<?php
				$number=5; // number of recent comments desired
				$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $number");
			?>
			<ul class="row">
			<?php
				if ( $comments ) : foreach ( (array) $comments as $comment) :
			?>
				<li class="col-md-12">
					<h5>
						<a href="<?php echo get_comment_link($comment->comment_ID) ?>">
							<?php echo get_the_title($comment->comment_post_ID) ?>
						</a>
					</h5>
					<span><?php echo date('d/m/Y',strtotime($comment->comment_date)) ?> by <?php echo $comment->comment_author ?></span>
					<p><?php echo word_limiter($comment->comment_content,20) ?></p>
			 	</li>
			<?php endforeach; endif;?>
			</ul>
		</section>
		</div>
	</div>
	<?php get_footer(); ?>
</body>
</html>