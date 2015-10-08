<body>
	<div id="main">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-title">
							<div class="span10">
								<h3>
									<i class="icon-table"></i>订单管理
								</h3>
							</div>
							<div class="span2">
								<a class="btn" href="Javascript:window.history.go(-1)">返回</a>
							</div>
						</div>
						<div class="box-content">
								<div class="row-fluid" style="margin: 10px;">
								<form action="/mama/order/search"
								method="post" class="form-horizontal">
								<div class="row-fluid">
								
									<span class="help-inline">订单查询：</span> 
										<select  id ="item_name" name="order_status" style ="width:150px">
											<option value ="-1">请选择状态</option>
											<option value ="0">未接单</option>
											<option value ="1">已接单</option>
											<option value ="2">已付款</option>
											<option value ="3">已完成</option>
											<option value ="4">已取消</option>
										</select>
	
									<button type="submit" class="btn">
										<i></i>查询
									</button>
								</div>
							</form>											
									<div class="pull-left">
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
												<th>id</th>
												<th>订单号</th>
												<th>客户姓名</th>
												<th>服务名称</th>
												<th>金额</th>				
												<th>备注</th>	
												<th>地址</th>	
												<th>预约时间</th>	
												<th>服务护士</th>
												<th>状态</th>																			
												<th>选择护士</th>																								
												<th>操作</th>
											</tr>
										</thead>
										<?php 
										foreach ($order_model as $_V){
											
										?>
										<tbody>									
											<tr>		
												<td class="Orderid"><?php echo $_V['id'];?></td>										
												<td><?php echo $_V['order_num'];?></td>
												<td><?php echo $_V['user_name'];?></td>
												<td><?php echo $_V['name'];?></td>
												<td><?php echo $_V['price'];?></td>												
												<td><?php echo StrCut::truncate_utf8_string($_V['remark'],10);?></td>
												<td><?php echo StrCut::truncate_utf8_string($_V['address'],10);?></td>
												<td><?php echo $_V['book_time'];?></td>
												<td>
												<?php
													if(!empty($_V['nurser_id'])){
														$nuder_model = NurseUser::model()->findByPk($_V['nurser_id']);
														echo $nuder_model['name'];
													}else{
														echo '<div style="color:red;">未选择护士</div>';
													}
													
												?>
												</td>
												<td>
												<?php 
													if($_V['order_status']==0){
														echo '<div style="color:red;">未接单</div>';
													}else if($_V['order_status']==1){
														echo '<div style="color:blue;">已接单</div>';
													}else if($_V['order_status']==2){
														echo '<div style="color:blue;">已付款</div>';
													}else if($_V['order_status']==3){
														echo '<div style="color:blue;">已完成</div>';
													}else if($_V['order_status']==4){
														echo '<strong>已取消</strong>';
													}
													
												?>
												</td>
												<td>
												<?php 
													if($_V['order_status']!=2){
												?>
												<a href="/mama/nurseuser/selNurse/order_id/<?php echo $_V['id'];?>" class="btn" title="选择护士"><i></i>选择</a>
												<?php }else{ echo "<b>订单已结束</b>"; }?>
												
												</td>																																																																						
												<td>	
												<?php 
													if($_V['order_status']!=2){	
												?>
													<a href="javascript:;" onclick="Finish(<?php echo $_V['id'];?>)" class="btn" title="点击完成订单"><i></i>完成</a>	
												<?php }?>																															
												<a href="/mama/order/update/id/<?php echo $_V['id']?>" class="btn" title="编辑信息"><i></i>编辑</a>  
												<a href="javascript:;" onclick="DeleteOrder(<?php echo $_V['id'];?>)" class="btn" title="删除信息"><i></i>删除</a>												
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
	

	function Finish($id){
		if(confirm('确定该订单已经完成了吗？')){
			$.ajax({
				url:'/mama/order/finish/id/'+$id,
				type:'post',
				success:function(res){
					if(res.code===0){
						if(res.data.flag==0){
							alert('已完成订单！！');
							window.location.reload();
						}else{
				    		alert('改变订单状态失败！！');
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

	
	function DeleteOrder($id){
		if(confirm('确定删除该订单信息吗？')){
			$.ajax({
				url:'/mama/order/delete/id/'+$id,
				type:'post',
				success:function(res){
					if(res.code===0){
						alert('已删除该订单信息！！');
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