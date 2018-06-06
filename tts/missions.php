<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>无线Android部门禅道任务汇总</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!--引入css-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

<!--引入JavaScript-->
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

</head>
<body>

	<table id="example" class="display">
		<thead>
        <tr>
            <th>id</th>
            <th>任务名称</th>
						<th>所属</th>
						<th>状态</th>
						<th>迭代</th>
						<th>截止日期</th>
						<th>耗时</th>
        </tr>
    </thead>
	</table>
	<!--初始化代码-->
	<script>
	     $(document).ready(function() {
				 var data = <?php
				 //引入通用php
				 include '../infoCommon.php';
				 $db = getDBObject();
				 $datas = $db->select('table_zentao_missions','*');
				 echo json_encode($datas) . ';';
				 ?>
	       $('#example').DataTable({
					 "paging":false,
					 "order":[[5, 'desc']],
					 data: data,
        		columns: [
            	{ data: 'id' },
            	{ data: 'name' },
            	{ data: 'user' },
							{ data: 'status' },
							{ data: 'Iteration' },
							{ data: 'deadline' },
							{ data: 'consumetime' }
        		],
						columnDefs:[{
							targets: 3,
							render: function(data, type, row, meta) {
								if (data == "已完成") {
									return "<label style='color:#0f0'>"+data+"</label>";
								}
								else {
									return "<label style='color:#f00'>"+data+"</label>";
								}
							}
						}]
				 });
	      });
	</script>
</body>
</html>
