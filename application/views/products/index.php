</center>
  <h2 align="center"><?= $title ?></h2><br>
  <div class="row">
    <div class="input-group mb-3 shadow p-2 mb-2 bg-white rounded">
      <div class="input-group-prepend" >
        <span class="input-group-text bg-secondary text-light" id="basic-addon1"><i class='fas fa-search'></i> &nbsp;Search</span>
      </div>
      <input type="text" name="search_text" id="search_text" placeholder="Search Category, Brand or Product Name" class="form-control">
    </div>
  </div>

  <div id="result" style="margin-top: 2vh">

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