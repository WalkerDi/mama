<body>
	<div id="main">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-title">
							<div class="span10">
								<h3>
									<i class="icon-table"></i>服务管理
								</h3>
							</div>
							<div class="span2">
								<a class="btn" href="Javascript:window.history.go(-1)">返回</a>
							</div>
						</div>						
							</form>
								<div class="row-fluid" style="margin: 10px;">									
									<div class="pull-left">
										<a class="btn" href="/mama/item/add">新增服务</a>
									</div>
									<div class="pull-left" style="margin-left: 40px;">
										<a class="btn" href="javascript:location.reload()">刷新</a>
									</div>
								</div>						
							<div class="row-fluid dataTables_wrapper">
								<form action="http://www.weimob.com/plus/formajax.php"
									method="post" class="form-horizontal">
									<table id="listTable"
										class="table table-bordered table-hover  dataTable">
										<thead>
											<tr>
												<th>服务名称</th>
												<th>价格</th>
												<th>服务描述</th>																					
												<th>创建时间</th>																								
												<th>操作</th>
											</tr>
										</thead>
										<?php foreach ($item_model as $_V){?>
										<tbody>									
											<tr>												
												<td><?php echo $_V['name'];?></td>
												<td><?php echo $_V['price'];?></td>
												<td><?php echo StrCut::truncate_utf8_string($_V['description'],15);?></td>												
												<td><?php echo $_V['create_time'];?></td>																																																																						
												<td>																						
												<a href="/mama/item/update/id/<?php echo $_V['id'];?>" class="btn" title="编辑信息"><i></i>编辑</a>  
												<a href="javascript:;" onclick="DeleteItem(<?php echo $_V['id'];?>)" class="btn" title="删除信息"><i></i>删除</a>												
												</td>
											</tr>											
										</tbody>
										<?php } ?>
									</table>
								</form>
								<div class="dataTables_paginate paging_full_numbers">
									<span> </span>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script type="text/javascript">

	function DeleteItem(id){
		if(confirm('确定删除该服务信息吗？')){
			$.ajax({
				url:'/mama/item/delete/id/'+id,
				type:'post',
				success:function(res){
					if(res.code===0){
						alert('已删除该服务信息！！');
						window.location.reload();
					}
					else{
						alert(res.msg);
					}     
				}     
				
			});
		}

	}
</script>
</body>
</html>