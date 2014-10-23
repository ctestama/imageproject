//custom javascript and jquery will go here

//function which runs on registform submittal
function regSub(){

    var fname= $("#fname").val();
    var lname= $("#lname").val();
    var uname= $("#username").val();
    var email= $("#email").val();
    var password= $("#pword").val();
    var formsub= $("#formsubmitted").val();
    var dataString = "fname="+fname+"&lname="+lname+"&uname="+ uname +"&email="+email+ "&password="+ password+"&formsubmitted="+formsub;
    $.ajax( {
        type: "POST",
        url: "includes/regprocess.php",
        data:  dataString,
        //cache: false,
        success: function(result) {
            //this needs to be completed
        }
    });
}

//function which runs on submittal of Login form
function validLogin(){

       var uname=$('#login_email').val();
       var password=$('#login_password').val();
       var dataString = 'email='+ uname + '&password='+ password;
        $.ajax({
             type: "POST",
             url: "includes/login.php",
             data: dataString,
             success: function(result){
             var result=trim(result);
             
             }
        });

}