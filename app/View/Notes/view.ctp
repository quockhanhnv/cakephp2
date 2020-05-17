<h2> <?php echo $note['Note']['title']?> </h2>
<!--<p> --><?php //echo $note['Note']['content']?><!-- </p>-->
<p> <?php echo str_replace('\n', '<br/>', $note['Note']['content'])?> </p>
<small>
	Created_at: <?php echo date('d-m-Y H:i:s', strtotime($note['Note']['created'])) ?> |
	Updated_at: <?php echo $note['Note']['modified']?>
</small>
<div class="menu_actions">
	<?php echo $this->Html->link('Homepage', '/') ?> |
	<?php echo $this->Html->link('Edit', '/edit-note/' . $note['Note']['id']) ?> |
	<?php echo $this->Form->postLink('Delete', '/notes/delete/' . $note['Note']['id'], null, 'Are you sure ?') ?>
</div>
