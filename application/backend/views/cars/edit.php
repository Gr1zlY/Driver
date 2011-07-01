
<?php echo validation_errors(); ?>

<?php echo form_open_multipart(current_url()); ?>
<table class="create-post">
    <tr>
	<td colspan=4>
	    <h3>Title:</h3>
	    <?php echo form_input('title', $title, 'class="post-title"'); ?>
	</td>
    </tr>
    <tr>
	<td>
	    <h3>Class</h3>
	    <?php echo form_dropdown('class', $this->config->item('cars_class'), $class); ?>
	</td>
	<td>
	    <img src="<?php echo base_url().'../'.$image;?>" height ="50px" />
	</td>
	<td>
	    <h3>Изображение:</h3>
	    <input type="file" name="userfile"/>
	</td>
	<!--<td>
	    <select name="panorama" size="5">
	    <?php foreach($panorama as $row):?>
		<?php if(strstr($row, '.swf') OR strstr($row, '.SWF')): ?>
		    <option value="/panorama/<?php echo $row; ?>"><?php echo $row; ?></option>
		<?php endif;?>
	    <?php endforeach;?>
		</select>
	</td>-->
    </tr>
</table>
<h3>Text:</h3>
<?php echo form_textarea('description', $description, 'class="post-body"'); ?><br />

<?php echo form_submit('upload', 'Добавить!', 'class="post-submit"'); ?>
<?php echo form_close(); ?>