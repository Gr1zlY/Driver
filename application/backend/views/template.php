<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $ptitle; ?></title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>../css/admin-style.css" type="text/css">
		<script src="<?php echo base_url(); ?>../js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>../js/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>../js/jquery.synctranslit.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){

				$('textarea').tinymce({
					script_url : '<?php echo base_url();?>../js/tiny_mce/tiny_mce.js',
					//plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",
					theme : "advanced",
					theme_advanced_toolbar_location : "top",
					theme_advanced_toolbar_align : "left",
					theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,fontsizeselect,cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,code",
					theme_advanced_buttons2 : "",
					content_css : "<?php echo base_url();?>../css/tinymce.css"
				});
			});
		</script>
	</head>
	<body>
		<div id="wrap">
			<div id="head">
				<table>
				    <tr>
					<td><h1><?php echo anchor('', 'Admin panel');?></h1></td>
					<?php if($this->session->userdata('logged_in') == TRUE): ?>
					    <td id="login_info">
						Последнее посещение <?php echo mdate('%d.%m.%y %h:%i', $this->session->userdata('last_login'));?><br/>
						c ip <?php echo $this->session->userdata('ip');?>
						<?php echo anchor('authorization/editmember', 'Изменение имени/пароля');?>
					    </td>
					    <td><span><?php echo anchor('authorization/logout', 'Logout');?></span></td>
					<?php endif; ?>
				    </tr>
				</table>
				<?php $this->load->view('parts/messages'); ?>
				<?php $this->load->view('parts/menu'); ?>
			</div>
			<div id="body">
			    <?php if(isset($page) AND $page != FALSE): ?>
				    <?php $this->load->view($page); ?>
			    <?php endif; ?>
			</div>
			<div id="footer">
				<p>&copy; Okspen</p>
			</div>
		</div>
	</body>
</html>