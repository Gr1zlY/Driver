<div id="body">
  	<?php echo validation_errors(); ?>
	<?php echo form_open(current_url()); ?>
		<table class="create-post">
			<tr>
				<td colspan=4>
					<h3>Title:</h3>
					<?php echo form_input('title', $post['title'], 'class="post-title"'); ?>
				</td>
			</tr>
			<tr>
				<td>
					<h3>Link slug:</h3>
					<?php echo form_input('link', $post['link'],'class="post-input"'); ?>
				</td>
				<td>
					<h3>Tags:</h3>
					<?php echo form_input('meta_tags', $post['meta_tags'],'class="post-input"'); ?>
				</td>
				<td>
					<h3>meta-desription:</h3>
					<?php echo form_input('meta_description', $post['meta_description'],'class="post-input"'); ?>
				</td>
			</tr>
		</table>
		<h3>Text:</h3>
		<?php echo form_textarea('post', $post['post'], 'class="post-body"'); ?><br />

		<?php echo form_submit('submit', 'Post it!', 'class="post-submit"'); ?>
	<?php echo form_close(); ?>
</div>