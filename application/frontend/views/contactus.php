<h3>Contacts</h3>
<div class="fl">
    <img src="<?php echo base_url();?>images/me.jpg"/>
</div>
<div class="fl contacts">
    <ul class="contacts-data">
	<li>
	    <a class="link-skype" href="skype:okspen?call">khromenko</a>
	</li>
	<li><a class="link-email" href="mailto:khromenko@i.ua">khromenko@i.ua</a></li>
	<li class="link-phone">+38(091) 123-45-67</li>
    </ul>
    <?php echo validation_errors(); ?>
    <?php echo form_open(current_url(), 'class="contact-form"');?>
    <fieldset>
	<table><tr>
		<td>
		    <table>
			<tr>
			    <td><label for="contacts-name">Name:</label></td>
			    <td><?php echo form_input('name', set_value('name', ''), 'id="contacts-name" required="required"');?></td>
			</tr>
			<tr>
			    <td><label for="contacts-email">Email:</label></td>
			    <td><?php echo form_input('email', set_value('email', ''), 'id="contacts-email" required="required"');?></td>
			</tr>
			<tr>
			    <td><label for="contacts-message">Message:</label></td>
			    <td colspan="2"><textarea cols="10" rows="5" id="contacts-message" required="required" name="message"><?php echo set_value('message','');?></textarea></td>
			</tr>
			<tr>
			    <td></td><td><input type="submit" class="order-submit" value="Send"/></td>
			</tr>
		    </table>
		</td>
	    </tr></table>
    </fieldset>
    <?php echo form_close(); ?>
</div>
<div class="cb"></div>