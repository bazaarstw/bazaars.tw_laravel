require(['_require_path'], function() {
	require([
			'domReady',
			'conn'
			], function(domReady) {
		domReady(function () {
			$(document).ready(function(){
				var classId = 0;
				
				page = 1;
				classId = $.getUrlParam("classId");
				aj_listItem();
				getListData();
				$(".pageProcess").on("click", function() {
					pageProcess(this);
				});
				$(".aj_itemSearch").on("click", function() {
					page = 1;
					getListData();
				});
				
				function aj_listItem() {
					$(".view_itemSelectList option").remove();
					$(".view_itemSelectList").append('<option value="">全部</option>');
					$.ajax({
						async : false,
						url : "ctrl/Controller.php",
						type: 'POST',
						data: {
							act: 'food_getListItem',
							classId: classId
						},
						dataType : "json", 
						success : function(result) {  
							for (idx = 0 ; idx < result.length ; idx++) {
								$(".view_itemSelectList").append('<option value="'+result[idx]["foodItemId"]+'">'+result[idx]["itemName"]+'</option>');
							}
						},
						error : function(jqXHR, textProject, errorThrown) {
							alert('HTTP project code: ' + jqXHR.project + '\n' + 'textProject: ' + textProject + '\n' + 'errorThrown: ' + errorThrown);
							alert('HTTP message body (jqXHR.responseText): ' + '\n' + jqXHR.responseText);
						}
					});
					
					$(".view_itemSelectList").on("change", function() {
						getListData(1);
					});
				}
				
				function getListData() {
					$.ajax({
						async : false,
						url : "ctrl/Controller.php",
						type: 'POST',
						data: {
							act: 'food_getFarmerList',
							page: page,
							pageNumber: 10,
							classId: classId,
							itemId: $(".view_itemSelectList").val(),
							keyword: $(".view_itemKey").val()
						},
						dataType : "json", 
						success : function(result) {  
							//viewJSON(result);
							var idx = 0;
							$("#farmers-list li").each(function() {
								if (idx > 0) $(this).remove();
								idx++;
							});
							
							if (result.list.length > 0) {
								$(".view_parentFoodClassName").html("location: " + result.list[0]["parentClassPath"]);
							} else {
								$(".view_parentFoodClassName").html("");
							}
							
							var farmer = $("#farmers-list").html();
							for (idx = 0 ; idx < result.list.length ; idx++) {
								$("#farmers-list").append(farmer);
								$("#farmers-list li").last().find("a").attr("href","farmer.html?farmerId="+result.list[idx]["farmerId"]);
								$("#farmers-list li").last().find(".name").html(result.list[idx]["name"]);
								$("#farmers-list li").last().show();
							}
							$("#farmers-list li").first().hide();
							
							$.showPageer(10, result.listCnt);
						},
						error : function(jqXHR, textProject, errorThrown) {
							alert('HTTP project code: ' + jqXHR.project + '\n' + 'textProject: ' + textProject + '\n' + 'errorThrown: ' + errorThrown);
							alert('HTTP message body (jqXHR.responseText): ' + '\n' + jqXHR.responseText);
						}
					});
				}
				
			});
		});
	});
});
