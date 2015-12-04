$(document).ready(function(){
    if (farmer_id != null) {
        $.ajax({
            async : false,
            url : "/ctrl/Controller.php",
            type: 'POST',
            data: {
                act: 'farmer_getDetail',
                farmerId: farmer_id 
            },
            dataType : "json", 
            success : function(result) {  
                var item = result.item;
                var itemHtml = $(".list-offerfoods").html();
                for (var idx = 0 ; idx < item.length ; idx++) {
                    $(".list-offerfoods").append(itemHtml);
                    $(".list-offerfoods li").last().find(".view_itemName").text(item[idx].itemName);
                }
                $(".list-offerfoods li").first().hide();
                
                var store = result.store;
                var storeHtml = $(".link-stores").html();
                for (var idx = 0 ; idx < store.length ; idx++) {
                    $(".link-stores").append(storeHtml);
                    $(".link-stores li").last().find("a").attr("href", "/store/"+store[idx].storeId);
                    if(store[idx].storeImg != null && store[idx].storeImg != "") {
                        $(".link-stores li").last().find("img").attr("src", "/"+store[idx].storeImg);
                    } else {
                        $(".link-stores li").last().find("img").attr("src", "/_files/stores/stores_default.jpg");
                    }
                    $(".link-stores li").last().find("img").attr("title", store[idx].storeName);
                    $(".link-stores li").last().find(".store-name").html(store[idx].storeName);
                }
                $(".link-stores li").first().hide();
            },
            error : function(jqXHR, textProject, errorThrown) {
                //��~�^���r��
                var errorString= 'HTTP project code: ' + jqXHR.project + '\n' + 'textProject: ' + textProject + '\n' + 'errorThrown: ' + errorThrown;
                    errorString += 'HTTP message body (jqXHR.responseText): ' + '\n' + jqXHR.responseText;
                    
                $("#footerFrame .system-msg").addClass("error").text(errorString).show();
            }
        });
    }
    
});
