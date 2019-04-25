</center>
  <h2 align="center"><?= $title ?></h2><br>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1"><i class='fas fa-search'></i> &nbsp;Search</span>
    </div>
    <input type="text" name="search_text" id="search_text" placeholder="Search Category, Brand or Product Name" class="form-control">
    
  </div>

  <div id="result" style="padding: 2vh; margin: 2vh;">

  </div>
      <center>
     <?php 
     // echo $this->pagination->create_links(); ?>
    </center>
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