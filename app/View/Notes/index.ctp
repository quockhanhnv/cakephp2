<h2>NoteList</h2>
<ul>
	<?php foreach ($notes as $note): ?>
<!--		<li> --><?php //echo $note['Note']['title']?><!-- </li>-->
<!--											  giá trị          đường dẫn: controller/action/parameter                     -->
		<li>
			<?php echo $this->Html->link($note['Note']['title'], '/notes/view/' . $note['Note']['id']) ?> |
			<?php echo $this->Html->link('Edit', '/notes/edit/' . $note['Note']['id'], array('class' => 'inline_action')) ?> |
			<?php echo $this->Form->postLink(
				'Delete', '/notes/delete/' . $note['Note']['id'],
				array('class' => 'inline_action'),
				'Are you sure ?') ?>
		</li>
	<?php endforeach; ?>
</ul>

<div class="menu_actions">
	<?php echo $this->Html->link('Create a note', '/new-note'); ?>
</div>
