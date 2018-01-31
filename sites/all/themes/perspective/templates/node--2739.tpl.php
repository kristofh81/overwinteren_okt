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
          <section class="price_box pb3col clearfix" style="margin-top: 0">
            <div class="pb_column pb_first clearfix">
              <div class="pb_head">Adverteren van een accommodatie<br> op abonnementsbasis</div>
              <div class="pb_row_y">Particulier en Zakelijk</div>
              <div class="pb_row_x">Looptijd een jaar</div>
              <div class="pb_row_y">Beschrijving van de accommodatie</div>
              <div class="pb_row_x">Opsomming faciliteiten</div>
              <div class="pb_row_y">Ligging</div>
              <div class="pb_row_x">Prijs</div>
              <div class="pb_row_y">8 foto’s</div>
              <div class="pb_row_x">Contactinformatie</div>
              <div class="pb_row_y">Link naar uw website</div>
              <div class="pb_row_x">Nederlandstalige advertentie</div>
              <div class="pb_row_y">Engelstalige advertentie</div>
              <div class="pb_row_x">Communicatie via adverteerder</div>
              <div class="pb_row_y">Google maps</div>
              <div class="pb_row_x">Beschikbaarheidskalender</div>
              <div class="pb_row_y">ICal koppeling</div>
              <div class="pb_row_x">Honderdduizenden bezoekers per jaar </div>
              <div class="pb_row_y">Miljoenen pageviews per jaar</div>
              <div class="pb_row_x">Zelf uw advertentie aanmaken en beheren</div>
              <div class="pb_row_y">Betaling via bank, creditcard of Paypal</div>
              <div class="pb_row_x">Extra promotiemogelijkheden</div>
              <div class="pb_row_y">Kortingsregeling bij meerdere advertenties </div>
              <div class="pb_price">€55,00 excl. btw per jaar</div>
              <div class="pb_footer"><a href="http://www.overwinteren.nl/nl/content/meer-informatie-over-het-verhuren-van-een-accommodatie-op-abonnementsbasis"><img alt="" height="" src="/sites/default/files/images/button_meer-informatie_0.jpg" width="" style="display: block; visibility: visible; opacity: 1; margin-left:auto; margin-right:auto; "> </a> </div>
            </div>
            <div class="pb_column pb2col clearfix">
              <div class="pb_head">Adverteren van een accommodatie<br> op provisiebasis</div>
              <div class="pb_row_y">Particulier en Zakelijk</div>
              <div class="pb_row_x">Direct opzegbaar</div>
              <div class="pb_row_y">Beschrijving van de accommodatie</div>
              <div class="pb_row_x">Opsomming faciliteiten</div>
              <div class="pb_row_y">Ligging</div>
              <div class="pb_row_x">Prijs</div>
              <div class="pb_row_y">8 foto’s</div>
              <div class="pb_row_x">Nederlandstalige advertentie</div>
              <div class="pb_row_y">Engelstalige advertentie</div>
              <div class="pb_row_x">Communicatie via overwinteren.nl</div>
              <div class="pb_row_y">Boeking/Betaling via adverteerder</div>
              <div class="pb_row_x">Google maps</div>
              <div class="pb_row_y">Beschikbaarheidskalender</div>
              <div class="pb_row_x">ICal koppeling</div>
              <div class="pb_row_y">Honderdduizenden bezoekers per jaar</div>
              <div class="pb_row_x">Miljoenen pageviews per jaar</div>
              <div class="pb_row_y">Zelf uw advertentie aanmaken en beheren</div>
              <div class="pb_row_x">Betaling via bank, creditcard of Paypal</div>
              <div class="pb_row_y">Extra promotiemogelijkheden</div>
              <div class="pb_row_x">Advertentie plaatsen is gratis</div>
              <div class="pb_row_y">Kortingsregeling bij meerdere advertenties </div>
              <div class="pb_price">7,5% excl. btw per boeking</div>
              <div class="pb_footer"><a href="http://www.overwinteren.nl/nl/content/meer-informatie-over-het-verhuren-van-een-accommodatie-op-provisiebasis"><img alt="" height="" src="/sites/default/files/images/button_meer-informatie_0.jpg" width="" style="display: block; visibility: visible; opacity: 1; margin-left:auto; margin-right:auto; "> </a> </div>
            </div>
            <div class="pb_column pb_last clearfix">
              <div class="pb_head">Adverteren van een<br> Bedrijfspresentatie<br> &nbsp;</div>
              <div class="pb_row_y">Zakelijk</div>
              <div class="pb_row_x">Looptijd een jaar</div>
              <div class="pb_row_y">Beschrijving van uw bedrijf</div>
              <div class="pb_row_x">Logo</div>
              <div class="pb_row_y">8 foto’s</div>
              <div class="pb_row_x">Contactinformatie</div>
              <div class="pb_row_y">Link naar uw website</div>
              <div class="pb_row_x">Nederlandstalige advertentie</div>
              <div class="pb_row_y">Engelstalige advertentie</div>
              <div class="pb_row_x">Communicatie via adverteerder</div>
              <div class="pb_row_y">Google maps</div>
              <div class="pb_row_x">Honderdduizenden bezoekers per jaar</div>
              <div class="pb_row_y">Miljoenen pageviews per jaar</div>
              <div class="pb_row_x">Zelf uw advertentie aanmaken en beheren</div>
              <div class="pb_row_y">Betaling via bank, credit card of Paypal</div>
              <div class="pb_row_x">Extra promotiemogelijkheden</div>
              <div class="pb_row_y">Kortingsregeling bij meerdere advertenties </div>
              <div class="pb_price">€55,00 excl. btw per jaar</div>
              <div class="pb_footer"><a href="http://www.overwinteren.nl/nl/content/meer-informatie-over-het-verhuren-van-accommodatie-met-een-bedrijfspresentatie"><img alt="" height="" src="/sites/default/files/images/button_meer-informatie_0.jpg" width="" style="display: block; visibility: visible; opacity: 1; margin-left:auto; margin-right:auto; "> </a></div>
            </div>
          </section> 
          <div class="clear"></div> 
        </div>
      </div>
    </div>
  </div>
  <br>
</div>
