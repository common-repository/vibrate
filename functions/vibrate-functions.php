<?php

/**
 * Class wc_vibrate will content the functions
 * which will be used to change the common functionalities of the site.
 */
class wc_vibrate {
	public function call_vibrate() {
    if(is_front_page()) {
      wp_enqueue_script( 'custom-script', PLUGIN_DIR_VIBRATE . '/js/vibrate.js' , array( 'jquery' ) ); 
      wp_enqueue_script('custom-script-vibrate-custom', PLUGIN_DIR_VIBRATE . 'js/jquery.vibrate.js' , array( 'jquery' ));
      wp_register_style( 'vibrate-style', PLUGIN_DIR_VIBRATE . 'css/vibrate.css'  );
      wp_enqueue_style( 'vibrate-style' );
    }
  }
  
  public function __construct() {
      if ( is_admin() ){
          add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
          add_action( 'admin_init', array( $this, 'page_init' ) );
      }
  }
  
  public function add_plugin_page(){
      // This page will be under "Settings"
      add_options_page( 'Settings Admin', 'Vibrate', 'manage_options', 'vibrate-setting-admin', array( $this, 'create_admin_page' ) );
  }
  
  public function create_admin_page() {
      ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Vibrate Popup Settings</h2>			
        <form method="post" action="options.php">
          <?php         
            settings_fields( 'vibrate_option_group' );	
            do_settings_sections( 'vibrate-setting-admin' );
          ?>
          <?php submit_button(); ?>
        </form>
    </div>
  <?php
  }
  
  public function page_init() {		
      register_setting( 'vibrate_option_group', 'vibrate', array( $this, 'vibrate_call' ) );        
          add_settings_section(
          'setting_section_id',
          'Setting',
          array( $this, 'print_section_info' ),
          'vibrate-setting-admin'
      );  
      add_settings_field(
          'vibrate', 
          'vibrate Text', 
          array( $this, 'create_an_vibrate_field' ), 
          'vibrate-setting-admin',
          'setting_section_id'			
      );		
  }

  public function vibrate_call( $input ) {
    if ( get_option( 'vibrate_text' ) === FALSE ) {
      add_option( 'vibrate_text', $input );
    } else {
      update_option( 'vibrate_text', $input );
    }
    return $input;
  }

  public function print_section_info(){
      print 'Enter your vibrate popup setting text below:';
  }

  public function create_an_vibrate_field(){
      ?>
    <textarea name="vibrate" id="vibrate" style="width: 704px; height: 126px;"><?php echo get_option('vibrate_text'); ?></textarea> 
  <?php 	
  }
  public function call_html_function(){
    if(is_front_page()) {
?>
      <div class='vibratebase' style='display:none;'> </div>
      <div class='vibrate'style='display:none;'>
        <div class='vibrate-button'>
          <input id='vibrate-close' type='submit' value='Close'>
        </div>		
        <span>
            <?php if(get_option('vibrate_text'))
            {
              echo get_option('vibrate_text');
            } 
            else 
            {
              echo "Change text from vibrate option in Settings"; 
            }
          ?>
        </span>      
      </div>
  <?php
    }
  }    
}
