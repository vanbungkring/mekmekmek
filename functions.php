<?php
/*
 * Enable support for Post Formats.
 * See http://codex.wordpress.org/Post_Formats
 */
add_theme_support( 'post-formats', array('video') );

/*
 * Enable support for Post-Thumbnails.
 * See http://codex.wordpress.org/Post_Formats
 */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 110, 110 );
// additional image sizes
// delete the next line if you do not need additional image sizes
add_image_size( 'post-thumb', 320, 210 );

/*
 * Register for navigation menu
 * See http://codex.wordpress.org/Navigation_Menus
 */
function register_my_menu() {
    register_nav_menu( 'header', 'Header Menu' );
}
add_action( 'init', 'register_my_menu' );

/**
 * Proper way to enqueue styles
 * See http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 */
function theme_name_scripts() {
    // wp_enqueue_style( '3m-bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css', array() , '3.1.1');
    wp_enqueue_style( '3m-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( '3m-font', get_template_directory_uri() . '/css/font.css');
    wp_enqueue_style( '3m-font-awesome-style', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css',array(),'4.0.3' );
    wp_enqueue_style( '3m-style', get_stylesheet_uri(),array(),'0.0.2' );
    // wp_enqueue_script( '3m-bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', array(), '1.4.2' );
    wp_enqueue_script( '3m-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0' );
    wp_enqueue_script( '3m-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


/**
 * Count Post View
 * See http://wpsnipp.com/index.php/functions-php/track-post-views-without-a-plugin-using-post-meta/
 */
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

function st_ajaxurl(){
    ?>
        <script>
        var ajaxurl = '<?php echo admin_url('admin-ajax.php') ?>';
        </script>
    <?php
}

add_action('wp_head','st_ajaxurl');

if ( is_user_logged_in() ) {
    function st_logout(){
        ?>
            <script>
            jQuery(document).ready(function($) {
                var anchor = '<a href="<?php echo wp_logout_url(home_url()); ?>" title="Logout">Logout</a>';
                $('li.login.menu-item').html(anchor);
            });
            </script>
        <?php
    }

    add_action('wp_head','st_logout');
}
else
{
    function st_download(){
        ?>
            <script>
            jQuery(document).ready(function($) {
                $('.download-article .download-content a').click(function(){
                    window.location = '<?php echo home_url()."/benefit"  ?>';
                    return false;
                });
            });
            </script>
        <?php
    }

    add_action('wp_head','st_download');
}

function st_handle_registration(){
    if( $_POST['action'] == 'register_action' ) {
        $error = '';

        $fullname   = trim( $_POST['fullname'] );
        $uname      = trim( $_POST['username'] );
        $email      = trim( $_POST['mail_id'] );
        $company    = trim( $_POST['company'] );
        $department = trim( $_POST['department'] );
        $province  = trim( $_POST['province '] );
        $pswrd      = $_POST['passwrd'];
        $repsw      = $_POST['repsw'];
 
        if( empty( $_POST['fullname'] ) )
         $error .= '<p class="form-message form-error">Enter Full Name</p>';

        if( empty( $_POST['username'] ) )
         $error .= '<p class="form-message form-error">Enter Username</p>';

        if( empty( $_POST['company'] ) )
         $error .= '<p class="form-message form-error">Enter Company Name</p>';

        if( empty( $_POST['department'] ) )
         $error .= '<p class="form-message form-error">Enter Select Departement</p>';

        if( empty( $_POST['province'] ) )
         $error .= '<p class="form-message form-error">Enter Province</p>';
 
        if( empty( $_POST['mail_id'] ) )
         $error .= '<p class="form-message form-error">Enter Email Id</p>';
         elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) )
         $error .= '<p class="form-message form-error">Enter Valid Email</p>';
         
        if( empty( $_POST['passwrd'] ) )
         $error .= '<p class="form-message form-error">Password should not be blank</p>';

        if( $_POST['passwrd'] != $_POST['repsw'] )
         $error .= '<p class="form-message form-error">Check your re password</p>';
 
        if( empty( $error ) ){
            $status = wp_create_user( $uname, $pswrd ,$email );
 
            if( is_wp_error($status) ){
                $msg = '';
                foreach( $status->errors as $key=>$val ){
                    foreach( $val as $k=>$v ){
                        $msg = '<p class="form-message form-error">'.$v.'</p>';
                    }
                }
                echo $msg;
            }else{
                $msg = '<p class="form-message form-succes">Registration Successful Login <a href="'.get_bloginfo('url').'/login'.'">here</a></p>';
                echo $msg;
            }
        } else {
            echo $error;
        }
        die(1);
    }
}
add_action( 'wp_ajax_register_action', 'st_handle_registration' );
add_action( 'wp_ajax_nopriv_register_action', 'st_handle_registration' );

function user_metadata( $user_id ){
    if( !empty( $_POST['company'] ) && !empty( $_POST['department'] ) && !empty( $_POST['province'] ) )
    {
        update_user_meta( $user_id, 'province', trim($_POST['province']) );
        update_user_meta( $user_id, 'company', trim($_POST['company']) );
        update_user_meta( $user_id, 'department', trim($_POST['department']) );
    } 
    update_user_meta( $user_id, 'show_admin_bar_front', false );
}

add_action( 'user_register', 'user_metadata' );
add_action( 'profile_update', 'user_metadata' );

//add columns to User panel list page
function add_user_columns($column) {
    $column['province']      = 'Province';
    $column['company']      = 'Company';
    $column['department']   = 'Department';

    return $column;
}
add_filter( 'manage_users_columns', 'add_user_columns' );

//add the data
function add_user_column_data( $val, $column_name, $user_id ) {
    $user = get_userdata($user_id);

    switch ($column_name) {
        case 'company' :
            return $user->company;
            break;
        case 'province' :
            return $user->province;
            break;
        case 'department' :
            return $user->department;
            break;
        default:
    }
    return;
}
add_filter( 'manage_users_custom_column', 'add_user_column_data', 10, 3 );

function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <h5 class="comment_author"><?php echo $comment->comment_author; ?></h5>
        <span class="comment_date"><?php echo date('d/m/Y',strtotime($comment->comment_date)) ?></span>
        <p><?php echo $comment->comment_content ?></p>
    </li>
<?php
}

if ( ! function_exists('word_limiter'))
{
    function word_limiter($str, $limit = 100, $end_char = '&#8230;')
    {
        if (trim($str) == '')
        {
            return $str;
        }

        preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

        if (strlen($str) == strlen($matches[0]))
        {
            $end_char = '';
        }

        return rtrim($matches[0]).$end_char;
    }
}