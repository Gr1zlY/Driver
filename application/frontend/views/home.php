<div class="info">
    <p><?php echo $this->config->item('home_info');?></p>
</div>
<?php if(isset($cars) AND $cars != FALSE):?>
<h3>Economy</h3>
<ul class="car-list">
    <?php foreach($cars as $car):?>
	<?php if($car['class'] == 'Economy'):?>
	<li>
	    <table>
		<tr>
		    <td><img src="<?php echo base_url();?><?php echo $car['image'];?>" class="car_image"/></td>
		    <td class="car-desc">
			<h4><?php echo $car['title'];?></h4>
			<?php echo $car['description'];?>
			<p class="order"><?php echo anchor('driver/order/'.$car['id'], 'Order');?></p>
		    </td>
		</tr>
	    </table>
	</li>
	<?php endif;?>
    <?php endforeach;?>
</ul>
<h3>Business</h3>
<ul class="car-list">
    <?php foreach($cars as $car):?>
	<?php if($car['class'] == 'Business'):?>
	<li>
	    <table>
		<tr>
		    <td><img src="<?php echo base_url();?><?php echo $car['image'];?>" class="car_image"/></td>
		    <td class="car-desc">
			<h4><?php echo $car['title'];?></h4>
			<?php echo $car['description'];?>
			<p class="order"><?php echo anchor('driver/order/'.$car['id'], 'Order');?></p>
		    </td>
		</tr>
	    </table>
	</li>
	<?php endif;?>
    <?php endforeach;?>
</ul>
<?php endif; ?>