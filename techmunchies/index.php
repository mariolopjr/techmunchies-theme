<?=get_header()?>
<?php query_posts('post_type=post&post_status=publish&posts_per_page=12&paged='. get_query_var('paged')); ?>

<body class="blog">
  <?php require_once get_template_directory() . '/nav.php'; ?>

  <div class="content">
    <?php if( have_posts() ): ?>
      <?php while( have_posts() ): the_post(); ?>
        <?php if ( ( $wp_query->current_post ) % 3 == 0 || $wp_query->current_post == 0): ?>
          <div class="card-deck">
        <?php endif; ?>
        <div id="post-<?=get_the_ID()?>" class="card">
          <img class="card-img-top" src="http://via.placeholder.com/350x200" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title"><a href="<?=the_permalink()?>"><?=the_title()?></a></h4>
          </div>
          <div class="card-footer meta">
            <small class="text-muted">
              <?php if ( ! empty( $categories = get_the_category() ) ) : ?>
                <?='<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>'?>
              <?php endif; ?>
            </small>
            |
            <small class="text-muted">
              <?=bm_estimated_reading_time()?>
            </small>
          </div>
        </div>
        <?php if ( ( $wp_query->current_post + 1 ) % 3 == 0 || $wp_query->current_post == 12): ?>
        </div>
        <?php endif; ?>
      <?php endwhile; ?>
      </div>
  		<div class="navigation">
  			<span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
  		</div>
  	<?php else: ?>
  		<div id="post-404" class="noposts">
  		    <p><?php _e('None found.','example'); ?></p>
	    </div>
  	<?php endif; wp_reset_query(); ?>
  </div>

  <?php require_once get_template_directory() . '/scripts.php'; ?>
  <div class="footer text-center">
  <?=get_footer()?>
