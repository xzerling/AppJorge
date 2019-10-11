<?php
if ( ! class_exists('login_register_ajax') ) {

  class login_register_ajax {
  
    public static function getloginform($args=array()) { extract($args);
      if ( ! defined('LOGIN_REGISTER_ENABLED') ) return 'Error: login_register plugin must be enabled.';
      ob_start(); ?>
      <script type="text/javascript">
        window.login_register_configs_minpassword_length = <?php echo (int)get_option('login_register_minpassword_length','7'); ?>;
        window.login_register_configs_fadeonlogin = <?php echo ( ( $fadeoutonlogin.'x' == 'yesx' ) ? 'true' : 'false' ); ?>;
        jQuery(document).ready(function() {
          var script = document.createElement('script');
          script.src = '/wp-content/plugins/login-register/login_register_ajax.js';
          script.type = 'text/javascript';
          script.defer = true;
          script.id = 'login_register_ajax_jso_script';
          var head = document.getElementsByTagName('head').item(0);
          head.appendChild(script);
        });
      </script>
      <div id="login_register_div" class="login_register_div login">
      <?php if ( $titlebar.'x' != 'x' ) echo '<h2>' . htmlspecialchars($titlebar) . '</h2>'; ?>
      <?php echo '<div id="login_error">' . $error . '</div>'; ?>
      <iframe src="javascript:void(0)" id="promptforpasswordsave" name="promptforpasswordsave" style="display:none"></iframe>
      <form name="loginform_ajax" id="loginform_ajax" onsubmit="window.login_register_ajax_jso.login(document.getElementById('loginform_submitbutton'))" target="promptforpasswordsave" method="post">
        <?php if ( get_option('login_register_emailislogin').'x' != 'yesx' ) { ?>
          <p>
            <label for="user_login"><?php _e('Username:') ?></label>
            <input type="text" id="user_login_id" name="user_login" id="user_login" maxlength="160" value="<?php echo wp_specialchars($user_login); ?>" /><br />
          </p>
        <?php } else { ?>
        <p>
          <label for="email"><?php _e('E-mail:') ?></label>
          <input type="text" id="user_login_id" name="user_email" id="user_email" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" />
        </p>
        <?php } ?>
        <p>
          <label for="password"><?php _e('Password:') ?></label>
          <input type="password" name="login_password" id="login_password" value="" />
          <div style="display:none" name="passwordexpired">
            <b>Your password has expired, please enter a new password of minimum length of <?php echo get_option("login_register_minpassword_length","7"); ?> characters.</b><br>
            <label for="newpassword">New Password:</label><input type="password" maxlength="40" id="newpassword" name="newpassword"><br>
            <label for="confpassword">Confirm Password:</label><input type="password" maxlength="40" id="newpassword2" name="newpassword2"><br>
          </div>
        </p>
        <p>
          <input name="rememberme" type="checkbox" id="rememberme" value="forever" <?php echo ( $_COOKIE['login_rememberme'].'x' == 'yesx' || $rememberme == 'forever' ) ? ' checked' : ''; ?> tabindex="3" />
          <label for="rememberme"><?php _e('Remember me'); ?></label>
        </p>
        <p>
          <input type="button" name="loginform_submitbutton" id="loginform_submitbutton" value="<?php _e('Login'); ?>" onclick="window.login_register_ajax_jso.login(this)" tabindex="4" />
          <input type="hidden" name="redirect_to" value="<?php echo wp_specialchars($_POST['redirect_to']); ?>" />
        </p>
        <input type="hidden" name="action" value="login_register_dologin" />
      </form>
      <ul>
        <li><a href="/wp-login.php?action=lostpassword" title="<?php _e('Lost Password') ?>"><?php _e('Lost your password?') ?></a></li>
        <?php if (get_settings('users_can_register')) { ?><li><a href="/wp-register.php"><?php _e('Register') ?></a></li><?php } ?>
      </ul>
      </div><?php
      $html = ob_get_contents(); ob_end_clean();
      return $html;
    }

    public static function login() {
      $returnvalue['error'] = '';
      if( $_POST ) {
        $user_login = ( get_option('login_register_emailislogin').'x' != 'yesx' ) ? $_POST['user_login'] : $_POST['user_email'];
        $user_login = sanitize_user( $user_login );
        $user_pass  = $_POST['login_password'];
        $new_pass  = $_POST['newpassword'];
        $rememberme = $_POST['rememberme'];
      } else {
        if (function_exists('wp_get_cookie_login')) # This check was added in version 1.0 to make the plugin compatible with WP2.0.1
        {
          $cookie_login = wp_get_cookie_login();
          if ( ! empty($cookie_login) ) {
            $using_cookie = true;
            $user_login = $cookie_login['login'];
            $user_pass = $cookie_login['password'];
          }
        }
        elseif ( ! empty($_COOKIE) ) # This was added in version 1.0 to make the plugin compatible with WP2.0.1
        {
          if ( ! empty($_COOKIE[USER_COOKIE]) )
            $user_login = $_COOKIE[USER_COOKIE];
          if ( ! empty($_COOKIE[PASS_COOKIE]) ) {
            $user_pass = $_COOKIE[PASS_COOKIE];
            $using_cookie = true;
          }
        }
      }

      if ($user_login == "") {
        global $wpdb;
        $user_email = $_POST['user_email'];
        if (is_email($user_email)) {
          $user = $wpdb->get_row("SELECT * FROM $wpdb->users WHERE user_email = '$user_email'");
          if ($user) $user_login = $user->user_login;
        }
      }

      if ($user_login == "") {
        $returnvalue['error'] = 'missing login name.';
        return $returnvalue;
      }

      $login_result = wp_signon( array('user_login' => $user_login, 'user_password' => $user_pass , 'remember' => ( $rememberme == 'forever' ) ), false );
      if ( is_wp_error($login_result) ) $returnvalue['error'] = $login_result->get_error_message();
      else {

        $user = new WP_User(0, $user_login);

        if ( wp_login($user_login, $user_pass, $using_cookie) ) {
          wp_setcookie($user_login, $user_pass, false, '', '', $rememberme);
          login_register_object::logger( array('message' => 'login user: '. $user_login . ' rememberme: ' . ( ( ! empty($rememberme) ) ? $rememberme : 'no' ) . ' redirect to: ' . $_POST['redirect_to']) );
          if ( $rememberme == 'forever' ) setcookie("login_rememberme", 'yes', time()+31536000); else setcookie("login_rememberme", 'no', 0); /* expire in 1 year */
        } else {
          if ( $using_cookie ) $returnvalue['error'] = __('Your session has expired.');
        }
      }

      if ( is_wp_error($login_result) ) {
        $login_register_expiredpassword_errorcode = trim(get_option('login_register_expiredpassword_errorcode'));
        if ( $login_register_expiredpassword_errorcode.'x' != 'x' && $login_result->get_error_code().'x' == $login_register_expiredpassword_errorcode.'x' && file_exists( WP_PLUGIN_DIR . '/login-register/login_register_expiredpassword.php') ) {
          require_once WP_PLUGIN_DIR . '/login-register/login_register_expiredpassword.php';
          $returnvalue['passwordisexpired'] = true;
          $o = null; if ( class_exists( 'login_register_expiredpassword' ) ) $o = new login_register_expiredpassword();
          if ( $o != null && method_exists ( $o , 'passwordreset' ) ) {
            $status = $o->passwordreset($user_login,$user_pass,$new_pass);
            if ( $o->passwordwasreset === true ) {
              $returnvalue['passwordisexpired'] = false;
              $returnvalue['error'] = '';
              $login_result = wp_signon( array('user_login' => $user_login, 'user_password' => $new_pass , 'remember' => ( $rememberme == 'forever' ) ), false );
            }
          }
        }
      }

      return $returnvalue;
    }

    public static function processajax() {
      if ( empty($_GET['login_register_ajax']) ) return false;
      switch($_GET['login_register_ajax']) {

       case 'getloginform':
         $r['html'] = login_register_ajax::getloginform();
         $r['status'] = 'ok';
         echo json_encode($r);
         break;
       case 'login':
         $r['status'] = 'ok';
         $r2 = login_register_ajax::login();
         $r['errormessage'] = $r2['error'];
         $r['password_expired'] = $r2['passwordisexpired'];
         $r['allow_access'] = ( $r['errormessage'].'x' == 'x' ) ? 'ok' : 'no';
         echo json_encode($r);
         break;
      }
  
      return true;
  
    }
  }

}

# bootstrap for AJAX ...
if ( ! empty($_GET['login_register_ajax']) ) {
  if (!function_exists('add_action')) {
    chdir($_SERVER['DOCUMENT_ROOT']); require('./wp-load.php');
  }
  login_register_ajax::processajax();
  exit;
}
