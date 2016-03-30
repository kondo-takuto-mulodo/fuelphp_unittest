<h3>HOT <span class='muted'>Messages</span></h3>
<br>
<div class="row">
  <div class="col-md-4"><?php echo isset($hot_message[0]) ? Html::anchor('messages/view/'.$hot_message[0]->id, $hot_message[0]->name) : "" ; ?></div>
  <div class="col-md-4"><?php echo isset($hot_message[1]) ? Html::anchor('messages/view/'.$hot_message[1]->id, $hot_message[1]->name) : "" ; ?></div>
  <div class="col-md-4"><?php echo isset($hot_message[2]) ? Html::anchor('messages/view/'.$hot_message[2]->id, $hot_message[2]->name) : "" ; ?></div>
</div>
<br>
<h3>Listing <span class='muted'>Messages</span></h3>
<br>
<?php if ($messages): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Message</th>
      <th>Created at</th>
      <th>Views</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($messages as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->message; ?></td>
      <td><?php echo Helper_Common::format_time($item->created_at); ?></td>
      <td><?php echo $item->views; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('messages/clone/'.$item->id, '<i class="icon-eye-open"></i> Clone', array('class' => 'btn btn-default btn-sm')); ?>
            <?php echo Html::anchor('messages/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>
            <?php echo Html::anchor('messages/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>
            <?php echo Html::anchor('messages/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Messages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('messages/create', 'Add new Message', array('class' => 'btn btn-success')); ?>

</p>
