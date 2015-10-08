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
							</form>
								<div class="row-fluid" style="margin: 10px;">
									<div class="pull-left">
										<a class="btn" href="javascript:location.reload()"><i
											class="icon-refresh"></i>刷新</a>
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
											<tr>												
												<td><?php echo $nurse_info['id'];?></td>
												<td><?php echo $nurse_info['name'];?></td>
												<td><?php if($nurse_info['sex']==0){
															echo "男";
														  }
														  if($nurse_info['sex']==1){
														  	echo "女";
														  }
												?></td>
												<td><?php echo $nurse_info['phone'];?></td>
												<td><?php echo $nurse_info['age'];?></td>
												<td><?php echo $nurse_info['title'];?></td>
												<td><?php echo $nurse_info['level'];?></td>
												
												<td><?php echo StrCut::truncate_utf8_string($nurse_info['description'],10);?></td>												
												<td><?php echo StrCut::truncate_utf8_string($nurse_info['address'],10);?></td>
												<td><img src ="<?php echo $nurse_info['thumb']?>" width='50px' height='50px'/></td>
												<td><?php echo $nurse_info['create_time'];?></td>
												<td>												
												<a href="/mama/nurseuser/update/id/<?php echo $nurse_info['id'];?>" class="btn" title="编辑信息"><i></i>编辑</a>  
												<a href="javascript:;" onclick="DeleteNurse(<?php echo $nurse_info['id'];?>)" class="btn" title="删除信息"><i></i>删除</a>
												<a href="/mama/evaluation/index/id/<?php echo $nurse_info['id'];?>" class="btn" title="服务信息"><i></i>评价详情</a>
												<a href="/mama/duty/index/id/<?php echo $nurse_info['id'];?>" class="btn" title="排班设置"><i></i>排班设置</a>
												</td>
											</tr>											
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

	function DeleteNurse(id){
		if(confirm('确定删除该护士信息吗？')){
			$.ajax({
				url:'/mama/nurseuser/delete/id/'+id,
				type:'post',
				success:function(res){
					if(res.code===0){
						alert('已删除该护士信息！！');
						window.location.reload('/mama/nurseuser/index');
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