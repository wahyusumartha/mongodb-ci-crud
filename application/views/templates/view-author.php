<div class="row">
	<div class="column grid-16">
		<?php if($this->session->flashdata('message')){?>
			<div class="success">
				<?php echo $this->session->flashdata('message');?>
			</div>
		<?php }?>
		<h4 class="f-h4">Author Data</h4>
		<table class="table" summary="Author Data">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Nickname</th>
					<th scope="col">Email</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($authors as $list){?>
					<tr>
						<td><?php echo $list['fullname'];?></td>
						<td><?php echo $list['nickname'];?></td>
						<td><?php echo $list['email'];?></td>
						<td><?php echo anchor('blog/detail_author/'.$list['_id'],'Edit',array('class'=>'btn sbtn'));?>| <?php echo anchor('blog/delete_author/'.$list['_id'],'Delete',array('class'=>'btn sbtn'));?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<div class="pagination" style="margin-left: 45%">
		<?php echo $create_links;?>
	</div>
</div>