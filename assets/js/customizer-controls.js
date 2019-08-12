jQuery(document).ready(function () {

	// Reset font size input field back to the default value
	//$('.font-size-reset').on('click', function () {
	//	var resetValue = $(this).attr('font-size-reset-value');
	//	$(this).parent().find('.customize-control-font-size-value').val(resetValue);
	//});

	var $input = $('#_customize-input-regular_font_size'),
		$reset = $('#font-size-reset')
	$('#font-size-reset').data('default', $input.val());

	$reset.on('click', function () {
		$input.val($(this).data('default'));
	});

}); // jQuery( document ).ready