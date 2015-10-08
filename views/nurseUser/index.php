<body>
	<div id="main">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-title">
							<div class="span10">
								<h3>
									<i class="icon-table"></i>护士管理
								</h3>
							</div>
							<div class="span2">
								<a class="btn" href="Javascript:window.history.go(-1)">返回</a>
							</div>
						</div>
						<div class="box-content">
							<input type="hidden" value="275044" id="aid" name="aid">
							<form action="/mama/nurseuser/search"
								method="post" class="form-horizontal">
								<div class="row-fluid">
								
									<span class="help-inline">护士查询：</span> 
									<input
										type="text" id="search_content" name="txt" class="input-medium"
										placeholder="请输入手机号或姓名" value=""> 
								
									<button type="submit" class="btn">
										<i></i>查询
									</button>
								</div>
							</form>
								<div class="row-fluid" style="margin: 10px;">									
									<div class="pull-left">
										<a class="btn" href="/mama/nurseuser/add">新增护士</a>
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
												<th>编号</th>
												<th>姓名</th>
												<th>性别</th>
												<th>电话</th>
												<th>年龄</th>
												<th>职称</th>
												<th>星级</th>
												<th>描述</th>																																																																																											
												<th>住址</th>
												<th>头像</th>
												<th>注册时间</th>											
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										foreach ($nurse_model as $_V){
										?>
											<tr>
												<td><?php echo $_V['id'];?></td>
												<td><?php echo $_V['name'];?></td>
												<td><?php if($_V['sex']==0){
															echo "男";
														  }
														  if($_V['sex']==1){
														  	echo "女";
														  }
												?></td>
												<td><?php echo $_V['phone'];?></td>
												<td><?php echo $_V['age'];?>
												</td><td><?php echo $_V['title'];?></td>
												<td><?php echo $_V['level'];?></td>
												
												<td><?php echo StrCut::truncate_utf8_string($_V['description'],10);?></td>																								
												<td><?php echo StrCut::truncate_utf8_string($_V['address'],10);?></td>
												<td><img src ="<?php echo $_V['thumb']?>" width='50px' height='50px'/></td>
												<td><?php echo $_V['create_time'];?></td>												
												<td>												
												<a href="/mama/nurseuser/update/id/<?php echo $_V['id'];?>" class="btn" title="编辑信息"><i></i>编辑</a> 
												<a href="javascript:;" onclick="DeleteNurse(<?php echo $_V['id'];?>)" class="btn" title="删除信息"><i></i>删除</a>												
												<a href="/mama/evaluation/index/id/<?php echo $_V['id'];?>" class="btn" title="评价详情"><i></i>评价详情</a>
												<a href="/mama/duty/index/id/<?php echo $_V['id'];?>" class="btn" title="排班设置"><i></i>排班设置</a>
												</td>
											</tr>
											<?php }?>
										</tbody>
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

function DeleteNurse($id){
	if(confirm('确定删除该护士信息吗？')){
		$.ajax({
			url:'/mama/nurseuser/delete/id/'+$id,
			type:'post',
			success:function(res){
// 				alert(JSON.stringify(res));
				if(res.code===0){
					alert('已删除该护士信息！！');
					window.location.reload();
				}
				else{
					alert(res.msg);
				}     
			}     
			
		});
	}
}
function CheckNurse($status,$id){
	if(confirm('确定改变该护士状态吗？')){
		$.ajax({
			url:'/mama/nurseuser/check/id/'+$id+'/status/'+$status,
			type:'post',
			success:function(res){
//					alert(JSON.stringify(res));
				if(res.code===0){
			    	if(res.data.flag==0){
						alert('改变该护士状态成功！！');
						window.location.reload();
			    	}else{
			    		alert('改变该护士状态失败！！');
						window.location.reload();
			    	}
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