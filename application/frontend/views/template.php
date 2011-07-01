<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $meta['title'];?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css"/>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.corners.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
		$("p.order").corner("8px")
            });
        </script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/smoothness/jquery-ui-1.8.11.custom.css"/>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.11.custom.min.js"></script>
	 <script type="text/javascript">
            $(document).ready(function(){
               $("p.order, .order-submit").corner("8px");
               $("#order-date").datepicker().datepicker( "option", "dateFormat", "d MM yy");
            });
        </script>
    </head>
    <body>
        <div id="wrap">
	    <?php $this->load->view('parts/page_header');?>
            <div id="content">
		<?php if(isset($page) AND $page != FALSE):?>
		    <?php $this->load->view($page);?>
		<?php endif;?>
            </div>
	    <?php $this->load->view('parts/page_footer');?>
        </div>
        <div id="bg-top"></div>
    </body>
</html>






