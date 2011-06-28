<div class="row">
	<div class="column grid-16">
		<h4 class="f-h4">Update Author</h4>
		<?php if($this->session->flashdata('error_message')){?>
			<div class="error">
				<?php echo $this->session->flashdata('error_message');?>
			</div>
		<?php } ?>
		<?php echo form_open('blog/update_author');?>
			<fieldset>
				<legend>Update Author</legend>
				<?php echo form_hidden('_id', $author['_id'])?>
				<?php echo form_hidden('current_url', $this->session->userdata('current_url'));?>
				<label for="name">Name</label>
				<?php
					$data = array('name' => 'name', 'id' => 'name', 'size' => '30', 'class'=>'field required', 'value'=>$author['fullname']);
					echo form_input($data);
				?>
				<label for="nickname">Nickname</label>
				<?php
					$data = array('name' => 'nickname', 'id' => 'nickname', 'size' => '30', 'class'=>'field required', 'value'=>$author['nickname']);
					echo form_input($data);
				?>
				<label for="email">Email</label>
				<?php
					$data = array('name' => 'email', 'id' => 'email', 'size' => '30', 'class'=>'field required', 'value'=>$author['email']);
					echo form_input($data);
				?>
				<p style="margin-left: 10px;">
				<?php echo form_submit('Submit', 'Update');?>
				</p>
			</fieldset>
		<?php echo form_close();?>
	</div>
</div>