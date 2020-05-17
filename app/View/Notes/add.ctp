<h2>Note add</h2>
<div class="validation_errors">
	<?php if(isset($errors)) {
		foreach ($errors as $error) {
			echo '<p>' . $error[0] . '<p>';
		}
	}
	;?>
</div>
<?php
	echo $this->Form->create();
	echo $this->Form->input('title', array('label' =>'', 'placeholder' => 'Title', 'error' => false));
	echo $this->Form->input('content', array('label' =>'', 'placeholder' => 'Content', 'error' => false));
	echo $this->Form->end('Submit');
?>
<div class="menu_actions">
	<?php echo $this->Html->link('Homepage', '/'); ?>
</div>
