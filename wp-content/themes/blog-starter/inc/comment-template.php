<?php
add_filter( 'comment_form_default_fields', 'blog_starter_comment_form' );
function blog_starter_comment_form( $blog_starter_comment_field ) {
	$blog_starter_comment_field['author'] = '<input type="text" class="form-control" name="author" id="name-cmt" placeholder="'.esc_attr__( 'Your Name', 'blog-starter' ).'">';
	$blog_starter_comment_field['email'] = '<input type="email" class="form-control" name="email" id="email-cmt" placeholder="'.esc_attr__( 'Your Email', 'blog-starter' ).'">';
	$blog_starter_comment_field['url'] = '
                    <input type="text" class="form-control" name="url" id="website" placeholder="'.esc_attr__( 'Your Website', 'blog-starter' ).'">';
	return $blog_starter_comment_field;
}
add_filter( 'comment_form_defaults', 'blog_starter_comment_default_form' );
function blog_starter_comment_default_form( $default_form ) {
	$default_form['comment_field'] = '<textarea class="form-control" name="comment" rows="7" placeholder="'.esc_attr__( 'Message goes here', 'blog-starter' ).'"></textarea> <div class="comment-input-box">';
	$default_form['submit_button'] = '</div><button type="submit" class="btn btn-primary">' . esc_attr__( 'Post Comment', 'blog-starter' ) . '</button></div>';
	$default_form['comment_notes_before'] = '';
	$default_form['title_reply'] = esc_attr__( 'Leave A Comment', 'blog-starter' );
	$default_form['title_reply_before'] = '<div class="widget-title"><h4>';
	$default_form['title_reply_after'] = '</h4></div><div class="comment-form">';
	return $default_form;
}
