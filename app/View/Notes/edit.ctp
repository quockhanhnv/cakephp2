<h2>Note edit</h2>
<?php
	echo $this->Form->create();
	echo $this->Form->input('id');
	echo $this->Form->input('title', array('label' =>'', 'placeholder' => 'Title'));
	echo $this->Form->input('content', array('label' =>'', 'placeholder' => 'Content'));
	echo $this->Form->end('Update');
?>
<div class="menu_actions">
	<?php echo $this->Html->link('Homepage', '/'); ?>
</div>
