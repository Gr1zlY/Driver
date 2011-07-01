<?php if($this->session->userdata('logged_in') == TRUE):?>
	<div class="admin-menu">
		<ul class="menu">
			<li><?php echo anchor('admin/posts', 'Manage Pages');?></li>
			<li><?php echo anchor('admin/clients', 'Клиенты');?></li>
			<li><?php echo anchor('admin/images', 'Manage Images');?></li>
			<li><?php echo anchor('admin/panorama', 'Панорамы');?></li>
			<li><?php echo anchor('admin/messages', 'Manage Messages');?></li>
			<li><?php echo anchor('authorization/editmember', 'Изменение имени/пароля');?></li>
		</ul>
	</div>
<?php endif;?>