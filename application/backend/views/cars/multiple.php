<?php echo anchor('admin/newcar', 'Добавить автомобиль');?>
<div class="list">
    <table>
	<tr class="list-head">
	    <td class="list-id">#</td><td>image</td><td>contents</td>
	</tr>
	<?php if(isset($cars) AND $cars != FALSE): ?>
	    <?php foreach($cars as $car): ?>
	<tr class="list-row">
	    <td class="list-id"><?php echo $car['id'];?></td>
	    <td width="290px">
		<img src="<?php echo base_url().'../'.$car['image'];?>" width="280px">
	    </td>
	    <td>
		<strong><?php echo $car['title']; ?></strong>
		<p><?php echo $car['description']; ?></p>
		<div class="actions">
			    <?php echo anchor('admin/editcar/'.$car['id'], ' ', 'class="action-edit"');?>
			    <?php echo anchor('admin/delete/car/'.$car['id'], ' ' ,'class="action-delete"');?>
		</div>
	    </td>
	</tr>
	    <?php endforeach;?>
	<?php endif;?>

    </table>
</div>
