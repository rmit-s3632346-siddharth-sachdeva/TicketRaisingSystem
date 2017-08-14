var emailId=''

$(document).ready(function() {
    $('#login').click(function(){
        debugger;
        bootbox.prompt("Please enter your email id", function(result){
            var  emailId = result;
            document.cookie = "emailId = " + emailId;
            window.location.href = $(".loginLink").attr('data-href');
        });

    });

});

