<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>
  <?php if (!$page): ?>
      <header>
  <?php endif; ?>
      <?php print render($title_prefix); ?>
      <?php if (!$page): ?>
      <h2 class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
  
      <?php if ($display_submitted): ?>
        <span class="submitted">
        <?php print t('Posted by') . ' ' . $name; ?> <?php print t('on') . ' ' . $date; ?>
        </span>
      <?php endif; ?>

    <?php if (!$page): ?>
      </header>
  <?php endif; ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // Hide comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>

  <?php if (!empty($content['field_advaccommodaties'])) { ?>
  	<div class="taxonomy">
  		<?php echo t('Country/region:') ?><?php print render($content['field_advaccommodaties']); ?>
  	</div>
  <?php } ?>
 
	<div class="wrapper contact">
	  <div class="defaultblock">
	  <?php if (!empty($content['field_advfotos'])) { ?>
     	<div class="kleinfoto"><?php print render($content['field_advfotos'][0]); ?><br /></div>
   	  <?php } ?>
		
		<div class="tekstbold"><?php echo t('Name owner') ?>:</div>
			<div><?php 
		if (!empty($content['field_advcontactname'])){ print render($content['field_advcontactname']) ;}
			else { echo '-';} ?></div>
	

		<div class="tekstbold"><?php echo t('Phone') ?>:</div><div><?php 
			if (!empty($content['field_telefoonnummer'])) { print render($content['field_telefoonnummer']) ;} 
			else { echo 'n/a';} ?></div>
	 
		<div class="tekstbold"><?php echo t('Website') ?>:</div>
		<div><?php 
			if (!empty($content['field_advwebsite'])) { print render($content['field_advwebsite']); } 
			else {echo 'n/a';} ?></div>

		<div class="tekstbold"><?php echo t('Email') ?>:</div><div><?php 
			if (!empty($content['field_adve_mail'])) { print render($content['field_adve_mail']); } 
			else { echo 'n/a';} ?></div>

		<div class="tekstbold"><?php echo t('City') ?>:</div><div><?php
			if (!empty($content['field_advplaats'])) { print render($content['field_advplaats']); } 
			else { echo("-"); } ?></div>
		
		<div class="tekstbold"><?php echo t('Type of accommodation') ?>:</div>
		<div><?php print render($content['field_advaccommodatie_type'])?></div>
	
	  </div>
	</div><!--end wrapper contact -->
	<br>
	
	<div class="wrapper">
	  <div class="defaultblock">
		<div class="tekstbold"><?php echo t('Persons') ?>:</div><div><?php print render($content['field_advpersons']) ?></div>
		<div class="tekstbold"><?php echo t('Bedroom(s)') ?>:</div><div><?php print render($content['field_advbedrooms']) ?></div>

		<div class="tekstbold"><?php echo t('Price') ?>:</div>
		<div><?php
		if (isset($content['field_advprijs_specifiatie'])) {
			switch ($content['field_advprijs_specifiatie'] ) {
				case 'web':
					print render($content['field_advprijs_specifiatie']);
					break;
				case 'agr':
					print render($content['field_advprijs_specifiatie']);
					break;
				case 'onr':
					print render($content['field_advprijs_specifiatie']);
					break;				
				case 'day':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
				case 'wee':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
				case 'mon':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
				case 'ppd':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
				case 'ppw':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
				case 'ppm':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
				case 'fro':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
				case 'pfd':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
				case 'pfw':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
				case 'pfm':
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;															
				default:
					'&euro;&nbsp;' . print render($content['field_advprijs_specifiatie']);
					break;
			}
		 } 
		?>
		</div>
		<div class="tekstbold"><?php echo t('Location') ?>:</div>
		<div>
	
		<?php

		if (!empty($content['field_advligging']['#items'][0])) { print render($content['field_advligging'][0]['#markup']) ; } 
		if (!empty($content['field_advligging']['#items'][1])) { print ' / ' . render($content['field_advligging'][1]['#markup']) ; }
		if (!empty($content['field_advligging']['#items'][2])) { print ' / ' . render($content['field_advligging'][2]['#markup']); } 
		if (!empty($content['field_advligging']['#items'][3])) { print ' / ' . render($content['field_advligging'][3]['#markup']); }
		if (!empty($content['field_advligging']['#items'][4])) { print ' / ' . render($content['field_advligging'][4]['#markup']); } 
		if (!empty($content['field_advligging']['#items'][5])) { print ' / ' . render($content['field_advligging'][5]['#markup']); }
		?>
		</div>

		<div class="tekstbold"><?php echo t('Facilities') ?>:</div>
			<div class="kolom2">
			<?php 
			if (!empty($content['field_advvoorzieningen']['#items'][0])) { print render($content['field_advvoorzieningen'][0]['#markup']); } 
			if (!empty($content['field_advvoorzieningen']['#items'][1])) { print ' / '. render($content['field_advvoorzieningen'][1]['#markup']); }
			if (!empty($content['field_advvoorzieningen']['#items'][2])) { print ' / '. render($content['field_advvoorzieningen'][2]['#markup']); } 
			if (!empty($content['field_advvoorzieningen']['#items'][3])) { print ' / '. render($content['field_advvoorzieningen'][3]['#markup']); }
			if (!empty($content['field_advvoorzieningen']['#items'][4])) { print ' / '. render($content['field_advvoorzieningen'][4]['#markup']); } 
			if (!empty($content['field_advvoorzieningen']['#items'][5])) { print ' / '. render($content['field_advvoorzieningen'][5]['#markup']); } 
			if (!empty($content['field_advvoorzieningen']['#items'][6])) { print ' / '. render($content['field_advvoorzieningen'][6]['#markup']); } 
			if (!empty($content['field_advvoorzieningen']['#items'][7])) { print ' / '. render($content['field_advvoorzieningen'][7]['#markup']); }
			if (!empty($content['field_advvoorzieningen']['#items'][8])) { print ' / '. render($content['field_advvoorzieningen'][8]['#markup']); } 
			if (!empty($content['field_advvoorzieningen']['#items'][9])) { print ' / '. render($content['field_advvoorzieningen'][9]['#markup']); }
			if (!empty($content['field_advvoorzieningen']['#items'][10])) { print ' / '. render($content['field_advvoorzieningen'][10]['#markup']); } 
			if (!empty($content['field_advvoorzieningen']['#items'][11])) { print ' / '. render($content['field_advvoorzieningen'][11]['#markup']); }
			if (!empty($content['field_advvoorzieningen']['#items'][12])) { print ' / '. render($content['field_advvoorzieningen'][12]['#markup']); } 
			if (!empty($content['field_advvoorzieningen']['#items'][13])) { print ' / '. render($content['field_advvoorzieningen'][13]['#markup']); }
			?>
			</div>
		<br />
	  
		</div>
	</div><!--end wrapper midsection -->

	<div class="wrapper">
	  <div class="defaultblock">
		<div class="tekstbold"><?php echo t('Description') ?>: </div><br />
		<div class="bodytekst"><?php 
		if (!empty($content['body'])) {print render($content['body']);}
		else { echo t('Unfortunately the description for this accommodation is not available in English.'); }
		?>
		</div>
	  </div>
	</div>

	<div class="wrapper images">
	  <div class="defaultblock">	
		<div class="tekstbold"><?php echo t('Photos') ?>: </div><br>
		<div class="tekst"><?php echo t('Click on photo to start slideshow') ?></div>
		<div class="foto">
		<?php if (!empty($content['field_advfotos'])) { 
			print render($content['field_advfotos'][0]);
			print render($content['field_advfotos'][1]);
			print render($content['field_advfotos'][2]);
			print render($content['field_advfotos'][3]); 
		}?>
		</div>
		<div class="foto">
		<?php if (!empty($content['field_advfotos'])) { 
			print render($content['field_advfotos'][4]);
			print render($content['field_advfotos'][5]);
			print render($content['field_advfotos'][6]);
			print render($content['field_advfotos'][7]); 
		}?>
		</div>
	  </div>
	</div><!--end wrapper images --> 

  </div><!--end content-->

  <?php if (!empty($content['links'])): ?>
    <footer>
      <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['comments']); ?>
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>