	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);



	$( ".lock" ).click(function() {

		id = $(this).attr('id');
		alertify.set({ labels: {
		    ok     : "沈入海底",
		    cancel : "取消"
		} });
		// button labels will be "Accept" and "Deny"
			alertify.confirm("確定讓瓶中信沈入海底？<br>沉沒的瓶子不會再被撿到，之前的對話則不受到影響", function (e) {
				if (e) {
						alertify.success("瓶中信已經沈入海底");
						window.location.href = "/api/story_lock/"+id;
				} else {
					alertify.error("瓶中信繼續漂流，等待回應");
				}
			});
			return false;


	});

	$( ".unlock" ).click(function() {

		id = $(this).attr('id');
		alertify.set({ labels: {
		    ok     : "浮出海面",
		    cancel : "取消"
		} });
		// button labels will be "Accept" and "Deny"
			alertify.confirm("確定讓瓶中信重現海面？<br>浮上海面後瓶中信將繼續漂流，等待被撿起", function (e) {
				if (e) {
						alertify.success("浮上海面成功");
						window.location.href = "/api/story_lock/"+id;
				} else {
					alertify.error("瓶中信靜靜地躺在海底");
				}
			});
			return false;


	});


	</script>