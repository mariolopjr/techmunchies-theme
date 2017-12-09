<?php
/*
Template Name: Blog Posts
*/
?>
<?=get_header()?>
<?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

<body class="blog">
  <?php require_once get_template_directory() . '/nav.php'; ?>
