require(['../../_js/_require_path'], function() {
	require([
			'domReady',
			'admconn',
			'dataTables_bootstrap'
			], function(domReady) {
		domReady(function () {
			page = 1;
			
			$(document).ready(function(){
				$('#dataTables-store').DataTable({
					"language": {
						"emptyTable":     "No data available in table",
						"info":           "顯示第 _START_ 筆到第 _END_ 筆，共 _TOTAL_ 頁",
						"infoEmpty":      "Showing 0 to 0 of 0 entries",
						"infoFiltered":   "(filtered from _MAX_ total entries)",
						"infoPostFix":    "",
						"thousands":      ",",
						"lengthMenu":     "顯示第 _MENU_ 頁",
						"loadingRecords": "Loading...",
						"processing":     "Processing...",
						"search":         "搜尋(Search)：",
						"zeroRecords":    "沒有搜尋到符合的項目 (No matching records found)",
						"paginate": {
							"first":      "第一頁",
							"last":       "最後頁",
							"next":       "下一頁",
							"previous":   "上一頁"
						},
						"aria": {
							"sortAscending":  ": activate to sort column ascending",
							"sortDescending": ": activate to sort column descending"
						}
					},
					"responsive": true,
					"processing": true,
					"data": getListData(),
					"columns": [
						{ title: "店家照片" },
						{ title: "店家姓名" },
						{ title: "功能" }
					]
				});

				function getListData() {
					var listData = [];
					$.ajax({
						async : false,
						url : "../ctrl/Controller.php",
						type: 'POST',
						data: {
							act: 'store_getAllData'
						},
						dataType : "json", 
						success : function(result) {  
							var rtnresult = [];
							for (idx = 0 ; idx < result.list.length ; idx++) {
								var listCell = [];
								listCell.push("");
								listCell.push(result.list[idx]["storeName"]);
								listCell.push("<a href='storeDetail.html?storeId="+result.list[idx]["storeId"]+"'>編輯</a> <a href='/store_detail.html?storeId="+result.list[idx]["storeId"]+"' target='_blank'>檢視</a>");
								rtnresult.push(listCell);
							}
							//alert(JSON.stringify(rtnresult));
							listData = rtnresult;
						},
						error : function(jqXHR, textProject, errorThrown) {
							alert('HTTP project code: ' + jqXHR.project + '\n' + 'textProject: ' + textProject + '\n' + 'errorThrown: ' + errorThrown);
							alert('HTTP message body (jqXHR.responseText): ' + '\n' + jqXHR.responseText);
						}
					});
					return listData;
				}
				
			});
		});
	});
});
