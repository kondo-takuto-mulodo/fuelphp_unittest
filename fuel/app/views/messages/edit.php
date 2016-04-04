<?php echo render('messages/_form'); ?>
<p>
	<?php echo Html::anchor('messages/view/'.$message->id, 'View'); ?> |
	<?php echo Html::anchor('messages', 'Back'); ?>
</p>
