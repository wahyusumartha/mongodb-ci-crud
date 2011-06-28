<div class="row">
	<div class="column grid-16">
		<h4 class="f-h4">Add Author</h4>
		<?php if($this->session->flashdata('error_message')){?>
			<div class="error">
				<?php echo $this->session->flashdata('error_message');?>
			</div>
		<?php } ?>
		<?php echo form_open('blog/save_author');?>
			<fieldset>
				<legend>Add Author</legend>
				<label for="name">Name</label>
				<?php
					$data = array('name' => 'name', 'id' => 'name', 'size' => '30', 'class'=>'field required');
					echo form_input($data);
				?>
				<label for="nickname">Nickname</label>
				<?php
					$data = array('name' => 'nickname', 'id' => 'nickname', 'size' => '30', 'class'=>'field required');
					echo form_input($data);
				?>
				<label for="email">Email</label>
				<?php
					$data = array('name' => 'email', 'id' => 'email', 'size' => '30', 'class'=>'field required');
					echo form_input($data);
				?>
				<p style="margin-left: 10px;">
				<?php echo form_submit('Submit', 'Submit');?>
				</p>
			</fieldset>
		<?php echo form_close();?>
	</div>
</div>