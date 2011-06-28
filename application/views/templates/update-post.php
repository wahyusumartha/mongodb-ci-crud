<div class="row">
	<div class="column grid-16">
		<h4 class="f-h4">Update Post</h4>
		<?php if($this->session->flashdata('error_message')){?>
			<div class="error">
				<?php echo $this->session->flashdata('error_message');?>
			</div>
		<?php } ?>
		<?php echo form_open('blog/update_post');?>
			<fieldset>
				<legend>Update Post</legend>
				<?php echo form_hidden('_id', $post['_id']);?>
				<?php echo form_hidden('current_url', $this->session->userdata('current_url'));?>
				<label for="title">Title</label>
				<?php
					$data = array('name' => 'title', 'id' => 'title', 'size' => '30', 'class'=>'field required','value'=>$post['title']);
					echo form_input($data);
				?>
				<label for="author">Author</label>
				<?php
					echo form_dropdown('author',$authors, $post['author'][0]['$id']);
				?>
				<label for="body">Body</label>
				<?php
					$data = array('name' => 'body', 'id' => 'body', 'size' => '30', 'class'=>'field required','value'=>$post['body']);
					echo form_input($data);
				?>
				<label for="tags">Tags</label>
				<?php
					$i = 1;
					foreach($post['tags'] as $tag){
						if($i < sizeof($post['tags'])){
							echo $tag.',';
						}else{
							echo $tag;
						}
						$i++;
					}
				?>
				<p style="margin-left: 10px;">
				<?php echo form_submit('Submit', 'Submit');?>
				</p>
			</fieldset>
		<?php echo form_close();?>
	</div>
</div>