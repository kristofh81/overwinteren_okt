<?php

/*
if ( !isset( $_SESSION["origURL"] ) ) {
    $_SESSION["origURL"] = htmlentities($_SERVER["HTTP_REFERER"], ENT_QUOTES, 'UTF-8');
  }

  elseif ( isset( $_SESSION["origURL"] ) ) {

  unset($_SESSION["origURL"]);
  header($_SESSION["origURL"]);

}
 */
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="meta submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
    <br>
    <p>
    Blijkbaar bent u nog niet geregistreerd. <a href="http://www.overwinteren.nl/nl/user/register">Registreer u</a> vooraleer u een advertentie wil plaatsen.
    </p>
    <br>
    <p>Of ga terug naar de <a href="http://www.overwinteren.nl">Homepagina</a>.</p>
  </div>

</div>
