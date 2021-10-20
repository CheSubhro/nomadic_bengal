 
         
  </div>
    <!-- page-body-wrapper ends -->
  </div>
  
  <!-- container-scroller -->

 <!-- plugins:js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
  <script src="<?php echo base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url();?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo base_url();?>assets/vendors/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendors/tinymce/themes/modern/theme.js"></script>
  <script src="<?php echo base_url();?>assets/vendors/summernote/dist/summernote-bs4.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url();?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>assets/js/misc.js"></script>
  <script src="<?php echo base_url();?>assets/js/settings.js"></script>
  <script src="<?php echo base_url();?>assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url();?>assets/vendors/lightgallery/js/lightgallery-all.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/dashboard.js"></script>
  <script src="<?php echo base_url();?>assets/js/data-table.js"></script>
  <script src="<?php echo base_url();?>assets/js/modal-demo.js"></script>
  <script src="<?php echo base_url();?>assets/js/editorDemo.js"></script>
  <script src="<?php echo base_url();?>assets/js/dropify.js"></script>
  <script src="<?php echo base_url();?>assets/js/form-repeater.js"></script>
  <script src="<?php echo base_url();?>assets/js/formpickers.js"></script>
  <script src="<?php echo base_url();?>assets/js/iCheck.js"></script>
  <script src="<?php echo base_url();?>assets/js/select2.js"></script>
  <script src="<?php echo base_url();?>assets/js/form-validation.js"></script>
  <script src="<?php echo base_url();?>assets/js/bt-maxLength.js"></script>
  <script src="<?php echo base_url();?>assets/js/init-tinymce.js"></script>
  <script src="<?php echo base_url();?>assets/js/file-upload.js"></script>
  <script src="<?php echo base_url();?>assets/js/light-gallery.js"></script>
  <script src="<?php echo base_url();?>assets/js/alerts.js"></script>
  <script src="<?php echo base_url();?>assets/js/avgrund.js"></script>


  
  <script>
      $(document).on('keyup','#category_slug', function () {
      if (this.value.match(/[^a-zA-Z0-9]/g)) {
      this.value = this.value.replace(/[^a-zA-Z0-9]/g, '-');
      }
      });
  </script>
  <!----------------------- CHANGE PASSWORD ----------------------------------->
<script>
    function change_pass()
    {


        if($("#password").val() == "" ){
            $("#password").focus();
            $("#er2").html("Please, enter new password !");
            return false;
        }else{
            $("#er2").html("");
        }

        if($("#con_pass").val() == "" ){
            $("#con_pass").focus();
            $("#er3").html("Please, enter confirm password !");
            return false;
        }else{
            $("#er3").html("");
        }

        if($("#password").val()!=$("#con_pass").val()){

            $("#con_pass").focus();
            $("#er3").html("password and confirm password does not match !");
            return false;
        }else{
            $("#er3").html("");


        }

    }
</script>
<!----------------------- CHANGE PASSWORD -----------------------------------> 
   

  <!-- End custom js for this page-->

  <script>
    $(document).on('change', 'select[id^="destination_category_id"]', function (e) {
        e.preventDefault();
        var destination_category_id = $('#destination_category_id').val();

        $.ajax({
            type:"post",
            url:"<?php echo base_url(); ?>superpanel/destination_place_item_brief/ajax_destination",
            data:{destination_category_id:destination_category_id},
            success: function(data) {
                console.log(data);
                data = JSON.parse(data);
                
                let dropdown = $('#destination_place_item');
                dropdown.empty();
                dropdown.append('<option value="" disabled></option>');
                dropdown.prop('selectedIndex', 0);
                
                $.each(data, function(i, item) {
                dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
                });
                
            }
        });
      });
</script>
   
  </body>
  </html>