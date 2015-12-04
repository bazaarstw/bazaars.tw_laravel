$(document).ready(function(){
    if (store_id != null) {
        $.ajax({
            async : false,
            url : "/ctrl/Controller.php",
            type: 'POST',
            data: {
                act: 'store_getDetail',
                storeId: store_id
            },
            dataType : "json", 
            success : function(result) {  
                var farmer = result.farmer;
                console.log(result.farmer);
                var farmerHtml = $(".link-farmers").html();
                for (var idx = 0 ; idx < farmer.length ; idx++) {
                    $(".link-farmers").append(farmerHtml);
                    
                    $(".link-farmers li").last().find("a").attr("href", "/farmer/"+farmer[idx].farmerId);
                    $(".link-farmers li").last().find(".farmer-name").html(farmer[idx].name);
                    $(".link-farmers li").last().find("img").attr("title", farmer[idx].name);
                    if(farmer[idx].farmerImg != null && farmer[idx].farmerImg != "") {
                        $(".link-farmers li").last().find("img").attr("src", "/"+farmer[idx].farmerImg);
                    } else {
                        $(".link-farmers li").last().find("img").attr("src", "/_files/farmers/farmer_default.jpg");
                    }
                }
                $(".link-farmers li").first().hide();
            },
            error : function(jqXHR, textProject, errorThrown) {
                var errorString= 'HTTP project code: ' + jqXHR.project + '\n' + 'textProject: ' + textProject + '\n' + 'errorThrown: ' + errorThrown;
                    errorString += 'HTTP message body (jqXHR.responseText): ' + '\n' + jqXHR.responseText;
                    
                $("#footerFrame .system-msg").addClass("error").text(errorString).show();
            }
        });
    }
});
