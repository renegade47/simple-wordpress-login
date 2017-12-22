<?php
/*
  Plugin Name: Simple Custom Login Form
  Description: Custom Login Form
  Version: 1.0
  Author: Leo Ruther Valles
*/

// Enqueue Scripts and Stylesheets

add_action('wp_enqueue_scripts', 'plugin_scripts');

function plugin_scripts(){
	// Replace jQuery
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//code.jquery.com/jquery-3.2.1.min.js', NULL, NULL, true);
	wp_enqueue_script('jquery');
	// Stylesheets
    wp_dequeue_style('twentysixteen-style');
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Raleway:700');
	wp_register_style('blue', plugin_dir_url( __FILE__ ) . 'css/theme-blue.css', '', 1);
	wp_register_style('coffee', plugin_dir_url( __FILE__ ) . 'css/theme-coffee.css', '', 1);
	wp_register_style('ectoplasm', plugin_dir_url( __FILE__ ) . 'css/theme-ectoplasm.css', '', 1);
	wp_register_style('light', plugin_dir_url( __FILE__ ) . 'css/theme-light.css', '', 1);
	wp_register_style('default', plugin_dir_url( __FILE__ ) . 'css/main.css', '', 1);
	wp_register_style('midnight', plugin_dir_url( __FILE__ ) . 'css/theme-midnight.css', '', 1);
	wp_register_style('ocean', plugin_dir_url( __FILE__ ) . 'css/theme-ocean.css', '', 1);
	wp_register_style('sunrise', plugin_dir_url( __FILE__ ) . 'css/theme-sunrise.css', '', 1);
	// Scripts
	wp_enqueue_script('modernizr', plugin_dir_url( __FILE__ ) . 'js/vendor/modernizr-3.5.0.min.js', '', 1, true);
	wp_enqueue_script('plugins', plugin_dir_url( __FILE__ ) . 'js/plugins.js', '', 1, true);
	wp_enqueue_script('main', plugin_dir_url( __FILE__ ) . 'js/main.js', '', 1, true);
}

// Login Form Markup
function login_form() {
	?>
	<form id="custom-login-form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<ul class="clearfix">
			<?php
                // Security
                if ( function_exists( 'wp_nonce_field' ) ){
                    wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
                }
            ?>
			<li>
                <div class="custom-input-box">
                    <label for="log-username">Name</label>
                    <input name="log_username" type="text" id="log-username">
                </div>
            </li>
            <li>
                <div class="custom-input-box">
                    <label for="log-password">Password</label>
                    <input name="login_password" type="password" id="log-password">
                </div>
            </li>
            <li>
	            <button type="submit" name="login_form_submit" value="Log in">Log Me In</button>
	        </li>
		</ul>
		<a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Lost Password</a>
	</form>
<?php
}

function blue_login_form() { ?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" class="wordpress-simple-login blue-theme">
        <h1>Login</h1>
		<?php
            // Security
            if ( function_exists( 'wp_nonce_field' ) ){
                wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
            }
        ?>
        <span class="input input--blue">
            <input class="input__field input__field--blue" type="text" name="log_username" id="username" />
            <label class="input__label input__label--blue" for="password">
                <span class="input__label-content input__label-content--blue">Username</span>
            </label>
        </span>
        <span class="input input--blue">
            <input class="input__field input__field--blue" type="password" name="login_password" id="password" />
            <label class="input__label input__label--blue" for="password">
                <span class="input__label-content input__label-content--blue">Password</span>
            </label>
        </span>
        <p class="form-button">
            <button type="submit" name="login_form_submit" class="btn btn-2 btn-2d">Submit</button>
        </p>
        <a class="lpw" href="<?php echo wp_lostpassword_url(); ?>">Lost Password?</a>
    </form>
<?php

}

function coffee_login_form() { ?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" class="wordpress-simple-login coffee-theme">
		<h1>Login</h1>
		<?php
            // Security
            if ( function_exists( 'wp_nonce_field' ) ){
                wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
            }
        ?>
            <span class="input input--coffee">
                <input class="input__field input__field--coffee" type="text" name="log_username" id="username" />
                <label class="input__label input__label--coffee" for="password">
                    <span class="input__label-content input__label-content--coffee">Username</span>
                </label>
            </span>
            <span class="input input--coffee">
                <input class="input__field input__field--coffee" type="password" name="login_password" id="password" />
                <label class="input__label input__label--coffee" for="password">
                    <span class="input__label-content input__label-content--coffee">Password</span>
                </label>
            </span>
            <p class="form-button">
                <button type="submit" name="login_form_submit" class="btn btn-2 btn-2d">Submit</button>
            </p>
            <a class="lpw" href="<?php echo wp_lostpassword_url(); ?>">Lost Password?</a>
    </form>
<?php

} 

function ectoplasm_login_form() { ?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" class="wordpress-simple-login ectoplasm-theme">
        <h1>Login</h1>
        <?php
            // Security
            if ( function_exists( 'wp_nonce_field' ) ){
                wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
            }
        ?>
            <span class="input input--ectoplasm">
                <input class="input__field input__field--ectoplasm" type="text" name="log_username" id="username" />
                <label class="input__label input__label--ectoplasm" for="password">
                    <span class="input__label-content input__label-content--ectoplasm">Username</span>
                </label>
            </span>
            <span class="input input--ectoplasm">
                <input class="input__field input__field--ectoplasm" type="password" name="login_password" id="password" />
                <label class="input__label input__label--ectoplasm" for="password">
                    <span class="input__label-content input__label-content--ectoplasm">Password</span>
                </label>
            </span>
            <p class="form-button">
                <button type="submit" name="login_form_submit" class="btn btn-2 btn-2d">Submit</button>
            </p>
            <a class="lpw" href="<?php echo wp_lostpassword_url(); ?>">Lost Password?</a>
    </form>
<?php

} 

function default_login_form() { ?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" class="wordpress-simple-login">
        <h1>Login</h1>
        <?php
            // Security
            if ( function_exists( 'wp_nonce_field' ) ){
                wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
            }
        ?>
            <span class="input input--default">
                <input class="input__field input__field--default" type="text" name="log_username" id="username" />
                <label class="input__label input__label--default" for="password">
                    <span class="input__label-content input__label-content--default">Username</span>
                </label>
            </span>
            <span class="input input--default">
                <input class="input__field input__field--default" type="password" name="login_password" id="password" />
                <label class="input__label input__label--default" for="password">
                    <span class="input__label-content input__label-content--default">Password</span>
                </label>
            </span>
            <p class="form-button">
                <button type="submit" name="login_form_submit" class="btn btn-2 btn-2d">Submit</button>
            </p>
            <a class="lpw" href="<?php echo wp_lostpassword_url(); ?>">Lost Password?</a>
    </form>

<?php

} 

function light_login_form() { ?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" class="wordpress-simple-login light-theme">
		<?php
            // Security
            if ( function_exists( 'wp_nonce_field' ) ){
                wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
            }
        ?>
        <h1>Login</h1>
            <span class="input input--light">
                <input class="input__field input__field--light" type="text" name="log_username" id="username" />
                <label class="input__label input__label--light" for="password">
                    <span class="input__label-content input__label-content--light">Username</span>
                </label>
            </span>
            <span class="input input--light">
                <input class="input__field input__field--light" type="password" name="login_password" id="password" />
                <label class="input__label input__label--light" for="password">
                    <span class="input__label-content input__label-content--light">Password</span>
                </label>
            </span>
            <p class="form-button">
                <button type="submit" name="login_form_submit" class="btn btn-2 btn-2d">Submit</button>
            </p>
            <a class="lpw" href="<?php echo wp_lostpassword_url(); ?>">Lost Password?</a>
    </form>

<?php

} 


function midnight_login_form() { ?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" class="wordpress-simple-login midnight-theme">
		<?php
            // Security
            if ( function_exists( 'wp_nonce_field' ) ){
                wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
            }
        ?>
        <h1>Login</h1>
            <span class="input input--midnight">
                <input class="input__field input__field--midnight" type="text" name="log_username" id="username" />
                <label class="input__label input__label--midnight" for="password">
                    <span class="input__label-content input__label-content--midnight">Username</span>
                </label>
            </span>
            <span class="input input--midnight">
                <input class="input__field input__field--midnight" type="password" name="login_password" id="password" />
                <label class="input__label input__label--midnight" for="password">
                    <span class="input__label-content input__label-content--midnight">Password</span>
                </label>
            </span>
            <p class="form-button">
                <button type="submit" name="login_form_submit" class="btn btn-2 btn-2d">Submit</button>
            </p>
            <a class="lpw" href="<?php echo wp_lostpassword_url(); ?>">Lost Password?</a>
    </form>

<?php

}

function sunrise_login_form() { ?>
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" class="wordpress-simple-login sunrise-theme">
        <?php
            // Security
            if ( function_exists( 'wp_nonce_field' ) ){
                wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
            }
        ?>
        <h1>Login</h1>
            <span class="input input--sunrise">
                <input class="input__field input__field--sunrise" type="text" name="log_username" id="username" />
                <label class="input__label input__label--sunrise" for="password">
                    <span class="input__label-content input__label-content--sunrise">Username</span>
                </label>
            </span>
            <span class="input input--sunrise">
                <input class="input__field input__field--sunrise" type="password" name="login_password" id="password" />
                <label class="input__label input__label--sunrise" for="password">
                    <span class="input__label-content input__label-content--sunrise">Password</span>
                </label>
            </span>
            <p class="form-button">
                <button type="submit" name="login_form_submit" class="btn btn-2 btn-2d">Submit</button>
            </p>
            <a class="lpw" href="<?php echo wp_lostpassword_url(); ?>">Lost Password?</a>
    </form>

<?php

}

function ocean_login_form() { ?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" class="wordpress-simple-login ocean-theme">
		<?php
            // Security
            if ( function_exists( 'wp_nonce_field' ) ){
                wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
            }
        ?>
        <h1>Login</h1>
            <span class="input input--ocean">
                <input class="input__field input__field--ocean" type="text" name="log_username" id="username" />
                <label class="input__label input__label--ocean" for="password">
                    <span class="input__label-content input__label-content--ocean">Username</span>
                </label>
            </span>
            <span class="input input--ocean">
                <input class="input__field input__field--ocean" type="password" name="login_password" id="password" />
                <label class="input__label input__label--ocean" for="password">
                    <span class="input__label-content input__label-content--ocean">Password</span>
                </label>
            </span>
            <p class="form-button">
                <button type="submit" name="login_form_submit" class="btn btn-2 btn-2d">Submit</button>
            </p>
            <a class="lpw" href="<?php echo wp_lostpassword_url(); ?>">Lost Password?</a>
    </form>

<?php

}

// Authenticate User Display errors or send to Secure Landing Page
function login_authenticate($username, $password){
	global $user;
	$creds = array();
	$creds['user_login'] = $username;
	$creds['user_password'] =  $password;
	$creds['remember'] = true;
	$user = wp_signon($creds, false);
	if ( is_wp_error($user) ) {
		echo $user->get_error_message();
	}
	if ( !is_wp_error($user) ) {
		wp_redirect(home_url());
		exit;
	}
}

// Login Validation and Input Sanitization
function process_login(){
	if(isset($_POST['custom_login_nonce'])){
		$nonce = $_POST['custom_login_nonce'];
		if (isset($_POST['login_form_submit'])){
			if ( ! wp_verify_nonce( $nonce, 'custom_login_action' ) ) {
				die ('Invalid Nonce');
			} else {
				$username = sanitize_text_field($_POST['log_username']);
				$password = $_POST['login_password'];
				login_authenticate($username, $password);
			}
		}
	}
}

// Output Login Form Shortcode
function login_shortcode($atts){
	extract( shortcode_atts( array(
        'theme' => 'default',
    ), $atts, 'custom_login' ) );
	process_login();

    if($theme == 'default'){
    	wp_enqueue_style('default');
    	default_login_form();
    } elseif($theme == 'blue') {
    	wp_enqueue_style('blue');
    	default_login_form();
    } elseif($theme == 'coffee'){
    	wp_enqueue_style('coffee');
    	coffee_login_form();
    } elseif($theme == 'ectoplasm'){
    	wp_enqueue_style('ectoplasm');
    	ectoplasm_login_form();
    } elseif($theme == 'light'){
    	wp_enqueue_style('light');
    	light_login_form();
    } elseif($theme == 'midnight'){
    	wp_enqueue_style('midnight');
    	midnight_login_form();
    } elseif($theme == 'ocean'){
    	wp_enqueue_style('ocean');
    	ocean_login_form();
    } elseif($theme == 'sunrise'){
    	wp_enqueue_style('sunrise');
    	sunrise_login_form();
    } else {
    	wp_enqueue_style('default');
    	default_login_form();
    }

}

// Add Shortcode for the Login Form
add_shortcode('custom_login', 'login_shortcode');