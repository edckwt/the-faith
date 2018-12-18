<form method="post" action="<?php admin_url( 'options-general.php?page='.OPICTF_Page_SLUG ); ?>">
<?php
	echo wp_nonce_field( "edc-settings-page" ); 
	
	$TFHtmlHelper = new html_tf_helper();
	$TFHtmlHelper->opic_admin_tabs();
	$TFHtmlHelper->MainContent($mainViewFile);
?>
   <p class="submit" style="clear: both;">
      <input type="submit" name="Submit"  class="button-primary" value="<?php echo $TFHtmlHelper->getLang('btn-updatesetting') ?>" />
      <input type="hidden" name="ilc-settings-submit" value="Y" />
   </p>
</form>