<div id="body">
<?php echo anchor('admin/uploadimage', 'Upload Images');?>
	<div class="list">
		    <ul>
		        <?php if($images != FALSE): ?>
				<?php foreach($images as $preview): ?>
					<li class="list-row">
						<div class="list-id"><?php echo $preview['id'];?></div>
						<div><img src ="<?php echo base_url().'../'.$preview['image'];?>" width="50px"></div>
						<div>
							<p><?php echo $preview['alt'];?></p>
							
						</div>
						<div class="actions">
							<?php echo anchor('admin/updateimage/'.$preview['id'], ' ', 'class="action-edit"');?>
							<?php echo anchor('admin/deleteimage/'.$preview['id'], ' ' ,'class="action-delete"');?>
						</div>
					</li>
				<?php endforeach; ?>
			<?php endif;?>
			</uf>
	</div>
</div>