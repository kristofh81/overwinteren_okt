
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

    <h4 class="advertentie-code">
    <?php
    print "ACTREI-";
    print $node->nid;
  	 ?>
 	</h4>

     <?php if ($teaser): ?>
    <!-- teaser template HTML here -->

	<div class="defaultblock">
	  <?php if (!empty($content['field_afotos'])) { ?>
	    <div class="teaser-pic grid_2"><?php print render($content['field_afotos'][0]); ?><br /></div>
	<?php } ?>
   	</div>
   	<div class="defaultblock ">
   		<div class="bodytekst">

   	<?php
   	if (!empty($content['field_body']["#items"][0]["summary"])) {
   		$summary = $content['field_body']["#items"][0]["summary"];
   		echo(substr($summary,0,250) . "...");
   	} elseif(!empty($content['field_body']["#items"][0]["value"])) {
   		$body = $content['field_body']["#items"][0]["value"];
   		echo(substr($body,0,250) . "...");
   	}
   	?>
		
		</div>
	</div>  

  <?php else: ?>
    <!-- regular node view template HTML here -->    

    <?php if (!empty($content['field_type_activiteit'])) { ?>
    <div class="taxonomy">
      <?php print render($content['field_type_activiteit']); ?>
    </div>
  <?php } ?>
 
  <div class="wrapper contact grid_6">
    <div class="defaultblock">
    <?php if (!empty($content['field_afotos'])) { ?>
	    <div class="teaser-pic grid_2"><?php print render($content['field_afotos'][0]); ?><br /></div>
	<?php } ?>
    
    	<div class="grid_4">
		    <div class="tekstbold"><?php echo t('Name owner') ?>:</div>
		    <div><?php 
		    if (!empty($content['field_naam'])){ print render($content['field_naam']) ;}
		      else { echo '-';} 
		    ?></div>

		    <div class="tekstbold"><?php echo t('Phone') ?>:</div>
		    <div><?php 
		    if (!empty($content['field_atelefoon'])){ print render($content['field_atelefoon']) ;}
		      else { echo 'n/a';} 
		    ?></div>
		   
		    <div class="tekstbold"><?php echo t('Website') ?>:</div>
		    <div><?php 
		    if (!empty($content['field_awebsite'])){ print render($content['field_awebsite']) ;}
		      else { echo 'n/a';} 
		    ?></div>
		  
		    <div class="tekstbold"><?php echo t('Email') ?>:</div>
		    <div><?php
		    if (!empty($content['field_ae_mail'])){ print render($content['field_ae_mail']) ;}
		      else { echo 'n/a';} 
		    ?></div>

		    <div class="tekstbold"><?php echo t('Region') ?>:</div>
		    <div><?php
		    if (!empty($content['field_plaats'])){ print render($content['field_plaats']) ;}
		      else { echo 'n/a';} 
		    ?></div>
			</div>
		</div>
		<br>
  </div><!--end wrapper contact -->
  <br>
  
  <div class="wrapper grid_6">
    <div class="defaultblock">
    <div class="tekstbold"><?php echo t('Price') ?>:</div>
    <div>
   	<?php 
		if (!empty($content['field_prijs'])) {
			print render($content['field_prijs']);
		} 
		if (isset($content['field_aaanvulling'])) {

			switch ($content['field_aaanvulling'] ) {
				case 'web':
					print render($content['field_aaanvulling']);
					break;
				case 'agr':
					print render($content['field_aaanvulling']);
					break;
				case 'onr':
					print render($content['field_aaanvulling']);
					break;	
				case 'adv':
					print render($content['field_aaanvulling']);
					break;				
				case 'day':
					print '&euro;&nbsp;' . render($content['field_aaanvulling']);
					break;
				case 'wee':
					print '&euro;&nbsp;' .  render($content['field_aaanvulling']);
					break;
				case 'mon':
					'&euro;&nbsp;' . print render($content['field_aaanvulling']);
					break;
				case 'ppd':
					'&euro;&nbsp;' . print render($content['field_aaanvulling']);
					break;
				case 'ppw':
					'&euro;&nbsp;' . print render($content['field_aaanvulling']);
					break;
				case 'ppm':
					'&euro;&nbsp;' . print render($content['field_aaanvulling']);
					break;
				case 'fro':
					'&euro;&nbsp;' . print render($content['field_aaanvulling']);
					break;
				case 'pfd':
					'&euro;&nbsp;' . print render($content['field_aaanvulling']);
					break;
				case 'pfw':
					'&euro;&nbsp;' . print render($content['field_aaanvulling']);
					break;
				case 'pfm':
					'&euro;&nbsp;' . print render($content['field_aaanvulling']);
					break;															
				default:
					print render($content['field_aaanvulling']);
					break;
			}
		 } else { echo 'n/a';} 
		?>
    </div>
    <div class="tekstbold"><?php echo t('Location') ?>:</div>
    <div>
    <?php
    if (!empty($content['field_aligging']['#items'][0])) { print render($content['field_aligging'][0]['#markup']) ; } 
    if (!empty($content['field_aligging']['#items'][1])) { print ' / ' . render($content['field_aligging'][1]['#markup']) ; }
    if (!empty($content['field_aligging']['#items'][2])) { print ' / ' . render($content['field_aligging'][2]['#markup']); } 
    if (!empty($content['field_aligging']['#items'][3])) { print ' / ' . render($content['field_aligging'][3]['#markup']); }
    if (!empty($content['field_aligging']['#items'][4])) { print ' / ' . render($content['field_aligging'][4]['#markup']); } 
    if (!empty($content['field_aligging']['#items'][5])) { print ' / ' . render($content['field_aligging'][5]['#markup']); }
    elseif (empty($content['field_aligging']['#items'])) { echo 'n/a';}
    ?>
    </div>

    <div class="tekstbold"><?php echo t('Facilities') ?>:</div>
      <div class="kolom2">
            <?php 
      if (!empty($content['field_avoorzieningen']['#items'][0])) { print render($content['field_avoorzieningen'][0]['#markup']); } 
      if (!empty($content['field_avoorzieningen']['#items'][1])) { print ' / '. render($content['field_avoorzieningen'][1]['#markup']); }
      if (!empty($content['field_avoorzieningen']['#items'][2])) { print ' / '. render($content['field_avoorzieningen'][2]['#markup']); } 
      if (!empty($content['field_avoorzieningen']['#items'][3])) { print ' / '. render($content['field_avoorzieningen'][3]['#markup']); }
      if (!empty($content['field_avoorzieningen']['#items'][4])) { print ' / '. render($content['field_avoorzieningen'][4]['#markup']); } 
      if (!empty($content['field_avoorzieningen']['#items'][5])) { print ' / '. render($content['field_avoorzieningen'][5]['#markup']); } 
      if (!empty($content['field_avoorzieningen']['#items'][6])) { print ' / '. render($content['field_avoorzieningen'][6]['#markup']); } 
      if (!empty($content['field_avoorzieningen']['#items'][7])) { print ' / '. render($content['field_avoorzieningen'][7]['#markup']); }
      if (!empty($content['field_avoorzieningen']['#items'][8])) { print ' / '. render($content['field_avoorzieningen'][8]['#markup']); } 
      if (!empty($content['field_avoorzieningen']['#items'][9])) { print ' / '. render($content['field_avoorzieningen'][9]['#markup']); }
      if (!empty($content['field_avoorzieningen']['#items'][10])) { print ' / '. render($content['field_avoorzieningen'][10]['#markup']); } 
      if (!empty($content['field_avoorzieningen']['#items'][11])) { print ' / '. render($content['field_avoorzieningen'][11]['#markup']); }
      if (!empty($content['field_avoorzieningen']['#items'][12])) { print ' / '. render($content['field_avoorzieningen'][12]['#markup']); } 
      if (!empty($content['field_avoorzieningen']['#items'][13])) { print ' / '. render($content['field_avoorzieningen'][13]['#markup']); }
      elseif(empty($content['field_avoorzieningen'])) { echo 'n/a';}
      ?>
      </div>
    <br />
    
    </div>
<hr>
    <div class="defaultblock">
    <div class="tekstbold"><?php echo t('Description') ?>: </div><br />
    <div class="bodytekst"><?php 
    if (!empty($content['field_body'])) { print render($content['field_body']); }
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
		<?php if (!empty($content['field_afotos'])) { 
			print render($content['field_afotos'][0]);
		}?>
		</div>
		<div class="grid_2">
		<?php if (!empty($content['field_afotos'])) { 
			print render($content['field_afotos'][1]);
		}?>
		</div>
		<div class="grid_2">
		<?php if (!empty($content['field_afotos'])) { 
			print render($content['field_afotos'][2]);
		}?>
		</div>
		<div class="grid_2">
		<?php if (!empty($content['field_afotos'])) { 
			print render($content['field_afotos'][3]);
		}?>
		</div>

		
		<div class="grid_2">
		<?php if (!empty($content['field_afotos'])) { 
			print render($content['field_afotos'][4]);
		}?>
		</div>
		<div class="grid_2">
		<?php if (!empty($content['field_afotos'])) { 
			print render($content['field_afotos'][5]);
		}?>
		</div>
		<div class="grid_2">
		<?php if (!empty($content['field_afotos'])) { 
			print render($content['field_afotos'][6]);
		}?>
		</div>
		<div class="grid_2">
		<?php if (!empty($content['field_afotos'])) { 
			print render($content['field_afotos'][7]);
		}?>
		</div>
    </div>
    <br><br>
  </div><!--end wrapper images --> 

  <div class="wrapper grid_6">
		<?php if (!empty($content['field_location_map'])) { 
			echo("<hr>");
			print render($content['field_location_map']);
		}?>
	</div>
  </div><!--end content --> 
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