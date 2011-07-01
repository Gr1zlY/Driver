<div id="body">
<?php echo anchor('admin/uploadclient', 'Create new!');?>
	<div class="list">
		    <ul>
		        <?php if($clients != FALSE): ?>
				<?php foreach($clients as $preview): ?>
					<li class="list-row">
						<div class="list-id"><?php echo $preview['id'];?></div>
						<div><img src ="<?php echo base_url().'../'.$preview['image'];?>" width="50px"></div>
						<div>
							<p><?php echo $preview['text'];?></p>
							<p><?php echo anchor($preview['link'], $preview['link']);?></p>
						</div>
						<div class="actions">
							<!--<?php echo anchor('admin/updateimage/'.$preview['id'], ' ', 'class="action-edit"');?>-->
							<?php echo anchor('admin/deleteclients/'.$preview['id'], ' ' ,'class="action-delete"');?>
						</div>
					</li>
				<?php endforeach; ?>
			<?php endif;?>
			</ul>
	</div>
</div>