
$(document).ready(function(){
    $("body").on("click",".add_new_frm_field_btn2", function (){ 
      console.log("clicked");
      var index = $(".form_field_outer").find(".form_field_outer_row").length + 1;
      $(".form_field_outer").append(`
      <div class="row form_field_outer_row">
          <div class="form-group col-sm-6">
              <input type="file" name="photo[]" data-index="${index}" id="news_img_${index}" class='form-control w_90 form-control-sm' accept="image/*" required />
              <div class='newsamafoto'><input type='text' name='image_name[]' id='image_name_${index}'></div>
              <input type='hidden' name='newsArrayCounter[]' value='${index}' id='newsArrayCounter_${index}'>
          </div>
          <div class="form-group col-sm-4">
              <textarea name="paragraph[]" id="p_${index}" class="form-control" 
              placeholder="Type Paragraph details" value="" cols="30" rows="2" required="required"
              data-validation-required-message="Please Fill this Field"></textarea>
          </div>
          <div class="form-group col-sm-2 add_del_btn_outer">
              

              <button class="btn_round remove_node_btn_frm_field" disabled>
              <i class="fas fa-trash-alt"></i>
              </button>
          </div>
      </div>
        `);

      $(".form_field_outer").find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false);
      $(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true);
    });
 });

// insert photos only
$(document).ready(function(){
  $("body").on("click",".add_new_frm_field_btn3", function (){ 
    console.log("clicked");
    var index = $(".form_field_outer").find(".form_field_outer_row").length + 1;
    $(".form_field_outer").append(`
          <div class="row form_field_outer_row">
              <div class="form-group col-sm-10">
              <input type="file" name="photo[]" id="news_img_${index}" data-index="${index}" class='form-control w_90 form-control-sm' accept="image/*" required />
              <div class='newsamafoto'><input type='text' name='image_name[]' id='image_name_${index}'></div>
              <input type='hidden' name='newsArrayCounter[]' value='${index}' id='newsArrayCounter_${index}'>
          </div>
              <div class="form-group col-sm-2 add_del_btn_outer">
                  

                  <button class="btn_round remove_node_btn_frm_field" disabled>
                  <i class="fas fa-trash-alt"></i>
                  </button>
              </div>
          </div>
      `);

    $(".form_field_outer").find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false);
    $(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true);
  });
});

// insert paragraph only
$(document).ready(function(){
  $("body").on("click",".add_new_frm_field_btn", function (){ 
    console.log("clicked");
    var index = $(".form_field_outer").find(".form_field_outer_row").length + 1;
    $(".form_field_outer").append(`
          <div class="row form_field_outer_row">
              <div class="form-group col-sm-10">
                  <textarea name="paragraph[]" id="p_${index}" class="form-control" 
                  placeholder="Type Paragraph details" value="" cols="30" rows="2" required="required"
                  data-validation-required-message="Please Fill this Field"></textarea>
                  <input type='hidden' name='newsArrayCounter[]' value='${index}' id='newsArrayCounter_${index}'>
              </div>
              <div class="form-group col-sm-2 add_del_btn_outer">
                  

                  <button class="btn_round remove_node_btn_frm_field" disabled>
                  <i class="fas fa-trash-alt"></i>
                  </button>
              </div>
          </div>
      `);

    $(".form_field_outer").find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false);
    $(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true);
  });
});


    ///======Clone method
$(document).ready(function(){
    $("body").on("click", ".add_node_btn_frm_field", function (e) {
      var index = $(e.target).closest(".form_field_outer").find(".form_field_outer_row").length + 1;
      var cloned_el = $(e.target).closest(".form_field_outer_row").clone(true);

      $(e.target).closest(".form_field_outer").last().append(cloned_el).find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false);

      $(e.target).closest(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true);

    
      //change id
      $(e.target).closest(".form_field_outer").find(".form_field_outer_row").last().find("input[type='text']").attr("id", "mobileb_no_"+index);

      $(e.target).closest(".form_field_outer").find(".form_field_outer_row").last().find("select").attr("id", "no_type_"+index);

      console.log(cloned_el);
      //count++;
    });
 });


$(document).ready(function(){
    //===== delete the form fieed row
    $("body").on("click", ".remove_node_btn_frm_field", function () {
      $(this).closest(".form_field_outer_row").remove();
      console.log("success");
    });
  });

//   image crop Js
$(document).ready(function(){
    // Function to initialize Croppie
    function initializeCroppie(element) {
      return $(element).croppie({
          viewport: {
              width: 660,
              height: 317,
              type: "square"
          },
          boundary: {
              width: 760,
              height: 417
          }
      });
  }

  // Initialize Croppie for the first image
  var $image_crop = initializeCroppie("#crop_view");

  // Function to handle file input change event
  $("body").on("change", "input[type='file']", function() {
      var reader = new FileReader();
      var $this = $(this);
      reader.onload = function(event) {
          // var $currentImageCrop = initializeCroppie("#crop_view_" + $this.data('index'));
          $image_crop.croppie('bind', {
              url: event.target.result
          });
          $("#cropModal").modal('show');
      }
      reader.readAsDataURL(this.files[0]);
  });

  // Function to handle cropping and uploading
  $("#btn_crop_upload").click(function() {
      $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
      }).then(function(response) {
          $.ajax({
              url: "upload_crop_image.php",
              type: "POST",
              data: {
                  'image': response
              },
              success: function(res) {
                  console.log(res);
                  $("#cropModal").modal('hide');
                  var valueAssigned = false; // Flag variable to track if value is already assigned
                  $("input[type='text']").each(function(index, element) {
                      if (!valueAssigned && $(element).attr('id').startsWith('image_name_') && $(element).val() == '') {
                          $(element).val(res);
                          valueAssigned = true; // Set the flag to true once value is assigned
                      }
                  });
                  $("#img_result").append("<div class='col-sm-3' style='height:70px ; width:70px; margin-bottom: 10px;'><div class='mt-2 mb-4' style='height:100% ; width:100%; display: flex;flex-wrap: wrap;'><img src='img/uploads/" + res + "' style='height:100% ; width:100%;'></div></div>");
              },
              error: function(xhr, status, error) {
                  console.error(error);
              }
          });
      });
  });
  });  

// random newscode
function generateNewsCode() {
  var currentDate = new Date();
  var mm = currentDate.getMonth() + 1; // Months are zero-based
  var dd = currentDate.getDate();
  var yy = currentDate.getFullYear();

  // Format mm/dd/yy
  var formattedDate = yy + '' + mm +''+ dd;
  var randomNumber = Math.floor(Math.random() * (10000 - 1000 + 1)) + 1000;
  return 'News_' + randomNumber + '_' + formattedDate;
}

// Usage:
var newscode = generateNewsCode();
console.log(newscode); 

// Assign newscode to the field with id 'newscode'
$('#newscode').val(newscode);



