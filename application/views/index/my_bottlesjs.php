	<script>
		 vph = $(window).height();
	    $('#banner').height(vph);



	$( ".lock" ).click(function() {

		id = $(this).attr('id');
		alertify.set({ labels: {
		    ok     : "封存",
		    cancel : "取消"
		} });
		// button labels will be "Accept" and "Deny"
			alertify.confirm("確定封存瓶中信？<br>封存後將不會再被撿到，之前的對話不會受到影響", function (e) {
				if (e) {
						alertify.success("封存成功");
						window.location.href = "/api/story_lock/"+id;
				} else {
					alertify.error("瓶中信尚未封存");
				}
			});
			return false;


	});

	$( ".unlock" ).click(function() {

		id = $(this).attr('id');
		alertify.set({ labels: {
		    ok     : "解除封存",
		    cancel : "取消"
		} });
		// button labels will be "Accept" and "Deny"
			alertify.confirm("確定解除封存瓶中信？<br>解除後瓶中信將繼續在海中漂流，等待被撿起", function (e) {
				if (e) {
						alertify.success("解除封存成功");
						window.location.href = "/api/story_lock/"+id;
				} else {
					alertify.error("瓶中信保持封存狀態");
				}
			});
			return false;


	});


	</script>