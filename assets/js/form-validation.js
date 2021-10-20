(function($) {
  
  $(function() {
    // validate the comment form when it is submitted
    $("#commentForm").validate({
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    // validate Menu Entry 
    $("#add_menu").validate({
      rules: {
        name: {
          required: true
        },
        title: {
          required: true
        },
        slug: {
          required: true
        },
        meta_keyword: {
          required: true
        },
        meta_description: {
          required: true
        },
        status:{
          required: true
        }
      },
      messages: {
        name: {
          required: "Please enter a menu name",
        },
        title: {
          required: "Please enter a menu title",
        },
        slug: {
          required: "Please enter a slug",
        },
        meta_keyword: {
          required: "Please provide a meta keyword",
        },
        meta_description: {
          required: "Please provide a meta description",
        },
        status: {
          required: "Please select status",
        }
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    // End validate Menu Entry 

    // validate Edit Menu Entry 
    $("#edit_menu").validate({
      rules: {
        name: {
          required: true
        },
        title: {
          required: true
        },
        slug: {
          required: true
        },
        meta_keyword: {
          required: true
        },
        meta_description: {
          required: true
        },
        status:{
          required: true
        }
      },
      messages: {
        name: {
          required: "Please enter a menu name",
        },
        title: {
          required: "Please enter a menu title",
        },
        slug: {
          required: "Please enter a slug",
        },
        meta_keyword: {
          required: "Please provide a meta keyword",
        },
        meta_description: {
          required: "Please provide a meta description",
        },
        status: {
          required: "Please select status",
        }
      },

      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    // End validate Edit Menu Entry 

    // validate Slider Entry 
    $("#add_slider").validate({
      rules: {
        slider_heading: {
          required: true
        },
        slider_description: {
          required: true
        },
        slider_status:{
          required: true
        }
      },
      messages: {
        slider_heading: {
          required: "Please enter a slider heading",
        },
        slider_description: {
          required: "Please enter a slider description",
        },
        slider_status: {
          required: "Please select status",
        }
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    // End validate Slider Entry 
   

      // validate Destination Category Entry 
    $("#add_destination_category").validate({
      rules: {
        destination_category_name: {
          required: true
        },
        destination_category_title: {
          required: true
        },
        slug: {
          required: true
        },
        destination_category_description: {
          required: true
        },
        image:{
          required:true
        },
        meta_keyword: {
          required: true
        },
        meta_description: {
          required: true
        },
        description_category_status:{
          required: true
        }
      },
      messages: {
        destination_category_name: {
          required: "Please enter a category name",
        },
        destination_category_title: {
          required: "Please enter a category title",
        },
        slug: {
          required: "Please enter a category slug",
        },
        destination_category_description: {
          required: "Please enter a category description",
        },
        image:{
          required: "Please drop a image",
        },
        meta_keyword: {
          required: "Please provide a meta keyword",
        },
        meta_description: {
          required: "Please provide a meta description",
        },
        description_category_status: {
          required: "Please select status",
        }
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    // End validate Destination Category Entry 


     // Edit validate Destination Category Entry 
    $("#edit_destination_category").validate({
      rules: {
        destination_category_name: {
          required: true
        },
        destination_category_title: {
          required: true
        },
        slug: {
          required: true
        },
        destination_category_description: {
          required: true
        },
        image:{
          required:true
        },
        meta_keyword: {
          required: true
        },
        meta_description: {
          required: true
        },
        description_category_status:{
          required: true
        }
      },
      messages: {
        destination_category_name: {
          required: "Please enter a category name",
        },
        destination_category_title: {
          required: "Please enter a category title",
        },
        slug: {
          required: "Please enter a category slug",
        },
        destination_category_description: {
          required: "Please enter a category description",
        },
        image:{
          required: "Please drop a image",
        },
        meta_keyword: {
          required: "Please provide a meta keyword",
        },
        meta_description: {
          required: "Please provide a meta description",
        },
        description_category_status: {
          required: "Please select status",
        }
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });

    // End validate Edit Destination Category Entry 
  });
})(jQuery);