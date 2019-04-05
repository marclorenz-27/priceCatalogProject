<div class="container">
	<h2 align="center"><?= $title ?></h2>
	<div class="input-group mb-3 form-group">
	  <div class="input-group-prepend">
	    <span class="input-group-text" id="inputGroup-sizing-default">Search</span>
	  </div>
	  <input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" />
	</div>
	<div id="result">
		
	</div>
</div>

<script>
	$(document).ready(function(){
		load_data();
		function load_data(query){
			$.ajax({
				url:"<?php echo base_url(); ?>/search/fetch",
				method:"POST",
				data:{query:query},
				success:function(){
					$('#result').html(data);
				}
			})
		}
	});
</script>

