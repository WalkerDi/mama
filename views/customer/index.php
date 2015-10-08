<div id="main">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <div class="box-title">
                        <div class="span10">
                            <h3><i class="icon-table"></i>用户管理</h3>
                        </div>
                        <div class="span2"><a class="btn" href="Javascript:window.history.go(-1)">返回</a></div>
                    </div>
                    <div class="box-content">
                        <input type="hidden" value="275044" id="aid" name="aid"> 
                        <form action="/mama/customer/search"
								method="post" class="form-horizontal">
								<div class="row-fluid">
								
									<span class="help-inline">用户查询：</span> 
									<input
										type="text" id="search_content" name="txt" class="input-medium"
										placeholder="请输入微信号、手机号或姓名" style="width:200px;" value="" > 
								
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
                            <form action="http://www.weimob.com/plus/formajax.php" method="post" class="form-horizontal">
                                <table id="listTable" class="table table-bordered table-hover  dataTable">
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
                                   <?php foreach ($customer_model as $_v){?>
                                    <tbody>
                                             <tr>                                                  
                                                    	<td><?php echo $_v['id'];?></td>
                                                        <td><?php echo $_v['name'];?></td>
                                                        <td><?php echo $_v['sex']==0? '男' : '女';?></td>
                                                        <td><?php echo $_v['phone'];?></td>
                                                        <td><?php echo StrCut::truncate_utf8_string($_v['open_id'],5);?></td>                                                                                                   
                                                        <td><?php echo StrCut::truncate_utf8_string($_v['description'],15);?></td>                                                        
                                                        <td><?php echo StrCut::truncate_utf8_string($_v['address'],15);?></td>
                                                        <td><?php 
	                                                        if($_v['status']==0){
	                                                        	echo "正常";
	                                                        }
	                                                        if($_v['status']==1){
	                                                        	echo '<div style="color:red;">冻结</div>';
	                                                        }
                                                        ?></td>                                                                                                                                                                     
                                                        <td><?php echo $_v['create_time'];?></td>                               
                                                        <td>
                                                        	<a class="btn closed" data-bid="5895" href="javascript:;" onclick="CheckCustomer(<?php echo $_v['id'];?>,<?php echo $_v['status']?>)" title="客户状态"><i></i>冻结/正常</a>
															<a class="btn closed" data-bid="5895" href="/mama/customer/update/id/<?php echo $_v['id'];?>" title="编辑信息"><i></i>编辑</a>  
															<a class="btn closed" data-bid="5895" href="javascript:;" onclick="DeleteCustomer(<?php echo $_v['id'];?>)" title="删除信息"><i></i>删除</a>					                                                                                                                                                                                                                                                                 
                                                        </td>
                                               <tr>                                          
                                     </tbody>
                                    <?php }?>
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
		if(confirm('确定要改变该客户的状态吗？')){
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
