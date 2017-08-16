var emailId=''

$(document).ready(function() {
    $('#viewTickets').click(function(){

        bootbox.prompt("Please enter your email id", function(result){
            var  emailId = result;
            if(emailId==null || emailId == "" || emailId == undefined){
                bootbox.alert('Please enter your email id!');
            }else{
                document.cookie = "emailId = " + emailId;
                window.location.href = $(".viewTicketLink").attr('data-href');
            }

        });

    });

});

