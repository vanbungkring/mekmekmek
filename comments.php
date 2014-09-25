<div class="row">
	<div class="single-comment col-md-7">
		<h2 class="content-title">
			COMMENTS 
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<span class="nav-cmd">
				<?php previous_comments_link( __( '&#9664;' ) ); ?>
				<?php next_comments_link( __( '&#9654;' ) ); ?>
			</span>
			<?php endif; // Check for comment navigation. ?>
		</h2>
		<ul class="commentlist">
			<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
		</ul>
		<?php //comments_template( '', true ); ?>			
	</div>
	<div class="comment-form col-md-5">
		<?php
			$word = ( ! is_user_logged_in() ) ? 'Name, Email, and message are Required' : '';
			$args = array(
			  'id_form'           => 'commentform',
			  'id_submit'         => 'submit',
			  'title_reply'       => __( 'Leave a Comment' ),
			  'title_reply_to'    => __( 'Leave a Comment to %s' ),
			  'cancel_reply_link' => __( 'Cancel Reply' ),
			  'label_submit'      => __( 'SUBMIT' ),

			  'comment_field' =>  '<p class="comment-form-comment">'.
			    '<textarea placeholder="Message" id="comment" name="comment" cols="33" rows="8" aria-required="true">' .
			    '</textarea></p>',

				  'must_log_in' => '<p class="must-log-in">' .
				    sprintf(
				      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
				      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				    ) . '</p>',

				  'logged_in_as' => '<p class="logged-in-as">' .
				    sprintf(
				    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
				      admin_url( 'profile.php' ),
				      $user_identity,
				      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
				    ) . '</p>',

				  'comment_notes_before' => '<p class="comment-notes">' .
				    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
				    '</p>',

				  'comment_notes_after' => '<p class="form-allowed-tags"><i>' .
				    sprintf(
				      __( $word ),
				      ''
				    ) . '</i></p>',

				  'fields' => apply_filters( 'comment_form_default_fields', array(

				    'author' =>
				      '<p class="comment-form-author">' .
				      '<input id="author" placeholder="Name" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
				      '" size="30"' . $aria_req . ' /></p>',

				    'email' =>
				      '<input id="email" placeholder="E-Mail" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				      '" size="30"' . $aria_req . ' /></p>',

				    'url' =>
				      '<p class="comment-form-url">' .
				      '<input id="url" placeholder="Website" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
				      '" size="30" /></p>'
				    )
				  ),
				);
				comment_form($args);
		?>
	</div>
</div>