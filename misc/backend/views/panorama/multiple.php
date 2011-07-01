<div id="body">
<?php echo anchor('admin/uploadpanorama', 'Create new');?>
	<div class="list">
		<table>
			<tr class="list-head">
				<td class="list-id">#</td><td>contents</td>
			</tr>
		        <?php if($panorama != FALSE): ?>
				<?php foreach($panorama as $preview): ?>
					<tr class="list-row">
						<td class="list-id"><?php echo $preview['id'];?></td>
						<td>
							<p><?php echo $preview['text']; ?></p>
							<img src="<?php echo base_url();?>../<?php echo $preview['image'];?>" width="100px"/>
							<div class="actions">
								<?php echo anchor('admin/editpanorama/'.$preview['id'], ' ', 'class="action-edit"');?>
								<?php echo anchor('admin/deletepanorama/'.$preview['id'], ' ' ,'class="action-delete"');?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif;?>
		</table>
	</div>
</div>