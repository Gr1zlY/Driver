<?php if($this->session->flashdata('success') !=  FALSE):?>
    <div class = "message"><?php echo $this->session->flashdata('success');?></div>
<?php endif;?>

<?php if($this->session->flashdata('error') !=  FALSE):?>
    <div class = "error"><?php echo $this->session->flashdata('error');?></div>
<?php endif;?>

<?php if(isset($error) AND $error !=  FALSE):?>
    <div class = "error"><?php echo $error; ?></div>
<?php endif;?>

<?php if(isset($success) AND $success !=  FALSE):?>
    <div class = "message"><?php echo $success; ?></div>
<?php endif;?>