window.login_register_ajax_jso = {
  redirect_to: null,
  callback: null,
  loginname: null,
  login: function(o) {
    o.blur();
    o.value=' ... processing ... ';
    o.disabled=true;
    document.getElementById('login_register_div').style.cursor='wait';
    window.login_register_ajax_jso.loginname = document.getElementById('user_login_id').value.replace(/^\s*/,'').replace(/\s*$/,'');
    var pw = document.getElementById('login_password').value.replace(/^\s*/,'').replace(/\s*$/,'');
    var pw1 = document.getElementById('newpassword').value.replace(/^\s*/,'').replace(/\s*$/,'');
    var pw2 = document.getElementById('newpassword2').value.replace(/^\s*/,'').replace(/\s*$/,'');
    var md = document.getElementById('login_error');
    if ( pw1 != '' && ( pw1 != pw2 || pw1.length < window.login_register_configs_minpassword_length || pw1 == pw ) ) {
      md.innerHTML = 'New password is too short, or confirm new password do not match, or you haven\'t provided a new password.';
      return false;
    }
    md.innerHTML = '';
    o.disabled = true;
    o.value = ' processing ... ';
    jQuery.ajax({
      type: 'POST',
      data: jQuery('#loginform_ajax').serialize(),
      url: '/wp-admin/admin-ajax.php?action=login_register_dologin',
      dataType: 'json',
      success: function(result) {
        var md = document.getElementById('login_error');
        var b = document.getElementById('loginform_submitbutton');
        var d = document.getElementById('login_register_div');
        d.style.cursor = 'auto';

        if ( result.password_expired ) {
          b.disabled = false;
          b.value = 'login';
          jQuery('[name="passwordexpired"]').show();
          return;
        }

        if ( result.errormessage ) {
          md.innerHTML = result.errormessage;
          b.disabled = false;
          b.value = 'login';
          return;
        }

        if ( result.allow_access == 'ok' ) {
          jQuery(md).css('color','green');
          md.innerHTML = 'Login was successful';
          if ( window.login_register_configs_fadeonlogin ) setTimeout("jQuery('#login_register_div').fadeOut(800)",3000);
          if ( window.login_register_ajax_jso.redirect_to ) document.location.href = window.login_register_ajax_jso.redirect_to;
          if ( window.login_register_ajax_jso.callback ) eval(window.login_register_ajax_jso.callback + "('" + window.login_register_ajax_jso.loginname.replace(/'/,'') + "')");
          return;
        }

      }
    });
  }
}
