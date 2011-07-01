<div id="body">

	<div class="list">
		<table>
			<tr class="list-head">
				<td class="list-id">#</td><td>time</td><td>name</td><td>contents</td>
			</tr>
		        <?php if($messages != FALSE): ?>
				<?php foreach($messages as $preview): ?>
					<tr class="list-row">
						<td class="list-id"><?php echo $preview['id'];?></td>
						<td class="list-id"><?php echo mdate('%d.%m.%y', $preview['time']);?></td>
						<td class="list-id"><?php echo $preview['name'];?></td>
						<td>
							<h4><?php echo $preview['message'];?></h4>
							<div class="actions">
								<?php echo mailto($preview['email'], 'Reply');?>
								<?php echo anchor('admin/deletemessage/'.$preview['id'], ' ' ,'class="action-delete"');?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif;?>
		</table>
	</div>
</div>