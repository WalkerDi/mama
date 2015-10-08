<body>
	<div id="main">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-title">
							<div class="span10">
								<h3>
									<i class="icon-table"></i>用户管理
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
												<th>手机号</th>
												<th>微信号</th>																																																										
												<th>描述</th>														
												<th>住址</th>
												<th>状态</th>
												<th>注册时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>									
											<tr>												
												<td><?php echo $customer_info['id'];?></td>
												<td><?php echo $customer_info['name'];?></td>
												<td><?php echo $customer_info['sex']==0? '男' : '女';?></td>
												<td><?php echo $customer_info['phone'];?></td>
												<td><?php echo StrCut::truncate_utf8_string($customer_info['open_id'],5);?></td>																																																										
												<td><?php echo StrCut::truncate_utf8_string($customer_info['description'],15);?></td>												
												<td><?php echo StrCut::truncate_utf8_string($customer_info['address'],15);?></td>
												<td><?php  
														if($customer_info['status']==0){
                                                        	 echo "正常";
														}
														if($customer_info['status']==1){
                                                        	echo '<div style="color:red;">冻结</div>';
                                                    	 }
                                                     ?></td>
												<td><?php echo $customer_info['create_time'];?></td>
												<td>												
													<a class="btn closed" data-bid="5895" href="javascript:;" onclick="CheckCustomer(<?php echo $customer_info['id'];?>,<?php echo $customer_info['status']?>)" title="客户状态"><i></i>冻结/正常</a>
													<a class="btn closed" href="/mama/customer/update/id/<?php echo $customer_info['id'];?>" title="编辑信息"><i></i>编辑</a>  
													<a class="btn closed" href="javascript:;" onclick="DeleteCustomer(<?php echo $customer_info['id'];?>)" title="删除信息"><i></i>删除</a>					
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

function DeleteCustomer(id){
	if(confirm('确定删除该客户信息吗？')){
		$.ajax({
			url:'/mama/customer/delete/id/'+id,
			type:'post',
			success:function(res){
				if(res.code===0){
					alert('已删除该客户信息！！');
					window.location.reload();
				}
				else{
					alert(res.msg);
				}     
			}     
			
		});
	}

}
	function CheckCustomer($id,$status){
		if(confirm('确定改变该客户状态吗？')){
			$.ajax({
				url:'/mama/customer/check/id/'+$id+'/status/'+$status,
				type:'post',
				success:function(res){
					if(res.code===0){
				    	if(res.data.flag==0){
							alert('改变该客户状态成功！！');
							window.location.reload();
				    	}else{
				    		alert('改变该客户状态失败！！');
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