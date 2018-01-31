<?php                                                                                                                 //

define('PERSPECTIVE_THEME_SETTINGS_COLUMN_VARIABLE_PATTERN', 'perspective_%s_size');
define('PERSPECTIVE_THEME_SETTINGS_ROW_VARIABLE_PATTERN', 'perspective_%s_size');
define('PERSPECTIVE_PAGE_TEMPLATE_VARIABLE_PATTERN', '%s_size');
define('PERSPECTIVE_GRID_COLUMNS', 12);

require_once 'includes/custom_menu.inc';

/**
 * Implements template_html_head_alter().
 */
function perspective_html_head_alter(&$variables) {
  global $theme;
  if ($theme == 'perspective') {
    if (theme_get_setting('default_favicon')) {
      foreach ($variables as $key => $value) {
        if (strpos($key, 'misc/favicon.ico') !== FALSE) {
          $variables[$key]['#attributes']['href'] = url(drupal_get_path('theme', 'perspective') . 'favicon.ico');
        }
      }
    }
  }
}

/**
 * Implements hook_preprocess_html().
 */
function perspective_preprocess_html(&$variables) {


  $theme_path = path_to_theme();
  drupal_add_css($theme_path . '/css/reset.css');
  drupal_add_css($theme_path . '/css/reset.css');
  drupal_add_css($theme_path . '/css/grid.css');
  drupal_add_css($theme_path . '/js/lightbox/themes/default/jquery.lightbox.css');
  drupal_add_css($theme_path . '/css/flexslider.css');
  drupal_add_css($theme_path . '/css/iview-slider/iview.css');
  drupal_add_css($theme_path . '/css/iview-slider/style.css');
  drupal_add_css($theme_path . '/css/jquery.onebyone.css');
  drupal_add_css($theme_path . '/css/framework.css');
  drupal_add_css($theme_path . '/css/style.css');
  drupal_add_css($theme_path . '/css/responsive.css');



  if (!empty($_GET['theme_skin'])) {
    $_SESSION['theme_skin'] = $_GET['theme_skin'];
  }

  $default_skin = theme_get_setting('default_skin', 'perspective');

  if (!empty($_SESSION['theme_skin'])) {
    $default_skin = $_SESSION['theme_skin'];
  }
  //setting default skin css file

  if (file_exists($theme_path . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . $default_skin . '.css')) {
    drupal_add_css($theme_path . '/css/themes/' . $default_skin . '.css');
  } else {
    $_SESSION['theme_skin'] = FALSE;
    $default_skin = theme_get_setting('default_skin', 'perspective');
    drupal_add_css($theme_path . '/css/themes/' . $default_skin . '.css');
  }



  drupal_add_css($theme_path . '/css/perspective.css');

  // Cache path to theme for duration of this function:
  $path_to_perspective = drupal_get_path('theme', 'perspective');
  // Add 'viewport' meta tag:
  drupal_add_html_head(
          array(
      '#tag' => 'meta',
      '#attributes' => array(
          'name' => 'viewport',
          'content' => 'width=device-width, initial-scale=1',
      ),
          ), 'perspective:viewport_meta'
  );
  $path_to_icons = $path_to_perspective . '/';
  global $theme;
  if ($theme == 'perspective') {
    drupal_add_html_head_link(array('rel' => 'apple-touch-icon-precomposed', 'href' => $path_to_icons . 'apple-touch-icon-144-precomposed.png', 'sizes' => '144x144'));
    drupal_add_html_head_link(array('rel' => 'apple-touch-icon-precomposed', 'href' => $path_to_icons . 'apple-touch-icon-114-precomposed.png', 'sizes' => '114x114'));
    drupal_add_html_head_link(array('rel' => 'apple-touch-icon-precomposed', 'href' => $path_to_icons . 'apple-touch-icon-72-precomposed.png', 'sizes' => '72x72'));
    drupal_add_html_head_link(array('rel' => 'apple-touch-icon-precomposed', 'href' => $path_to_icons . 'apple-touch-icon-57-precomposed.png'));
  }
}

function perspective_preprocess_page(&$vars) {
  global $language;
  //get the current language
  $current_lang = $language->language;

  // main menu
  $custom_main_menu = _custom_main_menu_render_superfish();
  if (!empty($custom_main_menu['content'])) {
    $vars['navigation'] = $custom_main_menu['content'];
  }

  // overide node title with content type

  if (arg(0) == 'node' && arg(1)) {
    $nid = arg(1);

    $node = node_load($nid);
    if (is_object($node)) {
      switch ($node->type) {
      case 'blog':
        $vars['title'] = t('Blog');

        break;

      case 'portfolio':
        $vars['title'] = t('Portfolio');
        break;
      }
    }
  }
  
  // theme slogan Homepage
  if ($current_lang == "nl") {
    $vars['perspective_theme_slogan'] = 'Welkom op Overwinteren.nl<br>Dé website waar u alles vindt om te overwinteren.';
  } elseif ($current_lang == "en") {
    $vars['perspective_theme_slogan'] = 'We wish you a pleasant stay!<br>This is the website where you find everything about winter vacationing.';
  } 


  //search block form
  $seach_block_form = drupal_get_form('search_block_form');
  $seach_block_form['#id'] = 'searchform';
  $seach_block_form['search_block_form']['#id'] = 's';
  $seach_block_form['search_block_form']['#attributes']['placeholder'] = t('Search...');
  $vars['seach_block_form'] = drupal_render($seach_block_form);

  

  // custom = IF ENGLISH = vars in Homepage slider
  if ($current_lang == "nl") {
  // footer copyright message
    $vars['perspective_footer_copyright'] = '<a href="http://www.overwinteren.nl/" target="_blank">Overwinteren.nl</a> &copy; 2016. ALLE RECHTEN VOORBEHOUDEN';
  } elseif ($current_lang == "en") {
    $vars['perspective_footer_copyright'] = '<a href="http://www.overwinteren.nl/" target="_blank">Overwinteren.nl</a> &copy; 2016. ALL RIGHTS RESERVED';
  } 

  // footer social links
  $vars['perspective_footer_social_links'] = theme_get_setting('perspective_footer_social_links', 'perspective');


  //banner slider

  if (variable_get('theme_perspective_first_install', TRUE)) {
    include_once 'theme-settings.php';
    _perspective_install();
  }

  if (theme_get_setting('perspective_homepage_type') == 'slider') {
    $banners = perspective_show_banners();
    $vars['slider'] = perspective_banners_markup($banners);
  } else {
    $vars['slider'] = perspective_hompage_get_video();
  }



  //sidebar
  $sidebar_region_details = _perspective_get_multiple_regions(array('sidebar_'));
  $sidebar_regions = $sidebar_region_details['sidebar_'];
  // Count the results:
  $sidebar_count = count($sidebar_regions);

  // Start from zero:
  $sidebar_total_width = 0;
  // If there are any sidebars, loop through all the columns:
  if ($sidebar_count > 0) {
    foreach ($sidebar_regions as $key => $name) {
      // If this sidebar actually has content:
      if (count($vars['page'][$key]) > 0) {
        // Find out how big it's supposed to be:
        $column_width_setting = (int) theme_get_setting(sprintf(PERSPECTIVE_THEME_SETTINGS_COLUMN_VARIABLE_PATTERN, $key));
        // Make it available to the page template:
        $vars[sprintf(PERSPECTIVE_PAGE_TEMPLATE_VARIABLE_PATTERN, $key)] = $column_width_setting;
        // Add the width of this sidebar to the total sidebar width:
        $sidebar_total_width += $column_width_setting;
      }
    }
  }

  $vars[sprintf(PERSPECTIVE_PAGE_TEMPLATE_VARIABLE_PATTERN, 'content')] = PERSPECTIVE_GRID_COLUMNS - $sidebar_total_width;
}

function _perspective_get_multiple_regions($region_types = array('sidebar_'), $theme_override = NULL) {

  $current_theme = $theme_override ? $theme_override : variable_get('theme_default', $theme_override);

  $regions = system_region_list($current_theme);

  $theme_regions = array();
  // Loop through the region types:
  foreach ($region_types as $region_type) {
    foreach ($regions as $key => $name) {
      if (strpos($key, $region_type) === 0) {
        $theme_regions[$region_type][$key] = $name;
      }
    }
  }

  return $theme_regions;
}

function perspective_get_banners($all = TRUE) {
  // Get all banners
  $banners = variable_get('theme_perspective_banner_settings', array());

  // Create list of banner to return
  $banners_value = array();
  foreach ($banners as $banner) {
    if ($all || $banner['image_published']) {
      // Add weight param to use `drupal_sort_weight`
      $banner['weight'] = $banner['image_weight'];
      $banners_value[] = $banner;
    }
  }

  // Sort image by weight
  usort($banners_value, 'drupal_sort_weight');

  return $banners_value;
}

/**
 * Set banner settings.
 *
 * @param <array> $value
 *    Settings to save
 */
function perspective_set_banners($value) {
  variable_set('theme_perspective_banner_settings', $value);
}

function perspective_banners_markup($banners) {

  if ($banners) {
    // Add javascript to manage banners
    // Generate HTML markup for banners
    //return perspective_banner_markup($banners) . frontsearch();
    return perspective_banner_markup($banners);
  } else {
    return '';
  }
}

function perspective_banners_add_js() {
  
}

/**
 * Generate banners markup.
 *
 * @return <string>
 *    HTML code to display banner markup.
 */
function perspective_banner_markup($banners) {

  return perspective_default_slider_markup($banners);
}

function perspective_default_slider_markup($banners) {
	global $language;
	//get the current language
	$current_lang = $language->language;

	// custom = IF ENGLISH = vars in Homepage slider
	if ($current_lang == "en") {
		$banners[0]['image_title'] = "Overwinteren.nl";
		$banners[0]['image_description'] = "Wintering accommodations and –journeys all over the world, including Spain, Curacao, Indonesia, Thailand, Morocco and South Africa.";
		$banners[1]['image_title'] = "Winter vacationing is also…";
		$banners[1]['image_description'] = "Meeting cultures, being active and relaxing, good food, discovering, making friends";
		$banners[2]['image_title'] = "Not only <br> winter vacationing…";
		$banners[2]['image_description'] = "all accommodations are available for rent any other time of the year!";
		$banners[3]['image_title'] = "Overwinteren.nl for…";
		$banners[3]['image_description'] = "luxurious villas with private pool, idyllic cottages in the countryside, hotels, RVs, bed &breakfast, beautiful bungalows by the beach, campsites, city apartments";
		for ($i = 0; $i < 4; $i++) {
			$banners[$i]['image_url_title'] = "Discover more";
			$banners[$i]['image_url'] = "http://www.overwinteren.nl/en/content/accommodations";
		}
	}

  $output = '<div id="onebyone_slider">';
  foreach ($banners as $i => $banner) {
    $variables = array(
        'path' => $banner['image_path'],
        'alt' => t('@image_desc', array('@image_desc' => $banner['image_title'])),
        'title' => t('@image_title', array('@image_title' => $banner['image_title'])),
        'attributes' => array(
            'class' => 'ob1_img_device1', // hide all the slides except #1
            'id' => 'slide-number-' . $i,
            'longdesc' => t('@image_desc', array('@image_desc' => $banner['image_description']))
        ),
    );
    // Draw image
    $image = theme('image', $variables);

    $img_url_title = ($banner['image_url_title']) ? $banner['image_url_title'] : 'Read more';


    // Remove link if is the same page
    //$banner['image_url'] = ($banner['image_url'] == current_path()) ? FALSE : $banner['image_url'];

    $image_url_title = '';
    if (isset($banner['image_url']) && !empty($banner['image_url'])) {
      $image_url_title = l($img_url_title, $banner['image_url'], array('attributes' => array('class' => array('button'))));
    }



    $output .= '<div class="oneByOne_item">';
    $output .='<span class="ob1_title">' . t($banner['image_title']) . '</span>';
    if (isset($banner['image_description'])) {
      $output .= "\n";
      $output .= '<span class="ob1_description">' . t($banner['image_description']) . '</span>';
    }
    if (isset($banner['image_url'])) {
      $output .= "\n";
      $output .= '<span class="ob1_button"><a href="' . url($banner['image_url']) . '" class="default_button">' . $img_url_title . '</a></span>';
    }
    if (isset($image)) {
      $output .= "\n";
      $output .=$image;
    }
    $output .= "\n";
    $output.= '</div>';
  }



  $output .='</div>';
  return $output;
}

/**
 * Get banner to show into current page in accord with settings
 *
 * @return <array>
 *    Banners to show
 */
function perspective_show_banners() {
  $banners = perspective_get_banners(FALSE);

  return $banners;
}

function perspective_status_messages(&$variables) {
  $display = $variables['display'];
  $output = '';

  $message_info = array(
      'status' => array(
          'heading' => 'Status message',
          'class' => 'success',
      ),
      'error' => array(
          'heading' => 'Error message',
          'class' => 'error',
      ),
      'warning' => array(
          'heading' => 'Warning message',
          'class' => '',
      ),
  );

  foreach (drupal_get_messages($display) as $type => $messages) {
    $message_class = $type != 'warning' ? $message_info[$type]['class'] : 'warning';
    $output .= "<div class=\"alert alert-block alert-$message_class fade in " . $message_class . "_msg\">";
    if (!empty($message_info[$type]['heading'])) {
      $output .= '<h2 class="element-invisible">' . $message_info[$type]['heading'] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    } else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  return $output;
}

function perspective_button($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'submit';
  element_set_attributes($element, array('id', 'name', 'value'));

  $element['#attributes']['class'][] = 'form-' . $element['#button_type'] . ' default_button';
  if (!empty($element['#attributes']['disabled'])) {
    $element['#attributes']['class'][] = 'form-button-disabled';
  }

  return '<input' . drupal_attributes($element['#attributes']) . ' />';
}

function perspective_hompage_get_video() {
  $output = '<div class="container_12 clearfix">';

  $output .= '<div class="grid_6 home_video_block">
						<div class="home_video_big">
							<div class="container_video">
								' . theme_get_setting('perspective_video') . '
							</div>
						</div>
					</div>';


  $output .= '<div class="grid_6"><div class="home_video_desciption"><div class="container_video">';

  $output.='<h1>' . theme_get_setting('perspective_video_title') . '</h1>';
  $description = theme_get_setting('perspective_video_description');
  if (!empty($description)) {
    $output .= '<p>' . $description . '</p>';
  }
  $link = theme_get_setting('perspective_video_link_url');
  if (!empty($link)) {
    $output .='<div class = "home_video_button"><a class = "smk_button red large" href = "' . url($link) . '">' . theme_get_setting('perspective_video_link_title') . '</a></div >';
  }

  $output.= '</div></div></div><div class="clear"></div>';

  $output .= '</div>';
  return $output;
}

function perspective_format_comma_field($field_category, $node, $limit = NULL) {
  $category_arr = array();
  $category = '';
  if (!empty($node->{$field_category}[LANGUAGE_NONE])) {
    foreach ($node->{$field_category}[LANGUAGE_NONE] as $item) {
      $term = taxonomy_term_load($item['tid']);
      if ($term) {
        $category_arr[] = l($term->name, 'taxonomy/term/' . $item['tid']);
      }

      if ($limit) {
        if (count($category_arr) == $limit) {
          $category = implode(', ', $category_arr);
          return $category;
        }
      }
    }
  }
  $category = implode(', ', $category_arr);

  return $category;
}

function perspective_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.
  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
          'class' => array('pager-first'),
          'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
          'class' => array('pager-previous'),
          'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
            'class' => array('pager-ellipsis'),
            'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
              'class' => array('pager-item'),
              'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
              'class' => array('pager-current', 'active_smk_link'),
              'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
              'class' => array('pager-item'),
              'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
            'class' => array('pager-ellipsis'),
            'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
          'class' => array('pager-next'),
          'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
          'class' => array('pager-last'),
          'data' => $li_last,
      );
    }
    return '<h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
                'items' => $items,
                'attributes' => array('class' => array('pager', 'all_transition_05'), 'id' => 'smk_pagination'),
            ));
  }
}



/*

function perspective_preprocess_node(&$variables) {
  $node = $variables['node'];

  if($variables['view_mode'] == 'teaser') {
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->type . '__teaser';   
  }
}

*/


/**
 * Registers overrides for various functions.
 *
 * In this case, overrides three user functions
 */
function perspective_theme() {
  $items = array();
  
  $items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'perspective') . '/templates',
    'template' => 'user-register-form',
    'preprocess functions' => array(
      'perspective_preprocess_user_register_form'
    ),
  );
  return $items;
}

function perspective_preprocess(&$variables) {
  //$variables['frontsearch'] = frontsearch();
}

/*
function frontsearch() {

$selectPersons = '<select id="search-persons" class="form-select">';
for ($k = 1; $k < 30; $k++) {
  $selectPersons .= '<option name="field_advpersons" value="'.$k.'">'.$k.'</option>';
}
$selectPersons .= '</select>';

global $language;
//get the current language
$current_lang = $language->language;

$selectCountries = '';
if ($current_lang == "en") {
  $selectCountries = '<select id="search-countries" name="field_advaccommodaties_1" class="form-select"><option value="All" selected="selected">- Any -</option><option value="1659">Antilles</option><option value="1693">-Aruba</option><option value="1694">-Bonaire</option><option value="1695">-Curacao</option><option value="1660">Australia</option><option value="1661">Bahamas</option><option value="1662">Barbados</option><option value="1663">Brazil</option><option value="1664">Costa Rica</option><option value="1665">Croatia</option><option value="1666">Cyprus</option><option value="1667">Dominican Republic</option><option value="2059">Ecuador</option><option value="1668">Egypt</option><option value="1669">France</option><option value="1670">Greece</option><option value="1671">Indonesia</option><option value="1707">-Java</option><option value="1706">-Bali</option><option value="1708">-Lombok</option><option value="1709">-Others</option><option value="1672">Israel</option><option value="1673">Italy</option><option value="1697">-Campania</option><option value="1698">-Emilia Romagna</option><option value="1699">-Liguria</option><option value="1700">-Marche</option><option value="1692">-Puglia</option><option value="1701">-Roma area</option><option value="1702">-Sardinia</option><option value="1703">-Sicily</option><option value="1704">-Tuscany</option><option value="1705">-Umbria</option><option value="1674">Jamaica</option><option value="1675">Kenya</option><option value="1684">Suriname</option><option value="1683">Sri Lanka</option><option value="1685">Tanzania</option><option value="1691">Zanzibar</option><option value="1690">USA</option><option value="1741">-Florida</option><option value="1687">Turkey</option><option value="1686">Thailand</option><option value="1689">Uruguay</option><option value="1688">United Kingdom</option><option value="1696">Others</option><option value="1679">Peru</option><option value="1680">Portugal</option><option value="1710">-Alentejo</option><option value="1711">-Algarve</option><option value="1712">-Beiras</option><option value="1713">-Braga</option><option value="1715">-Costa de Prata</option><option value="1714">-Coimbra</option><option value="1716">-Lisbon area</option><option value="1717">-Madeira</option><option value="2008">-Minho</option><option value="1740">-Others</option><option value="1718">-Ribatejo</option><option value="1719">-Vale de Tejo</option><option value="1676">Malta</option><option value="1678">Namibia</option><option value="1677">Morocco</option><option value="1681">South Africa</option><option value="1682">Spain</option><option value="1721">-Alicante</option><option value="1722">-Andalucia</option><option value="1723">-Balearic Islands</option><option value="1736">--Ibiza</option><option value="1724">-Barcelona</option><option value="1725">-Canary Islands</option><option value="1743">--Lanzarote</option><option value="1744">--Tenerife</option><option value="1742">--La Palma</option><option value="1726">-Cantabria</option><option value="1727">-Cordoba</option><option value="1728">-Costa Blanca</option><option value="1729">-Costa Brava</option><option value="1730">-Costa Calida</option><option value="1732">-Costa de la Luz</option><option value="1731">-Costa del Azahar</option><option value="1733">-Costa del Sol</option><option value="1734">-Costa Dorada</option><option value="1735">-Granada</option><option value="1737">-Madrid</option><option value="1738">-Murcia</option><option value="1720">-Others</option><option value="1739">-Valencia</option></select>';
} elseif ($current_lang == "nl") {
  $selectCountries = '<select id="search-countries" name="field_advaccommodaties_1" class="form-select"><option value="All" selected="selected">- kies een land of regio -</option><option value="1751">Antillen</option><option value="1786">-Aruba</option><option value="1787">-Bonaire</option><option value="1788">-Curacao</option><option value="1789">-Overigen</option><option value="1753">Australië</option><option value="1745">Autohuur</option><option value="1755">Bahamas</option><option value="1754">Barbados</option><option value="1756">Brazilië</option><option value="1757">Costa Rica</option><option value="1761">Cyprus</option><option value="1759">Dominicaanse Republiek</option><option value="2056">Ecuador</option><option value="1762">Egypte</option><option value="1763">Frankrijk</option><option value="1764">Griekenland</option><option value="1765">Groot Brittannië</option><option value="1766">Indonesië</option><option value="1822">-Bali</option><option value="1823">-Java</option><option value="1824">-Lombok</option><option value="1825">-Overigen</option><option value="1748">Informatie over adverteren Actieve Reizen</option><option value="1767">Israel</option><option value="1768">Italië</option><option value="1826">-Abruzzen</option><option value="1827">-Basilicata</option><option value="1828">-Calibrië</option><option value="1829">-Campania</option><option value="1830">-Emilia-Romagna</option><option value="1831">-Lazio (Rome)</option><option value="1832">-Ligurië</option><option value="1833">-Marche</option><option value="1834">-Molise</option><option value="1835">-Puglia</option><option value="1836">-Rome</option><option value="1837">-Sardinië</option><option value="1838">-Sicilië</option><option value="1839">-Toscane</option><option value="1840">-Umbrië</option><option value="1747">Jamaica</option><option value="1769">Kenia</option><option value="1770">Kroatië</option><option value="1777">Suriname</option><option value="1776">Sri Lanka</option><option value="1778">Tanzania</option><option value="1783">Zanzibar</option><option value="1784">Zuid-Afrika</option><option value="1749">Vliegtickets</option><option value="1782">Verenigde Staten van Amerika</option><option value="1821">-Florida</option><option value="1779">Thailand</option><option value="1780">Turkije</option><option value="1781">Uruguay</option><option value="1785">Overigen</option><option value="1760">Peru</option><option value="1774">Portugal</option><option value="1811">-Algarve</option><option value="1810">-Alentejo</option><option value="1812">-Beiras</option><option value="1813">-Braga</option><option value="1815">-Costa de Prata</option><option value="1814">-Coimbra</option><option value="1816">-Lissabon en omgeving</option><option value="1817">-Madeira</option><option value="2007">-Minho</option><option value="1818">-Ribatejo</option><option value="1819">-Vale de Tejo</option><option value="1820">-Overigen</option><option value="1752">Onderzoek Overwinteren</option><option value="1773">Namibië</option><option value="1771">Malta</option><option value="1772">Marokko</option><option value="1775">Spanje</option><option value="1790">-Alicante</option><option value="1791">-Andalusië</option><option value="1792">-Balearen</option><option value="1793">-Barcelona</option><option value="1794">-Canarische Eilanden</option><option value="1843">--Tenerife</option><option value="1842">--Lanzarote</option><option value="1841">--La Palma</option><option value="1795">-Cantabrië</option><option value="1796">-Cordoba</option><option value="1797">-Costa Blanca</option><option value="1798">-Costa Brava</option><option value="1799">-Costa Calida</option><option value="1801">-Costa da la Luz</option><option value="1800">-Costa del Azahar</option><option value="1803">-Costa del Sol</option><option value="1802">-Costa Dorada</option><option value="1804">-Granada</option><option value="1805">-Madrid</option><option value="1806">-Murcia</option><option value="1807">-Sevilla</option><option value="1808">-Valencia</option><option value="1809">-Overigen</option></select>';
}



  $output = '
<div class="front-searchbox container_12" style="padding: 10px 0 15px 0;">
<div class="sidebar grid_2"></div>
<div class="grid_8">
<div style="margin-right:auto;margin-left:auto;width:700px;">
  <div class="views-exposed-form">
  <div class="views-exposed-widgets clearfix">
          <div id="edit-field-advpersons-wrapper" class="views-exposed-widget views-widget-filter-field_advpersons">
                  <label for="edit-field-advpersons">
            Aantal personen          </label>
                        <div class="views-widget">
          <div class="form-item form-type-textfield form-item-field-advpersons">
 '.$selectPersons.'
</div>
        </div>
              </div>
          <div id="edit-field-advaccommodaties-1-wrapper" class="views-exposed-widget views-widget-filter-field_advaccommodaties_1">
                  <label for="edit-field-advaccommodaties-1">
            Land/regio          </label>
                        <div class="views-widget">
          <div class="form-item form-type-select form-item-field-advaccommodaties-1">
'.$selectCountries.'
</div>
        </div>
              </div>

<div id="edit-field-type-node-wrapper" class="views-exposed-widget views-widget-filter-field_advaccommodaties_1">
                  <label for="edit-field-type-1">
            Te huur/te koop          </label>
                        <div class="views-widget">
          <div class="form-item form-type-select form-item-field-type-1">
          <select id="search-type" class="form-select">
          <option value="rent">Te huur</option><option value="sale">Te koop</option>
          </select>
              </div>
        </div>
              </div>

                    <div class="views-exposed-widget views-submit-button" style="margin-top: 8px;">
      <input type="submit" id="front-submit-custom-search" name="" value="Zoek" class="form-submit default_button" />
    </div>
      </div>
</div>
</div>
</div>
<div class="sidebar grid_2"></div>
</div>
';

return $output;
}
*/