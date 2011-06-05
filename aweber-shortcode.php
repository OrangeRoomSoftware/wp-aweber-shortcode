<?php
/*
* Plugin Name: Aweber Shortcode
* Plugin URI: https://github.com/OrangeRoomSoftware/wp-aweber-shortcode
* Version: 1.0
* Author: Phill Kenoyer
* Description: Aweber shortcode to put a simple signup form in the sidebar
*/

add_shortcode('aweber', 'aweber_shortcode_handler');

function aweber_shortcode_handler($atts) {
  extract(shortcode_atts(array(
    'form_id' => '1330014209',
    'split_id' => '',
    'redirect' => '',
    'adtracking' => 'sign-up-form',
    'listname' => 'sign-ups',
    'message' => 1,
    'required' => 'name,email',
    'tooltip' => ''
  ), $atts));

$content = <<<END
<form id="aweber-signup-form" method="post" action="http://www.aweber.com/scripts/addlead.pl">
  <div style="display: none;">
    <input type="hidden" name="meta_web_form_id" value="<?php echo $form_id; ?>" />
    <input type="hidden" name="meta_split_id" value="<?php echo $split_id; ?>" />
    <input type="hidden" name="listname" value="<?php echo $listname; ?>" />
    <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
    <input type="hidden" name="meta_adtracking" value="<?php echo $adtracking; ?>" />
    <input type="hidden" name="meta_message" value="<?php echo $message; ?>" />
    <input type="hidden" name="meta_required" value="<?php echo $required; ?>" />
    <input type="hidden" name="meta_tooltip" value="<?php echo $tooltip; ?>" />
  </div>

  <img src="/wp-content/plugins/aweber-shortcode/red-arrow.jpeg" style="float:right;" width='40'/>
  <h1>SIGN UP FOR FREE</h1>
  <div><b>Get My Free Forex Video Newsletter.</b></div>

  <input type="text" name="name" placeholder="Enter Your Name"/>
  <input type="email" name="email" placeholder="Enter Your Email Address" class='email'/>
  <button type="submit"><img src="/wp-content/plugins/aweber-shortcode/email-icon.gif"/> Sign Up</button>

  <p style="text-align:center"><a class="privacy" title="Privacy Policy" href="http://www.aweber.com/permission.htm" target="_blank">We respect your email privacy</a></p>
</form>
END;

  return $content;
}

