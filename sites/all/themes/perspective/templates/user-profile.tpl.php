<?php

/**
 * @file
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * Use render($user_profile) to print all profile items, or print a subset
 * such as render($user_profile['user_picture']). Always call
 * render($user_profile) at the end in order to print all remaining items. If
 * the item is a category, it will contain all its profile items. By default,
 * $user_profile['summary'] is provided, which contains data on the user's
 * history. Other data can be included by modules. $user_profile['user_picture']
 * is available for showing the account picture.
 *
 * Available variables:
 *   - $user_profile: An array of profile items. Use render() to print them.
 *   - Field variables: for each field instance attached to the user a
 *     corresponding variable is defined; e.g., $account->field_example has a
 *     variable $field_example defined. When needing to access a field's raw
 *     values, developers/themers are strongly encouraged to use these
 *     variables. Otherwise they will have to explicitly specify the desired
 *     field language, e.g. $account->field_example['en'], thus overriding any
 *     language negotiation rule that was previously applied.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 *
 * @ingroup themeable
 */

global $language;
  //get the current language
  $current_lang = $language->language;

  // custom = IF ENGLISH = vars in Homepage slider
  if ($current_lang == "nl") {
    $verhuur = "Verhuur";
    $verkoop = "Verkoop";
    $travel = "Actieve reizen";
  
    $addadvertentie = '<a href="http://www.overwinteren.nl/nl/node/add/advertentie">Een verhuuradvertentie plaatsen op abonnementsbasis</a>';
    $addadvertentieProvisie = '<a href="http://www.overwinteren.nl/nl/node/add/advertentie-provisiebasis">Een verhuuradvertentie plaatsen op provisiebasis</a>';
    $addactieve = '<a href="http://www.overwinteren.nl/nl/node/add/actieve-reizen">Een actieve reizen-bedrijfspresentatie plaatsen (in nederlands)</a>';
    $addtekoop = '<a href="http://www.overwinteren.nl/nl/node/add/accommodatie-te-koop">Een verkoopadvertentie plaatsen op abonnementsbasis</a>';
    $addbedrijfspres = '<a href="http://www.overwinteren.nl/nl/node/add/bedrijfspresentatie">Een verhuur-bedrijfspresentatie plaatsen</a>';
     $addbedrijfspresVerkoop = '<a href="http://www.overwinteren.nl/nl/node/add/bedrijfspresentatie">Een verkoop-bedrijfspresentatie plaatsen</a>';
     $moreInfo = "klik hier voor meer informatie";

    echo "<h3>Advertentievorm kiezen</h3>
    <p>Op deze pagina kunt u uw keuze maken welk type advertentie u wilt plaatsen.</p>
 
    <p>Maak hier uw keuze: </p>";

  } elseif ($current_lang == "en") {

    $verhuur = "Rental";
    $verkoop = "Sale";

    $addadvertentie = '<a href="http://www.overwinteren.nl/en/node/add/advertentie">Add an advertisment for a property to let</a>';
    $addadvertentieProvisie = '<a href="http://www.overwinteren.nl/en/node/add/advertentie-provisiebasis">Add an advertisment for a property to let</a>';
    $addactieve = '<a href="http://www.overwinteren.nl/nl/node/add/actieve-reizen">Add a travel (Dutch only)</a>';
    $addtekoop = '<a href="http://www.overwinteren.nl/en/node/add/accommodatie-te-koop">Add an advertisment for a property for sale purpose</a>';
    $addbedrijfspres = '<a href="http://www.overwinteren.nl/en/node/add/bedrijfspresentatie">Add a company presentation for rental</a>';
    $addbedrijfspresVerkoop = '<a href="http://www.overwinteren.nl/en/node/add/bedrijfspresentatie">Add a company presentation for sale purpose</a>';
    $moreInfo = "click here for more info";

    echo "<h3> Choose Ad Form </h3>
    <p>On this page you can choose which type of ad you want to post. </p>
    <p>Make your choice here: </p>" ;
  } 
?>


<b><?php echo($verhuur); ?> (<a href="http://www.overwinteren.nl/nl/content/advertentietarieven-accommodaties-huren"><?php echo($moreInfo); ?></a>)</b>

<ul>
  <li><?php echo($addadvertentie); ?></li>
  <li><?php echo($addadvertentieProvisie); ?></li>
  <li><?php echo($addbedrijfspres); ?></li>
</ul>
 
<b><?php echo($verkoop); ?> (<a href="http://www.overwinteren.nl/nl/content/advertentietarieven-accommodaties-kopen"><?php echo($moreInfo); ?></a>)</b>
<ul>
  <li><?php echo($addtekoop); ?></li>
  <li><?php echo($addbedrijfspresVerkoop); ?></li>
</ul>


<?php
// in case of dutch
if (isset($travel)) {
  ?>
<b><?php echo($travel); ?> (<a href="http://www.overwinteren.nl/nl/content/advertentietarieven-actieve-reizen"><?php echo($moreInfo); ?></a>) </b>
<ul>
  <li><?php echo($addactieve); ?></li>
</ul>
<?php
}
?>

<br>
<br>
<hr>

<div class="profile"<?php print $attributes; ?>>
  <?php print render($user_profile); ?>
</div>
