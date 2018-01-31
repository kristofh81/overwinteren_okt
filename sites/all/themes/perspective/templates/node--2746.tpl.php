<?php

/**
 * @file
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
   ?>
    <div class="field field-name-body field-type-text-with-summary field-label-hidden">
      <div class="field-items">
        <div class="field-item even" property="content:encoded">
          <div class="clear"></div>
          <section class="price_box pb2col clearfix" style="margin-top: 0">
            <div class="pb_column pb_first clearfix" style="float: none;margin: auto;">
              <div class="pb_head">Actieve reizen voor professionals</div>
              <div class="pb_row_y">Zakelijk</div>
              <div class="pb_row_x">Looptijd een jaar</div>
              <div class="pb_row_y">Beschrijving van uw bedrijf en diensten</div>
              <div class="pb_row_x">Logo</div>
              <div class="pb_row_y">Ligging</div>
              <div class="pb_row_y">8 foto’s</div>
              <div class="pb_row_x">Contactinformatie</div>
              <div class="pb_row_y">Link naar uw website</div>
              <div class="pb_row_x">Nederlandstalige advertentie</div>
              <div class="pb_row_x">Communicatie via het bedrijf</div>
              <div class="pb_row_y">Google maps</div>
              <div class="pb_row_x">Honderdduizenden bezoekers per jaar</div>
              <div class="pb_row_y">Miljoenen pageviews per jaar</div>
              <div class="pb_row_y">Extra promotiemogelijkheden</div>
              <div class="pb_price">€55,00 excl. btw per jaar</div>
              <div class="pb_footer"> <a href="http://www.overwinteren.nl/nl/content/meer-informatie-over-adverteren-de-rubriek-actieve-reizen"><img alt="" height="" src="/sites/default/files/images/button_meer-informatie_0.jpg" width="" style="display: block; visibility: visible; opacity: 1; margin-left:auto; margin-right:auto; "> </a> </div>
            </div>
          </section> 
          <div class="clear"></div> 
        </div>
      </div>
    </div>
  </div>
  <br>
</div>
