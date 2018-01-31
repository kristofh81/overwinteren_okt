<?php include 'translations.php';; ?>

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


  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // Hide comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>
 	
  	<?php if ($teaser): ?>
    <!-- teaser template HTML here -->

	<div class="defaultblock">
	  <?php if (!empty($content['field_advfotos'])) { ?>
     	<div class="teaser-pic grid_2"><?php print render($content['field_advfotos'][0]); ?><br /></div>
   	  <?php } ?>
   	</div>
   	<div class="defaultblock ">
   		<div class="bodytekst teaser-summary">

   	<?php
   	print render($content['body']);
   	?>
		
		</div>
	</div>  

  <?php else: ?>
    <!-- regular node view template HTML here -->  
<h4 class="advertentie-code">
    <?php
    print "ADVABB-";
    print $node->nid;
  	?>
 	</h4>
  <?php if (!empty($content['field_advaccommodaties'])) { ?>
  	<div class="taxonomy">
  		<?php echo t('Country/region:') ?><?php print render($content['field_advaccommodaties']); ?>
  	</div>
  <?php } ?>
  <br>
 
	<div class="wrapper contact grid_6">
	  <div class="defaultblock">
	  <?php if (!empty($content['field_advfotos'])) { ?>
     	<div class="teaser-pic grid_2"><?php print render($content['field_advfotos'][0]); ?><br /></div>
   	  <?php } ?>
		
		<div class="grid_4" style="margin-left: 0;">
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
			<div>
			<?php
		if ($current_lang == "en") { 
			print strtr($content['field_advaccommodatie_type'][0]['#markup'], $transl);
		} else {
			print render($content['field_advaccommodatie_type']);
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
		<div class="tekstbold"><?php echo t('Persons') ?>:</div><div><?php print render($content['field_advpersons']) ?></div>
		<div class="tekstbold"><?php echo t('Bedroom(s)') ?>:</div><div><?php print render($content['field_advbedrooms']) ?></div>	


		<div class="tekstbold"><?php echo t('Location') ?>:</div>
		<div>
		<?php
	if ($current_lang === "en"){
		if (!empty($content['field_advligging']['#items'][0])) { print strtr($content['field_advligging'][0]['#markup'], $transl) ; } 
		if (!empty($content['field_advligging']['#items'][1])) { print ' / ' . strtr($content['field_advligging'][1]['#markup'], $transl) ; }
		if (!empty($content['field_advligging']['#items'][2])) { print ' / ' . strtr($content['field_advligging'][2]['#markup'], $transl); } 
		if (!empty($content['field_advligging']['#items'][3])) { print ' / ' . strtr($content['field_advligging'][3]['#markup'], $transl); }
		if (!empty($content['field_advligging']['#items'][4])) { print ' / ' . strtr($content['field_advligging'][4]['#markup'], $transl); } 
		if (!empty($content['field_advligging']['#items'][5])) { print ' / ' . strtr($content['field_advligging'][5]['#markup'], $transl); }
	} else {
		if (!empty($content['field_advligging']['#items'][0])) { print render($content['field_advligging'][0]['#markup']) ; } 
		if (!empty($content['field_advligging']['#items'][1])) { print ' / ' . render($content['field_advligging'][1]['#markup']) ; }
		if (!empty($content['field_advligging']['#items'][2])) { print ' / ' . render($content['field_advligging'][2]['#markup']); } 
		if (!empty($content['field_advligging']['#items'][3])) { print ' / ' . render($content['field_advligging'][3]['#markup']); }
		if (!empty($content['field_advligging']['#items'][4])) { print ' / ' . render($content['field_advligging'][4]['#markup']); } 
		if (!empty($content['field_advligging']['#items'][5])) { print ' / ' . render($content['field_advligging'][5]['#markup']); }
	}
		?>
		</div>

		<div class="tekstbold"><?php echo t('Facilities') ?>:</div>
			<div class="kolom2">
			<?php 
		if ($current_lang === "en"){
			if (!empty($content['field_advvoorzieningen']['#items'][0])) { print strtr($content['field_advvoorzieningen'][0]['#markup'], $transl); } 
			if (!empty($content['field_advvoorzieningen']['#items'][1])) { print ' / '. strtr($content['field_advvoorzieningen'][1]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][2])) { print ' / '. strtr($content['field_advvoorzieningen'][2]['#markup'], $transl); } 
			if (!empty($content['field_advvoorzieningen']['#items'][3])) { print ' / '. strtr($content['field_advvoorzieningen'][3]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][4])) { print ' / '. strtr($content['field_advvoorzieningen'][4]['#markup'], $transl); } 
			if (!empty($content['field_advvoorzieningen']['#items'][5])) { print ' / '. strtr($content['field_advvoorzieningen'][5]['#markup'], $transl); } 
			if (!empty($content['field_advvoorzieningen']['#items'][6])) { print ' / '. strtr($content['field_advvoorzieningen'][6]['#markup'], $transl); } 
			if (!empty($content['field_advvoorzieningen']['#items'][7])) { print ' / '. strtr($content['field_advvoorzieningen'][7]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][8])) { print ' / '. strtr($content['field_advvoorzieningen'][8]['#markup'], $transl); } 
			if (!empty($content['field_advvoorzieningen']['#items'][9])) { print ' / '. strtr($content['field_advvoorzieningen'][9]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][10])) { print ' / '. strtr($content['field_advvoorzieningen'][10]['#markup'], $transl); } 
			if (!empty($content['field_advvoorzieningen']['#items'][11])) { print ' / '. strtr($content['field_advvoorzieningen'][11]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][12])) { print ' / '. strtr($content['field_advvoorzieningen'][12]['#markup'], $transl); } 
			if (!empty($content['field_advvoorzieningen']['#items'][13])) { print ' / '. strtr($content['field_advvoorzieningen'][13]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][14])) { print ' / '. strtr($content['field_advvoorzieningen'][14]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][15])) { print ' / '. strtr($content['field_advvoorzieningen'][15]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][16])) { print ' / '. strtr($content['field_advvoorzieningen'][16]['#markup'], $transl); } 
			if (!empty($content['field_advvoorzieningen']['#items'][17])) { print ' / '. strtr($content['field_advvoorzieningen'][17]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][18])) { print ' / '. strtr($content['field_advvoorzieningen'][18]['#markup'], $transl); }
			// else = dutch
		} else {
			if (!empty($content['field_advvoorzieningen']['#items'][0])) { print render($content['field_advvoorzieningen'][0]); } 
			if (!empty($content['field_advvoorzieningen']['#items'][1])) { print ' / '. render($content['field_advvoorzieningen'][1]); }
			if (!empty($content['field_advvoorzieningen']['#items'][2])) { print ' / '. render($content['field_advvoorzieningen'][2]); } 
			if (!empty($content['field_advvoorzieningen']['#items'][3])) { print ' / '. render($content['field_advvoorzieningen'][3]); }
			if (!empty($content['field_advvoorzieningen']['#items'][4])) { print ' / '. render($content['field_advvoorzieningen'][4]); } 
			if (!empty($content['field_advvoorzieningen']['#items'][5])) { print ' / '. render($content['field_advvoorzieningen'][5]); } 
			if (!empty($content['field_advvoorzieningen']['#items'][6])) { print ' / '. render($content['field_advvoorzieningen'][6]); } 
			if (!empty($content['field_advvoorzieningen']['#items'][7])) { print ' / '. render($content['field_advvoorzieningen'][7]); }
			if (!empty($content['field_advvoorzieningen']['#items'][8])) { print ' / '. render($content['field_advvoorzieningen'][8]); } 
			if (!empty($content['field_advvoorzieningen']['#items'][9])) { print ' / '. render($content['field_advvoorzieningen'][9]); }
			if (!empty($content['field_advvoorzieningen']['#items'][10])) { print ' / '. render($content['field_advvoorzieningen'][10]); } 
			if (!empty($content['field_advvoorzieningen']['#items'][11])) { print ' / '. render($content['field_advvoorzieningen'][11]); }
			if (!empty($content['field_advvoorzieningen']['#items'][12])) { print ' / '. render($content['field_advvoorzieningen'][12]); } 
			if (!empty($content['field_advvoorzieningen']['#items'][13])) { print ' / '. render($content['field_advvoorzieningen'][13]); }
			if (!empty($content['field_advvoorzieningen']['#items'][14])) { print ' / '. strtr($content['field_advvoorzieningen'][14]['#markup'], $transl); }
			if (!empty($content['field_advvoorzieningen']['#items'][15])) { print ' / '. render($content['field_advvoorzieningen'][15]); }
			if (!empty($content['field_advvoorzieningen']['#items'][16])) { print ' / '. render($content['field_advvoorzieningen'][16]); }
			if (!empty($content['field_advvoorzieningen']['#items'][17])) { print ' / '. render($content['field_advvoorzieningen'][17]); }
			if (!empty($content['field_advvoorzieningen']['#items'][18])) { print ' / '. render($content['field_advvoorzieningen'][18]); }
		}
			?>
			</div>

		<?php 
		if (!empty($content['field_tarieven']['#items'][0]['tablefield']['tabledata']['row_1']['col_0'])) {	
		?>
			<div class="tekstbold"><?php echo t('Rates') ?>:</div>
			<div>
			<?php print render($content['field_tarieven']) ?>
			<?php echo t("All rates are in euro's") ?>
			</div>
		<?php 
		} elseif (!empty($content['field_advprijs'])) {	
		?>
			<div class="tekstbold"><?php echo t('Price') ?>:</div>
			<div>
				<div class="kolom2">
				<?php 
				if (!empty($content['field_advprijs'])) {
					print render($content['field_advprijs']);
				}
				?>
				<?php
				if ($current_lang == "en") {
					if (isset($content['field_advprijs_specifiatie'])) {
					print " ". strtr($content['field_advprijs_specifiatie'][0]['#markup'], $transl);
				 } else { echo 'n/a';} 
				} else {
				if (isset($content['field_advprijs_specifiatie'])) {	
					print " " . render($content['field_advprijs_specifiatie']);
				 } else { echo 'n/a';} 
				}
				?>
				</div>
			</div>
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

	   <div class="defaultblock ">
	  
		<div><?php 
		if (!empty($content['field_beschikbaarheidskalender'])){
			if (($content['field_beschikbaarheidskalender']['#items'][0]['value'] == "ical") && isset($content['field_kalender_link'][0]['#markup'])) {
				$calendarlink = $content['field_kalender_link'][0]['#markup'];
				echo "<p><strong>";
				echo t("Calendar"); 
				echo ":</strong></p>";
		
			?>
			<p>
				<iframe id='cv_if5' src='http://cdn.instantcal.com/cvir.html?id=cv_nav5&file=<?=$calendarlink?>&theme=XBL&ccolor=%23ffffc0&dims=1&ntype=cv_datepicker&ncols=3&nrows=2&gcloseable=1&gnavigable=1&gperiod=day&gtype=&itype=cv_simpleevent&border_radius=5&gwrap=1&geborder=0&n_activecolor=ffffff' allowTransparency=true scrolling='no' frameborder=0 height=320 width=450></iframe>
			</p>
			<span class="clearfix"><div style="width:8px;height:8px;padding:8px;border:red 1px solid;float:left"></div><p style="font-size:10px;float:left">&nbsp; : <?php echo t("Today");?></p></span>
			<p style="font-size:10px"><?php echo t("Date in bold : Occupied")?></p>
			<br>
			<?php
			}
			if (($content['field_beschikbaarheidskalender']['#items'][0]['value'] == "custcal")) {
				echo "<strong>";
				echo t("Calendar"); 
				echo ":</strong>";
				print render($content['field_eigen_kalender_beheren']);
			?>
			<br>
			<span class="clearfix">
			<div style="width:8px;height:8px;padding:8px;background-color:#90ee90;float:left"></div><p style="font-size:10px;float:left">&nbsp; : <?php echo t("Available");?></p>
			</span>
			<span class="clearfix">
			<div style="width:8px;height:8px;padding:8px;background-color:#ffb6c1;float:left"></div><p style="font-size:10px;float:left">&nbsp; : <?php echo t("Occupied");?></p>
			</span>
			<?php
			echo("<hr>");
			}
		} 
		?>
		</div>
	  </div>
	</div>

	<div class="wrapper images">
	  	<div class="defaultblock grid_6 gallery-node">	  
			<div class="tekstbold"><?php echo t('Photos') ?>: </div><br>
			<div class="tekst"><?php echo t('Click on photo to start slideshow') ?></div>

			<div class="grid_2">
			<?php if (!empty($content['field_advfotos'])) { 
				print render($content['field_advfotos'][0]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_advfotos'])) { 
				print render($content['field_advfotos'][1]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_advfotos'])) { 
				print render($content['field_advfotos'][2]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_advfotos'])) { 
				print render($content['field_advfotos'][3]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_advfotos'])) { 
				print render($content['field_advfotos'][4]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_advfotos'])) { 
				print render($content['field_advfotos'][5]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_advfotos'])) { 
				print render($content['field_advfotos'][6]);
			}?>
			</div>
			<div class="grid_2">
			<?php if (!empty($content['field_advfotos'])) { 
				print render($content['field_advfotos'][7]);
			}?>
			</div>
	  	</div>
	  	<br><br>
	</div><!--end wrapper images --> 
	<div class="wrapper grid_6">
		<?php if (!empty($content['field_locatie_map'])) { 
			echo("<hr>");
			print render($content['field_locatie_map']);
		}?>
	</div>

  </div><!--end content-->
  <?php endif; ?>
 
  <?php if (!empty($content['links'])): ?>
    <footer class="grid_6">
    <?php if (!$teaser){
    	echo '<br><br><br>';
    }
    ?>
      <?php print render($content['links']); ?>
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