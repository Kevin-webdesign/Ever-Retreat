
let password = document.getElementById('password');
let repassword = document.getElementById('repassword');
function ShowPassword(){
  if (password.type === "password" && repassword.type === "password"){
    password.type = "text";
    repassword.type = "text";
		// console.log("changed");
  }else{
    password.type = "password";
    repassword.type = "password";
  }
}

function checkUsername(){
  let username = $('#username').val();
  let minLength = 6;
  if(username.length < minLength){
    $('#username_check').html("Username must have atleast 6 characters");
      $('#username_check').css('color', 'red');
      $('#username_check').css('display', 'inline');
    $('#register').prop('disabled', true);
  }else if(username.length >= minLength){
    $('#username_check').html("");
      $('#username_check').css('display', 'none');
    $('#register').prop('disabled', false);
  }else{
      $('#register').prop('disabled', false);
  }

}
function isPasswordMAtch(){
  let strengthbar = $('#meter').val();
  let password = $('#password').val();
  let repassword = $('#repassword').val();
  let minLength = 8;
  let strength = 0;

  if(password.length < minLength){
    $('#check').html("Password must have atleast 8 characters");
    $('#check').css('color', 'red');
    $('#register').prop('disabled', true);
  }else{
    if(password != repassword){
      $('#check').html("Passwords not match");
      $('#check').css('color', 'red');
      $('#register').prop('disabled', true);
    }else{
      if(password.match(/[a-b]+/) && password.match(/[0-9]+/) && password.match(/[~(`!@.&*>|\<$%^/?:-;}+=]+/)){
        $('#check').html("Strong Passwords match");
        $('#check').css('color', 'blue');
        $('#register').prop('disabled', false);
      }else{
        $('#check').html("<ul>Password must contain <li>Characters[a-b]</li><li>Numbers[0-9]</li><li>Symbols[~(`!@.&*>|\<$%^/?:-;}+=]</li></ul>");
        $('#check').css('color', 'red');
        $('#register').prop('disabled', true);
      }
    }
  }

    
}
$(document).ready(function(){
  $('#repassword').keyup(isPasswordMAtch);
  $('#password').keyup(isPasswordMAtch);
  $('#username').keyup(checkUsername);
  $('#password').keyup(checkUsername);
  $('#repassword').keyup(checkUsername);
  

  $('#username').on('blur', function (){
    let username = $(this).val().trim();
    if(username != ''){
      $.ajax({
      url: "controller/check_user.php",
      data: {username: username},
      type: "POST",
      success: function(data){
        $("#username_check").html(data);
        $('#username_check').css('display', 'inline');
      }
    });

  }else{
    $("#username_check").html("Loading ...");
  }
  });

});