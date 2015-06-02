<?php if ( isset( $_POST['twp_adm_hidden'] ) && $_POST['twp_adm_hidden'] == 'Y' ) {

	//we have a post request so save the post data
	$tpwKey = $_POST['$tpwKey'];
    update_option( 'tpw_key', $tpwKey );
    $tpwVariant = $_POST['$tpwVariant'];
    update_option ('tpw_variant', $tpwVariant);

    //clear cache

    $cacheManager = new tpwCache();
    $cacheManager->clearCache();


    ?>

	<div class="updated">
		<p>
			<strong>
				<?php _e( 'Settings were successfully updated.', 'tpwratingwidget' ); ?>
			</strong>
		</p>
	</div>

<?php } else {

	//no post read data to prefill form from config
	$tpwKey = get_option('tpw_key');
    $tpwVariant = get_option('tpw_variant',"light");

} ?>



<div class="wrap">
	<h2><?php _e( 'ThePerfectWedding.nl Widget Options', 'tpwratingwidget' ); ?></h2>

	<form name="tpw_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
		<p>Uitleg verkrijgen API key hier met deze styling -  Sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<h3 class="title"><?php _e( 'Options', 'tpwratingwidget'); ?></h3>
		<table class="form-table">
			<tbody>
				<tr>
					<th>
						<label for="tpwkey"><?php _e( 'Your Access Key', 'tpwratingwidget' ); ?>:</label>
					</th>
					<td>
						<input type="text" id="tpwkey" class="regular-text code" name="$tpwKey" value="<?php echo $tpwKey; ?>" size="60" />
						<p class="description">
							<?php _e( 'An example of a correct key', 'tpwratingwidget' ); ?>:
							<code>098f6bcd4621d373cade4e832627b4f6</code>.
						</p>
					</td>
				</tr>
				<tr>
					<th>
						<label for="tpwstyle"><?php _e( 'Your Widget Style', 'tpwratingwidget' ); ?>:</label>
					</th>
					<td>
					    <fieldset>
					        <legend class="screen-reader-text"><span><?php _e( 'Your Widget Style', 'tpwratingwidget' ); ?></span></legend>
					        <label title="<?php _e( 'Light', 'tpwratingwidget' ); ?>">
					        	<input type="radio" name="$tpwVariant" value="light" <?php if ($tpwVariant=='light') echo "checked='checked'"; ?> >
                                <?php _e( 'Light', 'tpwratingwidget' ); ?>
					        </label><br>
					        <label title="<?php _e( 'Dark', 'tpwratingwidget' ); ?>">
					        	<input type="radio" name="$tpwVariant" value="dark" <?php if ($tpwVariant=='dark') echo "checked='checked'"; ?>> <?php _e( 'Dark', 'tpwratingwidget' ); ?>
					        </label>
					    </fieldset>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="hidden" name="twp_adm_hidden" value="Y">
			<input type="submit" class="button button-primary" name="Submit" value="<?php _e( 'Save Options', 'tpwratingwidget' ); ?>"/>
		</p>
	</form>
</div>