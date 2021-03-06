<?php
/*
* Plugin Name: Aweber Shortcode
* Plugin URI: https://github.com/OrangeRoomSoftware/wp-aweber-shortcode
* Version: 1.0
* Author: Phill Kenoyer
* Description: Aweber shortcode to put a simple signup form in the sidebar
* License: Public Domain
*/

add_filter('widget_text', 'do_shortcode');
add_shortcode('aweber', 'aweber_shortcode_handler');
function aweber_shortcode_handler($atts) {
  extract(shortcode_atts(array(
    'form_id' => '',
    'split_id' => '',
    'redirect' => '',
    'adtracking' => 'sign-up-form',
    'listname' => 'sign-ups',
    'message' => 1,
    'required' => 'name,email',
    'tooltip' => '',
    'title' => 'SIGNUP FREE',
    'blurb' => 'Get My Free Newsletter'
  ), $atts));

$content = <<<END
<form id="aweber-signup-form" method="post" action="http://www.aweber.com/scripts/addlead.pl">
  <div style="display: none;">
    <input type="hidden" name="meta_web_form_id" value="$form_id" />
    <input type="hidden" name="meta_split_id" value="$split_id" />
    <input type="hidden" name="listname" value="$listname" />
    <input type="hidden" name="redirect" value="$redirect" />
    <input type="hidden" name="meta_adtracking" value="$adtracking" />
    <input type="hidden" name="meta_message" value="$message" />
    <input type="hidden" name="meta_required" value="$required" />
    <input type="hidden" name="meta_tooltip" value="$tooltip" />
  </div>

  <img src="/wp-content/plugins/wp-aweber-shortcode/red-arrow.jpeg" style="float:right;" width='40'/>
  <h1>$title</h1>
  <div><b>$blurb</b></div>

  <input type="text" name="name" placeholder="Enter Your Name" id="aweber-signup-form-name"/>
  <input type="email" name="email" placeholder="Enter Your Email Address" id='aweber-signup-form-email'/>
  <button type="submit"><img src="/wp-content/plugins/wp-aweber-shortcode/email-icon.gif"/> Sign Up</button>

  <p style="text-align:center"><a class="privacy" title="Privacy Policy" href="http://www.aweber.com/permission.htm" target="_blank">We respect your email privacy</a></p>
</form>
END;

  return $content;
}

# Javascript
function aweber_javascript() {
  wp_enqueue_script('aweber-js', '/wp-content/plugins/'.basename(dirname(__FILE__)).'/script.js', false, null, true);
}
add_action('wp_print_scripts', 'aweber_javascript', 10);

# Stylesheet
function aweber_stylesheets() {
  wp_enqueue_style('aweber-style', '/wp-content/plugins/'.basename(dirname(__FILE__)).'/style.css', 'aweber-shortcode-style', null, 'all');
}
add_action('wp_print_styles', 'aweber_stylesheets', 10);

