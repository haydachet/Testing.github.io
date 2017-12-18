
function submitForm(){
    // Initiate Variables With Form Content

    var name = $("#name").val();
    var email = $("#email").val();
    var line = $("#line").val();
    // var msg_subject = $("#msg_subject").val();


    $.ajax({
        type: "POST",
        url: "php/form-process.php",
        data: "name=" + name + "&email=" + email +"&line="+ line,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                alert(text);
                formError();
                submitMSG(false,text);
             }
        }
    });
    $.ajax({
            url: 'https://script.google.com/macros/s/AKfycbwygaAjNHZfT47QT05HX9ZMfTOkpOnS1No5MVxsbxgDCdxwE7eK/exec',
            method: "GET",
            dataType: "json",
            data: "name=" + name + "&email=" + email +"&line="+ line,
            success: function (text) {
                if (text == "success"){
                    // formSuccess();
                } else {
                    // alert(text);
                    // formError();
                    // submitMSG(false,text);
                }

            }
    })
}

function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Thank you for your registration!");
    window.location.replace("http://kit.edu.kh/jp/thank.php");
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){

    if(valid){
        var msgClasses = "h3 text-center data animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);

}

$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "全ての項目が正しく入力されているかご確認ください?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();

    }
});