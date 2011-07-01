<?php if($this->session->userdata('logged_in') == TRUE):?>
	<div class="admin-menu">
		<ul class="menu">
			<li><?php echo anchor('../..', 'Сайт');?></li>
			<li><?php echo anchor('admin/cars', 'Автомобили');?></li>
			<li><?php echo anchor('admin/orders', 'Заказы');?></li>
			<li><?php echo anchor('admin/messages', 'Сообщения');?></li>
		</ul>
	</div>
<?php endif;?>