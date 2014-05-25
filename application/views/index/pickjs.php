	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);

	    if(<? echo $err?> == 1){
			alertify.error("代碼錯誤，請重新輸入");
	    }


	$( "#enter_code_btn" ).click(function() {
						$('#code_form').submit();

	});


	</script>