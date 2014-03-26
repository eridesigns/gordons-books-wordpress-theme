<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Bronte
 */
 
// removes the closing paragraphs that WP places everywhere
//remove_filter( 'the_content', 'wpautop' );
//remove_filter( 'the_excerpt', 'wpautop' );

//	Removing the p tags from wrapping images
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

//	Make www ftp email clickable automatically
add_filter('the_content', 'make_clickable');
add_filter('the_excerpt', 'make_clickable');

// Header cleanup for security
function eri_bronte_head_cleanup()
{
	// remove header links
	remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category Feeds
	remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment Feeds
	remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
	remove_action( 'wp_head', 'index_rel_link' );                         // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
	remove_action( 'wp_head', 'wp_generator' );                           // WP version
	if (!is_admin())
	{
		//wp_deregister_script('jquery');                                   // De-Register jQuery
		//wp_register_script('jquery', '', '', '', true);                   // It's already in the Header
	}
}

//	Rss clean up
add_action('init', 'eri_bronte_head_cleanup');

//	Removing WP version from RSS
function eri_bronte_rss_version() {
	return '';
	}
add_filter('the_generator', 'eri_bronte_rss_version');

//	Rewriting search URL
function search_url_rewrite_rule()
{
	if ( is_search() && !empty($_GET['s']))
	{
		wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
		exit();
	}
}

add_action('template_redirect', 'search_url_rewrite_rule');

//	If has 1 result, search and go to the article
add_action('template_redirect', 'single_result');
function single_result()
{
	if (is_search())
	{
		global $wp_query;
		if ($wp_query->post_count == 1)
		{
			wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
		}
	}
}

// Adding custom class to avatar icon
function eri_bronte_avatar_css($class) {
	$class = str_replace("class='avatar", "class='author_gravatar left ", $class) ;
	return $class;
}

add_filter('get_avatar','eri_bronte_avatar_css');

// Excerpt button for read more
function new_excerpt_more($more) {
    global $post;
	return '... <br><br><a class="btn btn-sm btn-primary" href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


//	Adding an editor to the excerpt field
function tinymce_excerpt_js(){ ?>
<script type="text/javascript">
        jQuery(document).ready( tinymce_excerpt );
            function tinymce_excerpt() {
                jQuery("#excerpt").addClass("mceEditor");
                tinyMCE.execCommand("mceAddControl", false, "excerpt");
            }
</script>
<?php }
add_action( 'admin_head-post.php', 'tinymce_excerpt_js');
add_action( 'admin_head-post-new.php', 'tinymce_excerpt_js');
function tinymce_css(){ ?>
<style type='text/css'>
            #postexcerpt .inside{margin:0;padding:0;background:#fff;}
            #postexcerpt .inside p{padding:0px 0px 5px 10px;}
            #postexcerpt #excerpteditorcontainer { border-style: solid; padding: 0; }
</style>
<?php }
add_action( 'admin_head-post.php', 'tinymce_css');
add_action( 'admin_head-post-new.php', 'tinymce_css');

// Creating pagination
function eri_bronte_pagination() {
global $wp_query;
$big = 999999999;

$links = paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'prev_next' => true,
	'prev_text' => '&laquo;',
	'next_text' => '&raquo;',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'type' => 'list'
)
);

$pagination = str_replace('page-numbers','pagination',$links);
echo $pagination;
}

//	Adding background color to post status
add_action('admin_footer','posts_status_color');
function posts_status_color(){
?>
<style>
.status-draft{background: #FCE3F2 !important;}
.status-pending{background: #87C5D6 !important;}
.status-publish{/* no background keep wp alternating colors */}
.status-future{background: #C6EBF5 !important;}
.status-private{background:#F2D46F;}
</style>
<?php
}

//	Make the user login with username or login
function login_with_email_address($username) {
        $user = get_user_by('email',$username);
        if(!empty($user->user_login))
                $username = $user->user_login;
        return $username;
}
add_action('wp_authenticate','login_with_email_address');
function change_username_wps_text($text){
       if(in_array($GLOBALS['pagenow'], array('wp-login.php'))){
         if ($text == 'Username'){$text = 'Username / Email';}
            }
                return $text;
         }
add_filter( 'gettext', 'change_username_wps_text' );

//	Protecting against malicius URL requests
global $user_ID; if($user_ID) {
        if(!current_user_can('administrator')) {
                if (strlen($_SERVER['REQUEST_URI']) > 255 ||
                        stripos($_SERVER['REQUEST_URI'], "eval(") ||
                        stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
                        stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
                        stripos($_SERVER['REQUEST_URI'], "base64")) {
                                @header("HTTP/1.1 414 Request-URI Too Long");
                                @header("Status: 414 Request-URI Too Long");
                                @header("Connection: Close");
                                @exit;
                }
        }
}

//	Set default permalink
function set_permalink(){
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
}
add_action('init', 'set_permalink');


//	Adding ID to all post columns
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_filter('manage_pages_columns', 'posts_columns_id', 5);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
function posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID');
    return $defaults;
}
function posts_custom_id_columns($column_name, $id){
        if($column_name === 'wps_post_id'){
                echo $id;
    }
}

//	Adding featured img to show in the columns
if (function_exists( 'add_theme_support' )){
    add_filter('manage_posts_columns', 'posts_columns', 5);
    add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
    add_filter('manage_pages_columns', 'posts_columns', 5);
    add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);
}
function posts_columns($defaults){
    $defaults['wps_post_thumbs'] = __('Thumbs');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
        if($column_name === 'wps_post_thumbs'){
        echo the_post_thumbnail( array(125,80) );
    }
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function eri_bronte_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'eri_bronte_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function eri_bronte_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'eri_bronte_body_classes' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function eri_bronte_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'eri_bronte' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'eri_bronte_wp_title', 10, 2 );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function eri_bronte_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'eri_bronte_setup_author' );
