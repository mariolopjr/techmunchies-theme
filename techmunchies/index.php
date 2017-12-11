<?=get_header()?>
<?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

<body class="blog">
  <?php require_once get_template_directory() . '/nav.php'; ?>

  <?php if( have_posts() ): ?>
    <?php while( have_posts() ): the_post(); ?>
	    <div id="post-<?php get_the_ID(); ?>" <?php post_class(); $categories = get_the_category(); ?>>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <span class="meta">
          <?php if ( ! empty( $categories ) ) : ?>
            <?='<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>'?>
          <?php endif; ?>
             ❖ <strong><?=the_time('m-d-Y')?></strong>
        </span>

		<?php the_excerpt(__('Continue reading »','example')); ?>
            </div>
        <?php endwhile; ?>
		<div class="navigation">
			<span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
		</div>
	<?php else: ?>
		<div id="post-404" class="noposts">
		    <p><?php _e('None found.','example'); ?></p>
	    </div>
	<?php endif; wp_reset_query(); ?>

  <?php require_once get_template_directory() . '/scripts.php'; ?>
  <div class="footer text-center">
  <?=get_footer()?>
