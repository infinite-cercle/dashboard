<?php if(isset($injector_bottom)){ foreach ($injector_bottom as $key => $injector) { ?>
	<?php echo $injector; ?>
<?php } } ?>

<script type="text/javascript">
  <?php echo message_box('Welcome'); ?>
  <?php echo message_box('success'); ?>
  <?php echo message_box('error'); ?>
</script>

<script>
lightbox.option({
  'resizeDuration': 200,
  'wrapAround': true
})
</script>
</body>
</html>