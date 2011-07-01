<div id="body">

  	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart(current_url()); ?>
		<table class="create-post">
			<tr>
				<td>
					<h3>Изображение:</h3>
					 <input type="file" name="userfile"/>
				</td>
			</tr>
		</table>
		<h3>Описание (необходимо для поисковиков):</h3>
		<?php echo form_textarea('alt', '', 'class="post-body"'); ?>
		<br>
		<?php echo form_submit('submit', 'Upload!', 'class="post-submit"'); ?>
		<?php echo form_close(); ?>
</div>