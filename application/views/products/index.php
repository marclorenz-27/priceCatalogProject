</center>
  
  <h2 align="center"><?= $title ?></h2>

  <div class="container">
    <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon">Search</span>
        <input type="text" name="search_text" id="search_text" placeholder="Search Category, Brand or Product Name" class="form-control">
      </div>
    </div>
  </div>
  <div id="result"></div>
  <div style="clear:both"></div>

  <script>
    $(document).ready(function()
    {
      load_data();

      function load_data(query)
      {
        $.ajax({
          url: "<?php echo base_url(); ?>products/fetch",
          method:"POST",
          data:{query:query},
          success:function(data){
            $('#result').html(data);

          }
        })
      }

      $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
          load_data(search);
        }
        else
        {
          load_data();
        }
      })
    });
  </script>