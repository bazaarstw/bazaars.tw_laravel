$(document).ready(function(){
    $(".aj_workSignCancel").on("click", function() {
        $.ajax({
            async : false,
            url : "/ctrl/Controller.php",
            type : "POST",
            dataType : "json", 
            data: {
                act: 'work_signCancel',
                workId: work_id
            },
            success : function(result) {  
                alert(result.msg);
                if (result.isSuc) location.reload();
            },
            error : function(jqXHR, textProject, errorThrown) {
                var errorString= 'HTTP project code: ' + jqXHR.project + '\n' + 'textProject: ' + textProject + '\n' + 'errorThrown: ' + errorThrown;
                    errorString += 'HTTP message body (jqXHR.responseText): ' + '\n' + jqXHR.responseText;
                    
                $("#footerFrame .system-msg").addClass("error").text(errorString).show();
            }
        });
    });
    
    $(".aj_workSignUp").on("click", function() {
        var formObj = $(".form_workSign");   

        $.ajax({
            async : false,
            url : "/ctrl/Controller.php",
            type : "POST",
            dataType : "json", 
            data : $(formObj).serialize(),
            success : function(result) {  
                alert(result.msg);
                if (result.isSuc) location.reload();
            },
            error : function(jqXHR, textProject, errorThrown) {
                var errorString= 'HTTP project code: ' + jqXHR.project + '\n' + 'textProject: ' + textProject + '\n' + 'errorThrown: ' + errorThrown;
                    errorString += 'HTTP message body (jqXHR.responseText): ' + '\n' + jqXHR.responseText;
                    
                $("#footerFrame .system-msg").addClass("error").text(errorString).show();
            }
        });
    });
});
