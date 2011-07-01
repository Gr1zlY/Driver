<ul class="car-list">
    <li>
	<table>
	    <tr>
		<td><img class="small-img" src="<?php echo base_url();?><?php echo $car['image'];?>"/></td>
		<td class="car-desc">
		    <h4><?php echo $car['title'];?></h4>
		    <?php echo $car['description'];?>
		</td>
	    </tr>
	</table>
    </li>
</ul>

<h3>From airport</h3>
<?php echo validation_errors(); ?>
<?php echo form_open(current_url(), 'class="order-form"');?>
    <table>
	<tr>
	    <td>
		<table>
		    <tr>
			<td><label for="order-name">Name:</label></td>
			<td colspan="3"><input id="order-name" type="text" name="name"/></td>
			<td><label for="order-date">Date of arrival:</label></td>
			<td><input id="order-date" type="text" name="arrival"/></td>
			<td><label for="order-time">at</label></td>
			<td><input id="order-time" type="text" name="arrival_time"/></td>
		    </tr>
		    <tr>
			<td><label for="order-surname">Surname:</label></td>
			<td colspan="3"><input id="order-surname" type="text" name="surname"/></td>
			<td><label for="order-flight">Flight:</label></td>
			<td colspan="3"><input id="order-flight" type="text" name="flight"/></td>
		    </tr>
		    <tr>
			<td>
			    <label for="order-cellcountrycode">Cell phone:</label>
			</td>
			<td colspan="3">
			    + <input id="order-cellcountrycode" type="text" name="cellcountrycode"/> (<input id="order-cellcode" type="text" name="cellcode"/>)<input id="order-cellphone" type="text" name="cellphone"/>
			</td>

			<td>Comment:</td>
			<td colspan="3" rowspan="2">
			    <textarea name="comment"></textarea>
			</td>
		    </tr>
		    <tr>
			<td><label for="order-email">Email:</label></td>
			<td colspan="3"><input id="order-email" type="text" name="email"/></td>
		    </tr>
		    <tr>
			<td><label for="order-paycash">Pay with:</label></td>
			<td>
			    <input type="radio" id="order-paycash" name="payment" value="cash"/><label for="order-paycash">Cash</label>
			    <br/>
			    <input type="radio" id="order-paycard" name="payment" value="credit_card"/><label for="order-paycard">Credit Card</label>
			</td>

			<td colspan="6" align="right"><input type="submit" class="order-submit" value="Send"/></td>
		    </tr>
		</table>
	    </td>
	</tr>
    </table>

<?php echo form_close(); ?>

<h3>Limousine Service</h3>
<div class="info">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem risus, pharetra fringilla mattis vel, lobortis ac leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus eget ligula in neque commodo eleifend. Sed aliquet libero ac nisi pulvinar adipiscing. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
</div>