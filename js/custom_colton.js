//custom javascript and jquery will go here
$( document ).ready(function() {
   $('#img_slide').slider()
    .on('slide', function(ev){
     $('#slide_view').val(ev.value);
  });
});




function image_grab(img) {
      var canvas = document.getElementById('image_pop');
      var context = canvas.getContext('2d');
      var image = new Image();

      image.onload = function() {
        $(canvas).attr({height: this.height, width: this.width});
        context.drawImage(image, 0, 0);
        console.log(this);
        console.log(canvas);
      };

    image.src = img;

    $('#edit_container').slideDown();

}



//function which runs on registform submittal
function regSub(){
    var action = "register";
    var fname= $("#fname").val();
    var lname= $("#lname").val();
    var email= $("#email").val();
    var password= $("#pword").val();
    var formsub= $("#formsubmitted").val();
    var dataString = "fname="+fname+"&lname="+lname+"&email="+email+ "&password="+ password+"&action=" +action;
    $.ajax( {
        type: "POST",
        url: "includes/user_action.php",
        data:  dataString,
        //cache: false,
        success: function(result) {
            //this needs to be completed
            if(result=="Success") {
                location.reload();
            } else {
                $('#message').html(result);
            }
        }
    });
}

//function which runs on submittal of Login form
function validLogin(){
    var action = 'login';
    var email=$('#login_email').val();
    var password=$('#login_password').val();
    var dataString = "email="+ email + "&password="+ password +"&action=" +action;
     $.ajax({
             type: "POST",
             url: "includes/user_action.php",
             data: dataString,
             success: function(result){
                if(result=="Success") {
                    location.reload();
                } else {
                    $('#message2').html(result);
                }
             }
    });

}

function logout(){
    var action = "logout";
    var dataString = 'action=' +action;
     $.ajax({
             type: "POST",
             url: "includes/user_action.php",
             data: dataString,
             success: function(result) {
                location.reload();  
             }
    });

}