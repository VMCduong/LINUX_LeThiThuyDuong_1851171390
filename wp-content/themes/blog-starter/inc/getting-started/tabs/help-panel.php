<?php
/**
 * Help Panel.
 *
 * @package blog_starter
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Documentation Link', 'blog-starter' ); ?></h4>
        <p><?php esc_html_e( 'New to the WordPress world? Our documentation has step by step procedure to create a beautiful website.', 'blog-starter' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'http://documentation.theimran.com/blog-starter/' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'blog-starter' ); ?>" target="_blank">
            <?php esc_html_e( 'View Documentation', 'blog-starter' ); ?>
        </a>
    </div><!-- .panel-aside -->
    
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support', 'blog-starter' ); ?></h4>
       
        <p><?php esc_html_e( 'We will get back to you within the next 24 hours with an answer although typically much sooner. Please do not send multiple emails about the same issue/query or it will reset your priority timer. Queries are always answered on a first-come-first-serve basis and we will respond to you as soon as possible so please be patient.', 'blog-starter' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://theimran.com/contact/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'blog-starter' ); ?>" target="_blank">
            <?php esc_html_e( 'Contact Support', 'blog-starter' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Blog Starter Demo', 'blog-starter' ); ?></h4>
        <p><?php esc_html_e( 'Visit the demo to get more ideas about our theme design.', 'blog-starter' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'http://blogstarter.theimran.com/' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'blog-starter' ); ?>" target="_blank">
            <?php esc_html_e( 'Free Version Demo', 'blog-starter' ); ?>
        </a>
        <br>
        <br>
        <a class="button button-primary" href="<?php echo esc_url( 'http://blogstarter.theimran.com/pro/' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'blog-starter' ); ?>" target="_blank">
            <?php esc_html_e( 'Pro Version Demo', 'blog-starter' ); ?>
        </a>
        <br>
        <br>
        <?php if (class_exists('OCDI_Plugin')): ?>
            <a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ); ?>" title="<?php esc_attr_e( 'One Click Demo Import', 'blog-starter' ); ?>" target="_blank">
                <?php esc_html_e( 'One Click Demo Import.', 'blog-starter' ); ?>
            </a>
        <?php endif; ?>
    </div><!-- .panel-aside -->
</div>