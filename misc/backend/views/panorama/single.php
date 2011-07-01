<div id="body">
  	<?php echo validation_errors(); ?>
	<?php echo form_open(current_url()); ?>
		<table class="create-post">
			<tr>
				<td colspan=2>
					<h3>Title:</h3>
					<?php echo form_input('title', $post['title'], 'class="post-title"'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<h3>Order:</h3>
					<?php echo form_input('order', $post['order'],'class="post-input"'); ?>
				</td>
	    <td>
		<select name="panorama" size="5">
		    <?php foreach($panorama as $row):?>
			<?php if(strstr($row, '.swf') OR strstr($row, '.SWF')): ?>
		    <option value="/panorama/<?php echo $row; ?>"><?php echo $row; ?></option>
			<?php endif;?>
		    <?php endforeach;?>
		</select>
	    </td>
			</tr>
		</table>
		<h3>Text:</h3>
		<?php echo form_textarea('text', $post['text'], 'class="post-body"'); ?><br />

		<?php echo form_submit('upload', 'Upload!', 'class="post-submit"'); ?>
	<?php echo form_close(); ?>
</div>