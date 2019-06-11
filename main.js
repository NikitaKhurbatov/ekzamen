$(function($) {
    
    
    $("[name=phone]").mask("+7 (999) 999-99-99");
    
    
    
});


function SendMail(form) {
        
    var name = $(form).find("[name=name]");
    var email = $(form).find("[name=email]");
    var phone = $(form).find("[name=phone]");
    var message = $(form).find("[name=message]");
    var type = $(form).find("[name=type]")
    var people = $(form).find("[name=people]")
    var type1 = $(form).find("[name=type1]")
    var day = $(form).find("[name=day]")
    var date = $(form).find("[name=date]")
    


    $.post("/mail.php", {
        name : name.val(),
        email : email.val(),
        phone : phone.val(),
        message : message.val(),
        region: region.val(),
        people: people.val(),
        type: type.val(),
        day: day.val(),
        date: date.val()
    }, function(data) {
        alert(Письмо успешно отправлено);

        $(form).find("[id]").val("");
    });

    return false;
}
