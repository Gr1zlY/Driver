<div class="list">
    <table>
	<tr class="list-head">
	    <td class="list-id">#</td><td>contents</td>
	</tr>
	<?php if(isset($orders) AND $orders != FALSE): ?>
	    <?php foreach($orders as $order): ?>
		<tr class="list-row">
		    <td class="list-id"><?php echo $order['id'];?></td>
		    <td>
			<table>
			    <tr>
				<td>Car</td>
				<td>
				    <?php if(is_array($order['car'])):?>
					<?php echo $order['car']['title'];?> (<?php echo $order['car']['class'];?>)
				    <?php else: ?>
					<?php echo $order['car'];?>
				    <?php endif;?>
				</td>
			    </tr>
			    <tr>
				<td width="20%">Name </td>
				<td><?php echo $order['name']; ?> <?php echo $order['surname']; ?></td>
			    </tr>
			    <tr>
				<td>Email </td>
				<td><?php echo mailto($order['email']); ?></td>
			    </tr>
			    <tr>
				<td>Phone</td>
				<td><?php echo $order['cell'];?></td>
			    </tr>
			    <tr>
				<td>Date of arrival</td>
				<td><?php echo $order['arrival'];?> at <?php echo $order['arrival_time'];?></td>
			    </tr>
			    <tr>
				<td>Flight</td>
				<td><?php echo $order['flight'];?></td>
			    </tr>
			    <tr>
				<td>Payment method</td>
				<td><?php echo $order['payment'];?></td>
			    </tr>
			    <?php if(isset($order['comment']) AND $order['comment'] != FALSE):?>
			    <tr>
				<td>Comment</td>
				<td><p><?php echo $order['comment']; ?></p></td>
			    </tr>
			    <?php endif; ?>
			    <tr>
				<td colspan="2"><small><?php echo $order['ip']; ?> at <?php echo mdate("%d.%m.%y %h:%i", $order['time']); ?></small></td>
			    </tr>
			</table>
			<div class="actions">
				    <?php echo anchor('admin/delete/order/'.$order['id'], ' ' ,'class="action-delete"');?>
			</div>
		    </td>
		</tr>
	    <?php endforeach;?>
	<?php endif;?>
    </table>
    <?php echo $this->pagination->create_links();?>
</div>