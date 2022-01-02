<?php if(count($errors) > 0): ?>
	<div class="alert alert-danger">
		<ul>
			<?php foreach($errors as $error){?>
				<li><?php echo $error ?></li>
			<?php } ?>
		</ul>
	</div>
<?php endif ?>