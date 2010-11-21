<?php

$content_width = 480;
add_theme_support( 'automatic-feed-links' );

if ( function_exists('register_sidebar') )
    register_sidebar();	
    
// Add WP 3.0 Menu Theme Support
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'nav-menus' );
	add_action( 'init', 'register_gpp_menus' );

	function register_gpp_menus() {
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu' )
			)
		);
	}
}


// Make Menu Support compatible with earlier WP versions
function theme_nav() {		
	if ( function_exists( 'wp_nav_menu' ) )
		wp_nav_menu( 'sort_column=menu_order&container_class=menu&menu_class=&menu_location=main-menu&fallback_cb=gpptheme_nav_fallback' );
	else
		theme_nav_fallback();
}

// Create our GPP Fallback Menu
function theme_nav_fallback() {
    wp_page_menu( 'show_home=1&menu_class=menu' );
}


//Auto Load JS
function theme_load_js() {
    if (is_admin()) return;
   	wp_enqueue_script('jquery');
   	wp_enqueue_script('superfish', get_bloginfo('template_directory').'/includes/js/superfish.js', array( 'jquery' ) );
}
add_action('init', 'theme_load_js');

function load_dom_ready_js() {
	$doc_ready_script="";
	$doc_ready_script .= '
	<script type="text/javascript">
		jQuery(document).ready(function(){ 
        	jQuery("div.menu ul").superfish(); 
    	}); 
	</script>';
	echo $doc_ready_script;
}

add_action('wp_head', 'load_dom_ready_js');
	
	
	

// Custom Theme Options

function mytheme_get_styles() {
// This function gets available styles - Angelo Bertolli
	$default_headers = array(
		'Name' => 'Skin',
		'Author' => 'Author',
		'AuthorURI' => 'Author URI'
	);

	$style_list = glob(get_stylesheet_directory()."/skins/*.css");
	foreach ($style_list as $style) {
		$style_data = get_file_data( $style, $default_headers );
		$style_data['CSS'] = basename($style);
		$all_styles[] = $style_data;
	}

	return $all_styles;

}

$all_styles = mytheme_get_styles();
foreach ($all_styles as $style) {
	if ($style['Name'] != "") {
		$style_options[] = $style['Name'];
	} else {
		$style_options[] = $style['CSS'];
	}
}

$themename = "Dragonskin";
$shortname = "ds";
$options = array (    
    array(  "name" => "Choose a Style",
            "id" => $shortname."_style_chooser",
            "std" => "Dragonskin Red",
            "type" => "select",
			"options" => $style_options
	),
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "Dragonskin Skin", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' options saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' options reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> Options</h2>

<form method="post">
<br/>
<table class="optiontable">

<?php foreach ($options as $value) { 
    
if ($value['type'] == "text") { ?>
        
<tr valign="top"> 
    <th scope="row"><?php echo $value['name']; ?>:</th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
    </td>
</tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr valign="top"> 
        <th scope="row"><?php echo $value['name']; ?>:</th>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>

<?php 
} 
}

?>

</table>

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

function mytheme_wp_head() { 
	global $options, $all_styles; 
	foreach ($options as $value) {
        if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
		foreach ($all_styles as $style) {
			if ($ds_style_chooser == $style['Name'] or $ds_style_chooser == $style['CSS']) $theme = "skins/".$style['CSS'];
		}
       
?>
<link href="<?php bloginfo('template_directory'); ?>/<?php echo $theme; ?>" rel="stylesheet" type="text/css" />
<?php  }
}

add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin'); ?>
