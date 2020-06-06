<?php if(isset($injector_bottom)){ foreach ($injector_bottom as $key => $injector) { ?>
	<?php echo $injector; ?>
<?php } } ?>

<script type="text/javascript">
  <?php echo message_box('Welcome'); ?>
  <?php echo message_box('success'); ?>
  <?php echo message_box('error'); ?>
</script>

<script type="text/javascript">
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));
$(document).ready(function() {
  $(".digits-only").inputFilter(function(value) {
    return /^\d*$/.test(value);    // Allow digits only, using a RegExp
  });
});
</script>

</body>
</html>