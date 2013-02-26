		<!-- Main content -->
		<div class="span9">
			<article>
				<h2><?php echo e($page->title); ?></h2>
				<?php echo $page->body; ?>
			</article>
		</div>
		
		<!-- Sidebar -->
		<div class="span3">
			<h2>Recent News</h2>
<?php $this->load->view('sidebar'); ?>

		</div>