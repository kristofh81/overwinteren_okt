<?php
/**
 * node teaser template
 * if you want to use custom teaser templates based on node types
 * just copy this file and rename it
 * for example: node--page--teaser.tpl.php for page teasers
 */
?>

<div class="teaser-container <?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="teaser-content">
    <h2 class="teaser-title">
    <?php print l($title, 'node/'.$nid, array('html'=>TRUE)); ?>
    <?php if($sticky): ?>
      <span class="teaser-sticky"><?php print t($sticky_text); ?></span>
    <?php endif; ?>
    </h2>
      <div class="teaser-text">
      <?php 
            hide($content['comments']);
            hide($content['links']);
        hide($content['field_tags']); // hide tags
        
          ?>
          <div class="wrapper">
            <div class="defaultblock">
              <?php if (!empty($content['field_afotos'])) { ?>
              <div class="kleinfoto"><?php print render($content['field_afotos'][0]); ?></div>
              <?php } ?>
              <div class="bodytekst"><?php
              print render($content);
              //print render($content['body']["items"][0]["summary"]);
              //if (isset($content['body'])) {print render($content['body'][0]);
              //if (!isset($content['body'])) { echo t('Unfortunately the description for this accommodation is not available in English.'); }
              // }
              ?>
              </div>
            </div>
          </div>
        
          <br>
      </div><!--end teaser-text-->

  </div>
  <div class="teaser-meta">
  <?php if ($display_submitted): ?>
    <strong class="teaser-author"><?php print t('Posted By'); ?></strong> <?php print $name; ?>
  <?php endif; ?>
    <span class="teaser-readmore"><?php print l(t('read more'), 'node/' . $nid, array('attributes' => array('class' => t('node-readmore-link')))); ?></span>
  </div>
</div><!--end teaser container-->


