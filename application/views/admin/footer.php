    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>

	<script>
	$('.self-def').click(function(){
	   $('#self-def-input').attr('disabled', false);
	});
	$('.other-def').click(function(){
	   $('#self-def-input').attr('disabled', true);
	});

	</script>

  </body>
</html>