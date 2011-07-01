<div class="list">
    <table>
	<tr class="list-head">
	    <td class="list-id">#</td><td>contents</td>
	</tr>
	<?php if(isset($messages) AND $messages != FALSE): ?>
	    <?php foreach($messages as $message): ?>
		<tr class="list-row">
		    <td class="list-id"><?php echo $message['id'];?></td>
		    <td>
			<strong><?php echo $message['name']; ?></strong> (<?php echo mailto($message['email']); ?>)
			<p><?php echo $message['message']; ?></p>
			<small><?php echo $message['ip']; ?> at <?php echo mdate("%d.%m.%y %h:%i", $message['time']); ?></small>
			<div class="actions">
				    <?php echo anchor('admin/delete/message/'.$message['id'], ' ' ,'class="action-delete"');?>
			</div>
		    </td>
		</tr>
	    <?php endforeach;?>
	<?php endif;?>
    </table>
    <?php echo $this->pagination->create_links();?>
</div>