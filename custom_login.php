<?php
/*
  Plugin Name: Simple Custom Login Form
  Description: Custom Login Form
  Version: 1.0
  Author: Leo Ruther Valles
*/

// Login Form Markup
function login_form() {
	?>
	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<ul class="clearfix">
			<?php
                // Security
                if ( function_exists( 'wp_nonce_field' ) ){
                    wp_nonce_field( 'custom_login_action', 'custom_login_nonce' );
                }
            ?>
			<li>
                <div class="input-box">
                    <label for="log-username">Name</label>
                    <input name="log_username" type="text" id="log-username">
                </div>
            </li>
            <li>
                <div class="input-box">
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
		wp_redirect(home_url('my-feedbag'));
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
	login_form();
}

// Output Login Form Shortcode
// Turn on Output Buffering
// Return current buffer contents and delete output buffer
function login_shortcode(){
	ob_start();
	process_login();
	return ob_get_clean();
}

// Add Shortcode for the Login Form
add_shortcode('custom_login', 'login_shortcode');