   var ck_email =   /[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$/;   
    var par= /[789][0-9]{9}/;
    function validate(form){
 
    var email = form.email.value;
    var password = form.password.value;
    var errors = [];
     if (!ck_email.test(email)) {
 

      errors[errors.length] = "You must enter a valid email address.";
     }
     else if(email.length >40)
     {
       errors[errors.length] = "Email address no more then 40 letters";
     }
     if (password=='') {
      errors[errors.length] = "You must enter the password ";
     }

     if (errors.length > 0) {        
      reportErrors(errors);
      return false;
     }
      return true;
    }

   function reportErrors(errors){
     var msg = "Please Enter Valide Data...\n";
     for (var i = 0; i<errors.length; i++) {
     var numError = i + 1;
      msg += "\n" + numError + ". " + errors[i];
    }
     alert(msg);
    }

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function addrecordvalidate(form){
      var personname = form.personname.value;
    var mobile = form.mobile.value;

    var errors = [];

     if (personname=='') {
      errors[errors.length] = "You must enter the  Preson Name ";
     }
     else if(personname.length >20)
     {
      errors[errors.length] = "Person name no more then 20 letters ";
     }

      if (!par.test(mobile)) {
      errors[errors.length] = "You must enter a valid mobile no.";
     }
     else if(mobile.length > 10)
    {
      errors[errors.length] = "Mobile No. should be in 10 characters only";
    }

     if (errors.length > 0) {        
      reportErrors(errors);
      return false;
     }
      return true;

}


function resetpdvalidate(form){

    var currentpassword = form.currentpassword.value;
    var password = form.password.value;
    var cpassword = form.cpassword.value;
    var errors = [];

     if (currentpassword=='') {
      errors[errors.length] = "You must enter the  Current Password ";
     }
     if (password==''||cpassword=='') {
      errors[errors.length] = "You must enter the  new password and confirm password ";
     }
     else if(password!=cpassword)
     {
      errors[errors.length] = "New password and confirm password Don't Match";
     }

     if (errors.length > 0) {        
      reportErrors(errors);
      return false;
     }
      return true;

    }

    function signupvalidate(form){

    var firstname = form.first_name.value;
    var email = form.email.value;
    var password = form.password.value;
    var cpassword = form.cpassword.value;
    var errors = [];

     if (firstname=='') {
      errors[errors.length] = "You must enter the first name ";
     }
     else if(firstname.length >18)
     {
       errors[errors.length] = "First name no more than 18 letters";
     }


     if (!ck_email.test(email)) {
 

      errors[errors.length] = "You must enter a valid email address.";
     }
     else if(email.length >40)
     {
       errors[errors.length] = "Email address no more then 40 letters";
     }

     if (password==''||cpassword=='') {
      errors[errors.length] = "You must enter the password ";
     }
     else if(password!=cpassword)
     {
      errors[errors.length] = "Passwords Don't Match";
     }

     if (errors.length > 0) {        
      reportErrors(errors);
      return false;
     }
      return true;

    }