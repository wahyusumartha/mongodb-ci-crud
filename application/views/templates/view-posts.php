<div class="row">
	<div class="column grid-16">
		<?php if($this->session->flashdata('message')){?>
			<div class="success">
				<?php echo $this->session->flashdata('message');?>
			</div>
		<?php }?>
		<h4 class="f-h4">Posting Data</h4>
		<table class="table" summary="Author Data">
			<thead>
				<tr>
					<th scope="col">Title</th>
					<th scope="col">Tags</th>
					<th scope="col">Author</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($posts as $list){?>
					<tr>
						<td><?php echo $list['title'];?></td>
						<td>
						<?php 
							$i = 1;
							foreach($list['tags'] as $tags){?>
							<?php if($i < sizeof($list['tags'])){?>
								<?php echo $tags.',';?>
							<?php }else{?>
								<?php echo $tags;?>
							<?php }?>
							<?php $i++;?>
						<?php }?>
						</td>
						<td>
						<?php
						 $author = author_ref($list['author'][0]);
						 echo $author['nickname'];?>
						</td>
						<td><?php echo anchor('blog/detail_post/'.$list['_id'],'Edit',array('class'=>'btn sbtn'));?> <?php echo anchor('blog/delete_post/'.$list['_id'],'Delete',array('class'=>'btn sbtn'));?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
	<div class="pagination" style="margin-left: 45%">
		<?php echo $create_links;?>
	</div>
</div>