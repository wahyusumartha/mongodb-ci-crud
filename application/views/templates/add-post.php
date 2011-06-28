<div class="row">
	<div class="column grid-16">
		<h4 class="f-h4">Add Post</h4>
		<?php if($this->session->flashdata('error_message')){?>
			<div class="error">
				<?php echo $this->session->flashdata('error_message');?>
			</div>
		<?php } ?>
		<?php echo form_open('blog/save_post');?>
			<fieldset>
				<legend>Add Post</legend>
				<label for="title">Title</label>
				<?php
					$data = array('name' => 'title', 'id' => 'title', 'size' => '30', 'class'=>'field required');
					echo form_input($data);
				?>
				<label for="author">Author</label>
				<?php
					echo form_dropdown('author',$authors);
				?>
				<label for="body">Body</label>
				<?php
					$data = array('name' => 'body', 'id' => 'body', 'size' => '30', 'class'=>'field required');
					echo form_input($data);
				?>
				<label for="tags">Tags</label>
				<?php
					$data = array('name' => 'tags', 'id' => 'tags', 'size' => '30', 'class'=>'field required');
					echo form_input($data);
				?>
				<p style="margin-left: 10px;">
				<?php echo form_submit('Submit', 'Submit');?>
				</p>
			</fieldset>
		<?php echo form_close();?>
	</div>
</div>