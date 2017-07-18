<div class="wrap" id="RiSettings">
	<div class="icon32" id="icon-options-general"><br></div>
	<h2>Right Intel Settings</h2>
	
	<?php if ($hasConnectedBefore) { ?>
		<div class="ri-settings-area">
	
			<div class="ri-preview-wrapper">
				<h3>Visual Preview</h3>
				<iframe id="FramePostPreview" src="<?php echo esc_html($previewUrl)?>" seamless></iframe>
			</div>

			<form method="post" action="" class="ri-form" id="FormStylingOptions">
				<fieldset>
					<legend>Bubble Styling</legend>
					<p id="WrapperBubbleType">
						<label>Bubble Type</label>
						<select name="bubble_type" id="InputBubbleType">
							<option value="image"<?php echo ($bubble_type=='css3' ? '' : ' selected')?>>Image with shadows (608px wide)</option>
							<option value="css3"<?php echo ($bubble_type=='css3' ? ' selected' : '')?>>CSS3 shape (variable width; Recommended)</option>
						</select>
					</p>
					<p id="WrapperColorBubbleCss3">
						<label>Bubble Color</label>
						<input type="text" name="color_bubble" id="InputColorBubble" value="<?php echo esc_html($color_bubble)?>">
					</p>
					<p id="WrapperColorText">
						<label>Bubble Text Color</label>
						<input type="text" name="color_text" id="InputColorText" value="<?php echo esc_html($color_text)?>">
					</p>
					<p id="WrapperUseOswald">
						<label>Bubble Text Font</label>
						<select name="use_oswald" id="InputUseOswald">
							<option value="1"<?php echo ($use_oswald!=='0' ? '' : ' selected')?>>Right Intel Font</option>
							<option value="0"<?php echo ($use_oswald==='0' ? ' selected' : '')?>>Paragraph default</option>
						</select>						
					</p>
				</fieldset>
				<fieldset>
					<legend>Image Display</legend>
					<?php if ($themeSupportsThumbnailAbovePost) { ?>
					<p id="WrapperImageDisplayType">
						<label>Show Post Image (if supported by your theme)</label>
						<select name="image_display_type" id="InputImageDisplayType">
							<option value="post_only"<?php echo ($image_display=='post_only' ? '' : ' selected')?>>Only below headline (Recommended)</option>
							<option value="thumbnail_only"<?php echo ($image_display=='thumbnail_only' ? ' selected' : '')?>>Only above headline</option>
							<option value="both"<?php echo ($image_display=='both' ? ' selected' : '')?>>Above headline and below headline</option>
						</select>
					</p>
					<?php } ?>
					<p id="WrapperImageFloat">
						<label>Image Position</label>
						<select name="image_float" id="InputImageFloat">
							<option value="left"<?php echo ($image_float=='left' ? '' : ' selected')?>>Float image to the left</option>
							<option value="right"<?php echo ($image_float=='right' ? ' selected' : '')?>>Float image to the right</option>
							<option value="none"<?php echo ($image_float=='none' ? ' selected' : '')?>>Keep image on its own row</option>
						</select>
					</p>
				</fieldset>
				<p class="ri-form-buttons">
					<input type="submit" value="Save" class="button-primary" name="save" />
				</p>
			</form>
	
		</div>
	<?php } ?>
	
	<div class="ri-connection-area">
		<?php if (count($msgs)) { ?>
			<div class="updated settings-error" id="setting-error-settings_updated"> 
				<p><strong>Success! <?php echo join(' ', $msgs)?></strong></p>
			</div>
		<?php } ?>
		<?php if (isset($_GET['error'])) { ?>
			<div class="updated settings-error" id="setting-error-settings_updated"> 
				<p><strong><?php echo esc_html($_GET['error'])?></strong></p>
			</div>
		<?php } ?>

		<?php if (!$validInstall) { ?>

			<?php Ri_Flash::output()?>
			<p>To connect a Right Intel instance, please check the WordPress installation then refresh this page.</p>

		<?php } else { ?>

			<h2>Connected Right Intel Instances</h2>

			<p>By connecting Right Intel to WordPress, Intel Leaders can push Right Intel posts to this blog.</p>

			<?php if (count($creds)) { ?>

				<table class="wp-list-table widefat wp-list-instances">
					<thead>
						<th>Instance Name</th>
						<th>Connected By</th>
						<th>Connected On</th>
						<th>Actions</th>
					</thead>
					<tbody>
						<?php foreach ($creds as $cred) { ?>
							<tr>
								<td><?php echo esc_html($cred->instance_name)?></td>
								<td><?php echo esc_html($cred->User->display_name)?></td>
								<td><?php echo date_i18n(get_option('date_format'), strtotime($cred->created))?></td>
								<td><a href="options.php?page=right_intel_disconnect_account&amp;account_id=<?php echo esc_html($cred->api_login)?>" class="ri-confirm" data-confirm-msg="Are you sure you want to disconnect the instance &quot;<?php echo esc_html($cred->instance_name)?>&quot;?">Disconnect</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

			<?php } else { ?>

				<p>(none connected yet)</p>

			<?php } ?>

			<form action="<?php echo esc_html($actionUrl)?>" method="post">
				<?php foreach ($connectionFields as $name => $value) { ?>
					<input type="hidden" name="<?php echo esc_html($name)?>" value="<?php echo esc_html($value)?>" />
				<?php } ?>
				<input type="submit" value="Connect Instance &rsaquo;" class="button-primary" name="go" />
			</form>
		<?php } ?>
	</div>
</div>
