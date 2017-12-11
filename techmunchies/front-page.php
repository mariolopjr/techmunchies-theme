<?=get_header()?>

<body class="home">
  <?php require_once get_template_directory() . '/nav.php'; ?>
  <div class="content">
      <h1 class="title">Traverse New Roads</h1>
      <h2 class="subtitle">A Development &amp; Design Company</h2>
      <!--<?=do_shortcode('[contact-form-7 id="72" title="Contact Me"]')?>-->
  </div>

  <div class="background-info">
      <span class="background-container">i</span>
      <div class="background-popover">
          <span class="label">Photographer</span>
          <span class="answer">Tim Trad</span>
          <span class="label">Location</span>
          <span class="answer">Skógar, Garðabær, Iceland</span>
          <span class="label">Publish Date</span>
          <span class="answer">January 21, 2017</span>
          <span class="label">License</span>
          <span class="answer"><a href="http://creativecommons.org/publicdomain/zero/1.0/" target="_blank" title="Link to CC0 1.0 License">CC0 1.0</a></span>
          <span class="label">Image URL</span>
          <span class="answer"><a href="https://unsplash.com/photos/2gk6BDXSxlQ" target="_blank" title="Link to background image on Unsplash">Unsplash</a></span>
      </div>
  </div>

  <?php require_once get_template_directory() . '/scripts.php'; ?>
  <div class="footer fixed-bottom text-center">
  <?=get_footer()?>
