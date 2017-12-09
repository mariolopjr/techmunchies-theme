<nav class="navbar navbar-expand-sm navbar-light" role="navigation">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
  <a class="navbar-brand" href="<?=bloginfo('url')?>"><?=bloginfo('name')?></a>
  <?php
    wp_nav_menu( array(
        'menu' => 'main-menu',
        'theme_location'    => 'primary',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'main-menu',
        'menu_class'        => 'navbar-nav ml-auto',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker())
    );
  ?>
</nav>
