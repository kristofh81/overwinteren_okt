<?php include 'translations.php'; ?>

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
  

    <?php if (!$page): ?>
      </header>
  <?php endif; ?>


  <div class="content te-koop"<?php print $content_attributes; ?>>
    <?php
      // Hide comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>

  	<?php if ($teaser): ?>
    <!-- teaser template HTML here -->

	<div class="defaultblock">
	  <?php if (!empty($content['field_atk_fotos'])) { ?>
     	<div class="teaser-pic grid_2"><?php print render($content['field_atk_fotos'][0]); ?><br /></div>
   	  <?php } ?>
   	</div>
   	<div class="defaultblock ">
   		<div class="bodytekst">

   	<?php
   	print render($content['body']);
   	?>
		
		</div>
	</div>  

  <?php else: ?>
    <!-- regular node view template HTML here -->  

    <?php if (!empty($content['field_atk_teaser_zakelijke'])) { ?>
  	<div class="teaser-zakelijk">
  		<?php echo t('Promotor:') ?><?php print render($content['field_atk_teaser_zakelijke']); ?>
  	</div>
  <?php } ?>
  <br>

  <?php if (!empty($content['field_atk_land_regio'])) { ?>
  	<div class="taxonomy">
  		<?php echo t('Country/region:') ?><?php print render($content['field_atk_land_regio']); ?>
  	</div>
  <?php } ?>
  <br>
 
	<div class="wrapper contact grid_6">
	  <div class="defaultblock">
	  <?php if (!empty($content['field_atk_fotos'])) { ?>
     	<div class="teaser-pic grid_2"><?php print render($content['field_atk_fotos'][0]); ?><br /></div>
   	  <?php } ?>
		
		<div class="grid_4" style="margin-left: 0;">
			<div class="tekstbold"><?php echo t('Seller') ?>:</div>
			<div>
			<?php
				if ($current_lang == "en") {
					if (!empty($content['field_atk_type_aanbieder']['#items'][0])) {
					print strtr($content['field_atk_type_aanbieder'][0]['#markup'], $transl); }
					if (!empty($content['field_atk_type_aanbieder']['#items'][1])) {
					print strtr($content['field_atk_type_aanbieder'][1]['#markup'], $transl); }
				 // indien nederlands
				} else {
					if (!empty($content['field_atk_type_aanbieder']['#items'][0])) {	
					print render($content['field_atk_type_aanbieder']); }
					if (!empty($content['field_atk_type_aanbieder']['#items'][1])) {	
					print render($content['field_atk_type_aanbieder']); }
				}
				?>	
			</div>
			<div class="tekstbold"><?php echo t('Name') ?>:</div>
			<div><?php 
				if (!empty($content['field_atk_naam'])){ print render($content['field_atk_naam']) ;}
				else { echo '-';} ?>	
			</div>
			<div class="tekstbold"><?php echo t('Phone') ?>:</div>
			<div><?php 
				if (!empty($content['field_atk_telefoonnummer'])) { print render($content['field_atk_telefoonnummer']) ;} 
				else { echo '<br>';} ?>	
			</div>		 
			<div class="tekstbold"><?php echo t('Email') ?>:</div>
			<div><?php 
				if (!empty($content['field_atk_email'])) { print render($content['field_atk_email']); } 
				else { echo '<br>';} ?>
			</div>
			<div class="tekstbold"><?php echo t('Website') ?>:</div>
			<div><?php 
				if (!empty($content['field_atk_website'])) { print render($content['field_atk_website']); } 
				else {echo '<br>';} ?></div>
			<div class="tekstbold"><?php echo t('City') ?>:</div>
			<div><?php
				if (!empty($content['field_atk_plaats'])) { print render($content['field_atk_plaats']); } 
				else { echo("-"); } ?></div>		
			<div class="tekstbold"><?php echo t('Type of accommodation') ?>:</div>
			<div>
			<?php
			if ($current_lang == "en") { 
				print strtr($content['field_atk_accommodatie_type'][0]['#markup'], $transl);
			} else {
				print render($content['field_atk_accommodatie_type']);
			}
			?>
			</div>
		</div>
		<br>
	
	  </div>
	</div><!--end wrapper contact -->
	
	<div class="wrapper grid_6">
	<hr>	
	  <div class="defaultblock">
	  	<?php
			if (!empty($content['field_atk_soort_bouw'])) {
		?>
		<div class="tekstbold"><?php echo t('Structure type') ?>:</div>
		<div class="kolom2">
		<?php
			if ($current_lang == "en") {
				if (!empty($content['field_atk_soort_bouw']['#items'][0])) { 
				print ucfirst(strtr($content['field_atk_soort_bouw'][0]['#markup'], $transl)) . '<br>'; }
				if (!empty($content['field_atk_soort_bouw']['#items'][1])) { 
				print ucfirst(strtr($content['field_atk_soort_bouw'][1]['#markup'], $transl)) . '<br>'; }
				if (!empty($content['field_atk_soort_bouw']['#items'][2])) { 
				print ucfirst(strtr($content['field_atk_soort_bouw'][2]['#markup'], $transl)) . '<br>'; }
				if (!empty($content['field_atk_soort_bouw']['#items'][3])) { 
				print ucfirst(strtr($content['field_atk_soort_bouw'][3]['#markup'], $transl)) . '<br>'; }
				if (!empty($content['field_atk_soort_bouw']['#items'][4])) { 
				print ucfirst(strtr($content['field_atk_soort_bouw'][4]['#markup'], $transl)) . '<br>'; }
				if (!empty($content['field_atk_soort_bouw']['#items'][5])) { 
				print ucfirst(strtr($content['field_atk_soort_bouw'][5]['#markup'], $transl)) ; }
			} else {
				print render($content['field_atk_soort_bouw']);
			}
			?>
		</div>
		<?php
			}
			if (!empty($content['field_atk_bouwjaar'])) {
		?>
		<div class="tekstbold"><?php echo t('Building year') ?>:</div>
		<div class="kolom2"><?php print render($content['field_atk_bouwjaar']);?></div>
		<?php
			}
			if (!empty($content['field_atk_vraagprijs'])) {
		?>
		<div class="tekstbold"><?php echo t('Price') ?>:</div>
		<div class="kolom2">
		<span><?php print render($content['field_atk_vraagprijs']);?>
		
		<?php
		if ($current_lang === "en") {
			if (isset($content['field_atk_vraagprijs_spec'])) {
			print strtr($content['field_atk_vraagprijs_spec'][0]['#markup'], $transl);
		 } else { echo '<br>';} 
		} else {
		if (isset($content['field_atk_vraagprijs_spec'])) {	
			print render($content['field_atk_vraagprijs_spec']);
		 } else { echo '<br>';} 
		}
		?>
		</span>
		</div>
		<?php
		}
		?>


		<div class="tekstbold"><?php echo t('Location') ?>:</div>
		<div class="kolom2">
		<?php
	if ($current_lang === "en"){
		if (!empty($content['field_atk_ligging']['#items'][0])) { print strtr($content['field_atk_ligging'][0]['#markup'], $transl) ; } 
		if (!empty($content['field_atk_ligging']['#items'][1])) { print ' / ' . strtr($content['field_atk_ligging'][1]['#markup'], $transl) ; }
		if (!empty($content['field_atk_ligging']['#items'][2])) { print ' / ' . strtr($content['field_atk_ligging'][2]['#markup'], $transl); } 
		if (!empty($content['field_atk_ligging']['#items'][3])) { print ' / ' . strtr($content['field_atk_ligging'][3]['#markup'], $transl); }
		if (!empty($content['field_atk_ligging']['#items'][4])) { print ' / ' . strtr($content['field_atk_ligging'][4]['#markup'], $transl); } 
		if (!empty($content['field_atk_ligging']['#items'][5])) { print ' / ' . strtr($content['field_atk_ligging'][5]['#markup'], $transl); }
		if (!empty($content['field_atk_ligging']['#items'][6])) { print ' / ' . strtr($content['field_atk_ligging'][6]['#markup'], $transl); }
	} else {
		if (!empty($content['field_atk_ligging']['#items'][0])) { print render($content['field_atk_ligging'][0]['#markup']) ; } 
		if (!empty($content['field_atk_ligging']['#items'][1])) { print ' / ' . render($content['field_atk_ligging'][1]['#markup']) ; }
		if (!empty($content['field_atk_ligging']['#items'][2])) { print ' / ' . render($content['field_atk_ligging'][2]['#markup']); } 
		if (!empty($content['field_atk_ligging']['#items'][3])) { print ' / ' . render($content['field_atk_ligging'][3]['#markup']); }
		if (!empty($content['field_atk_ligging']['#items'][4])) { print ' / ' . render($content['field_atk_ligging'][4]['#markup']); } 
		if (!empty($content['field_atk_ligging']['#items'][5])) { print ' / ' . render($content['field_atk_ligging'][5]['#markup']); }
		if (!empty($content['field_atk_ligging']['#items'][6])) { print ' / ' . render($content['field_atk_ligging'][6]['#markup']); }
	}
		?>
		</div>

		<div class="tekstbold"><?php echo t('Facilities') ?>:</div>
			<div class="kolom2">
			<?php 
		if ($current_lang === "en"){
			if (!empty($content['field_atk_voorzieningen']['#items'][0])) { print strtr($content['field_atk_voorzieningen'][0]['#markup'], $transl); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][1])) { print ' / '. strtr($content['field_atk_voorzieningen'][1]['#markup'], $transl); }
			if (!empty($content['field_atk_voorzieningen']['#items'][2])) { print ' / '. strtr($content['field_atk_voorzieningen'][2]['#markup'], $transl); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][3])) { print ' / '. strtr($content['field_atk_voorzieningen'][3]['#markup'], $transl); }
			if (!empty($content['field_atk_voorzieningen']['#items'][4])) { print ' / '. strtr($content['field_atk_voorzieningen'][4]['#markup'], $transl); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][5])) { print ' / '. strtr($content['field_atk_voorzieningen'][5]['#markup'], $transl); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][6])) { print ' / '. strtr($content['field_atk_voorzieningen'][6]['#markup'], $transl); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][7])) { print ' / '. strtr($content['field_atk_voorzieningen'][7]['#markup'], $transl); }
			if (!empty($content['field_atk_voorzieningen']['#items'][8])) { print ' / '. strtr($content['field_atk_voorzieningen'][8]['#markup'], $transl); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][9])) { print ' / '. strtr($content['field_atk_voorzieningen'][9]['#markup'], $transl); }
			if (!empty($content['field_atk_voorzieningen']['#items'][10])) { print ' / '. strtr($content['field_atk_voorzieningen'][10]['#markup'], $transl); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][11])) { print ' / '. strtr($content['field_atk_voorzieningen'][11]['#markup'], $transl); }
			if (!empty($content['field_atk_voorzieningen']['#items'][12])) { print ' / '. strtr($content['field_atk_voorzieningen'][12]['#markup'], $transl); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][13])) { print ' / '. strtr($content['field_atk_voorzieningen'][13]['#markup'], $transl); }
			if (!empty($content['field_atk_voorzieningen']['#items'][14])) { print ' / '. strtr($content['field_atk_voorzieningen'][14]['#markup'], $transl); }

			// else = dutch
		} else {
			if (!empty($content['field_atk_voorzieningen']['#items'][0])) { print render($content['field_atk_voorzieningen'][0]); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][1])) { print ' / '. render($content['field_atk_voorzieningen'][1]); }
			if (!empty($content['field_atk_voorzieningen']['#items'][2])) { print ' / '. render($content['field_atk_voorzieningen'][2]); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][3])) { print ' / '. render($content['field_atk_voorzieningen'][3]); }
			if (!empty($content['field_atk_voorzieningen']['#items'][4])) { print ' / '. render($content['field_atk_voorzieningen'][4]); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][5])) { print ' / '. render($content['field_atk_voorzieningen'][5]); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][6])) { print ' / '. render($content['field_atk_voorzieningen'][6]); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][7])) { print ' / '. render($content['field_atk_voorzieningen'][7]); }
			if (!empty($content['field_atk_voorzieningen']['#items'][8])) { print ' / '. render($content['field_atk_voorzieningen'][8]); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][9])) { print ' / '. render($content['field_atk_voorzieningen'][9]); }
			if (!empty($content['field_atk_voorzieningen']['#items'][10])) { print ' / '. render($content['field_atk_voorzieningen'][10]); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][11])) { print ' / '. render($content['field_atk_voorzieningen'][11]); }
			if (!empty($content['field_atk_voorzieningen']['#items'][12])) { print ' / '. render($content['field_atk_voorzieningen'][12]); } 
			if (!empty($content['field_atk_voorzieningen']['#items'][13])) { print ' / '. render($content['field_atk_voorzieningen'][13]); }
			if (!empty($content['field_atk_voorzieningen']['#items'][14])) { print ' / '. strtr($content['field_atk_voorzieningen'][14]['#markup'], $transl); }
		}
			?>
			</div>

		<div class="tekstbold"><?php echo t('Room distribution') ?>:</div>
			<div class="kolom2">
			<?php 
		if ($current_lang === "en"){
			if (!empty($content['field_atk_indeling']['#items'][0])) { print strtr($content['field_atk_indeling'][0]['#markup'], $transl); } 
			if (!empty($content['field_atk_indeling']['#items'][1])) { print ' / '. strtr($content['field_atk_indeling'][1]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][2])) { print ' / '. strtr($content['field_atk_indeling'][2]['#markup'], $transl); } 
			if (!empty($content['field_atk_indeling']['#items'][3])) { print ' / '. strtr($content['field_atk_indeling'][3]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][4])) { print ' / '. strtr($content['field_atk_indeling'][4]['#markup'], $transl); } 
			if (!empty($content['field_atk_indeling']['#items'][5])) { print ' / '. strtr($content['field_atk_indeling'][5]['#markup'], $transl); } 
			if (!empty($content['field_atk_indeling']['#items'][6])) { print ' / '. strtr($content['field_atk_indeling'][6]['#markup'], $transl); } 
			if (!empty($content['field_atk_indeling']['#items'][7])) { print ' / '. strtr($content['field_atk_indeling'][7]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][8])) { print ' / '. strtr($content['field_atk_indeling'][8]['#markup'], $transl); } 
			if (!empty($content['field_atk_indeling']['#items'][9])) { print ' / '. strtr($content['field_atk_indeling'][9]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][10])) { print ' / '. strtr($content['field_atk_indeling'][10]['#markup'], $transl); } 
			if (!empty($content['field_atk_indeling']['#items'][11])) { print ' / '. strtr($content['field_atk_indeling'][11]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][12])) { print ' / '. strtr($content['field_atk_indeling'][12]['#markup'], $transl); } 
			if (!empty($content['field_atk_indeling']['#items'][13])) { print ' / '. strtr($content['field_atk_indeling'][13]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][14])) { print ' / '. strtr($content['field_atk_indeling'][14]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][15])) { print ' / '. strtr($content['field_atk_indeling'][15]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][16])) { print ' / '. strtr($content['field_atk_indeling'][16]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][17])) { print ' / '. strtr($content['field_atk_indeling'][17]['#markup'], $transl); }
			if (!empty($content['field_atk_indeling']['#items'][18])) { print ' / '. strtr($content['field_atk_indeling'][18]['#markup'], $transl); }
			// else = dutch
		} else {
			if (!empty($content['field_atk_indeling']['#items'][0])) { print render($content['field_atk_indeling'][0]); } 
			if (!empty($content['field_atk_indeling']['#items'][1])) { print ' / '. render($content['field_atk_indeling'][1]); }
			if (!empty($content['field_atk_indeling']['#items'][2])) { print ' / '. render($content['field_atk_indeling'][2]); } 
			if (!empty($content['field_atk_indeling']['#items'][3])) { print ' / '. render($content['field_atk_indeling'][3]); }
			if (!empty($content['field_atk_indeling']['#items'][4])) { print ' / '. render($content['field_atk_indeling'][4]); } 
			if (!empty($content['field_atk_indeling']['#items'][5])) { print ' / '. render($content['field_atk_indeling'][5]); } 
			if (!empty($content['field_atk_indeling']['#items'][6])) { print ' / '. render($content['field_atk_indeling'][6]); } 
			if (!empty($content['field_atk_indeling']['#items'][7])) { print ' / '. render($content['field_atk_indeling'][7]); }
			if (!empty($content['field_atk_indeling']['#items'][8])) { print ' / '. render($content['field_atk_indeling'][8]); } 
			if (!empty($content['field_atk_indeling']['#items'][9])) { print ' / '. render($content['field_atk_indeling'][9]); }
			if (!empty($content['field_atk_indeling']['#items'][10])) { print ' / '. render($content['field_atk_indeling'][10]); } 
			if (!empty($content['field_atk_indeling']['#items'][11])) { print ' / '. render($content['field_atk_indeling'][11]); }
			if (!empty($content['field_atk_indeling']['#items'][12])) { print ' / '. render($content['field_atk_indeling'][12]); } 
			if (!empty($content['field_atk_indeling']['#items'][13])) { print ' / '. render($content['field_atk_indeling'][13]); }
			if (!empty($content['field_atk_indeling']['#items'][14])) { print ' / '. render($content['field_atk_indeling'][14]); }
			if (!empty($content['field_atk_indeling']['#items'][15])) { print ' / '. render($content['field_atk_indeling'][15]); }
			if (!empty($content['field_atk_indeling']['#items'][16])) { print ' / '. render($content['field_atk_indeling'][16]); }
			if (!empty($content['field_atk_indeling']['#items'][17])) { print ' / '. render($content['field_atk_indeling'][17]); }
			if (!empty($content['field_atk_indeling']['#items'][18])) { print ' / '. render($content['field_atk_indeling'][18]); }
		}
			?>
			</div>

			<?php
				if (!empty($content['field_atk_slaapkamers_aantal'])) {
			?>
			<div class="tekstbold"><?php echo t('Number of bedrooms') ?>:</div>
			<div class="kolom2"><?php print render($content['field_atk_slaapkamers_aantal']);?></div>
			<?php
				}
				if (!empty($content['field_atk_badkamers_aantal'])) {
			?>
			<div class="tekstbold"><?php echo t('Number of bathrooms') ?>:</div>
			<div class="kolom2"><?php print render($content['field_atk_badkamers_aantal']);?></div>
			<?php
				}
				if (!empty($content['field_atk_toiletten_aantal'])) {
			?>
			<div class="tekstbold"><?php echo t('Number of lavatories') ?>:</div>
			<div class="kolom2"><?php print render($content['field_atk_toiletten_aantal']);?></div>
			<?php
				}
				if (!empty($content['field_atk_oppervlakte_huis'])) {
			?>
			<div class="tekstbold"><?php echo t('Surface house') ?>:</div>
			<div class="kolom2"><?php print render($content['field_atk_oppervlakte_huis']);?></div>
			<?php
				}
				if (!empty($content['field_atk_oppervlakte_terrein'])) {
			?>
			<div class="tekstbold"><?php echo t('Surface terrain') ?>:</div>
			<div class="kolom2"><?php print render($content['field_atk_oppervlakte_terrein']);?></div>
			<?php
				}
				if (!empty($content['field_atk_oppervlakte_terrassen'])) {
			?>
			<div class="tekstbold"><?php echo t('Surface balconies') ?>:</div>
			<div class="kolom2"><?php print render($content['field_atk_oppervlakte_terrassen']);?></div>
			<?php
				}
				if (!empty($content['field_atk_afstand_buren'])) {
			?>	
			<div class="tekstbold"><?php echo t('Distance to neighbours') ?>:</div>
			<div class="kolom2"><?php print render($content['field_atk_afstand_buren']);?></div>
			<?php
			}
			?>
		
		<br><br>
	  
		</div>
	<hr>
	  <div class="defaultblock ">
		<div><?php 
		if (!empty($content['body'])) {print render($content['body']);}
		else { echo t('Unfortunately the description for this accommodation is not available in English.'); }
		?>
		</div>
	  </div>

	  <hr>
	</div>

	<div class="wrapper images">
	  	<div class="defaultblock grid_6 gallery-node">	  
			<div class="tekstbold"><?php echo t('Photos') ?>: </div><br>
			<div class="tekst"><?php echo t('Click on photo to start slideshow') ?></div>

			<div class="grid_2">
			<?php if (!empty($content['field_atk_fotos'])) { 
				print render($content['field_atk_fotos'][0]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_atk_fotos'])) { 
				print render($content['field_atk_fotos'][1]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_atk_fotos'])) { 
				print render($content['field_atk_fotos'][2]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_atk_fotos'])) { 
				print render($content['field_atk_fotos'][3]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_atk_fotos'])) { 
				print render($content['field_atk_fotos'][4]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_atk_fotos'])) { 
				print render($content['field_atk_fotos'][5]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_atk_fotos'])) { 
				print render($content['field_atk_fotos'][6]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_atk_fotos'])) { 
				print render($content['field_atk_fotos'][7]);
			}?>
			</div>
	  	</div>
	  	<br><br>
	</div><!--end wrapper images --> 
	<div class="wrapper grid_6">
		<?php if (!empty($content['field_atk_locatie_map'])) { 
			echo("<hr>");
			print render($content['field_atk_locatie_map']);
		}?>
	</div>

  </div><!--end content-->
  <?php endif; ?>
 
  <?php if (!empty($content['links'])): ?>
    <footer class="grid_6">
    <?php if (!$teaser){
    	echo '<br><br><br>';
    	print render($content['links']);
    }
    ?>
    <?php if ($teaser){
    	echo '<hr>';
    }
    ?> 
    </footer>
  <?php endif; ?>

<?php //print render($content['comments']); ?>  
<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>