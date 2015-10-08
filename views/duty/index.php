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
                        <div class="row-fluid" style="margin: 10px;">                                   
                                    
                                    <div class="pull-left">
                                        <a class="btn" href="javascript:location.reload()">刷新</a>
                                    </div>
                                </div>
                        <div class="box-content">
                            <input type="hidden" value="275044" id="aid" name="aid">
                            <form action="/mama/duty/add"
                                method="post" class="form-horizontal">
                                <div class="row-fluid">
                                
                                    <span class="help-inline">日期：</span> 
                                    <input
                                        type="text" id="search_content" name="day_time" class="input-medium"
                                        placeholder="日期" value="" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})">
                                        <span class="help-inline">空闲开始时间：</span> 
                                    <input
                                        type="text" id="search_content" name="start_time" class="input-medium"
                                        placeholder="空闲开始时间" value="" onclick="WdatePicker({dateFmt:'H:mm'})">
                                        <span class="help-inline">空闲结束时间：</span> 
                                    <input
                                        type="text" id="search_content" name="over_time" class="input-medium"
                                        placeholder="空闲结束时间" value="" onclick="WdatePicker({dateFmt:'H:mm'})"> 
                                    <input type="hidden" name="nurser_id" value = "<?php echo $nurser_id;?>"/>   
                                
                                    <button type="submit" class="btn">
                                        <i></i>添加
                                    </button>
                                </div>
                            </form>
                            
                            <div class="row-fluid dataTables_wrapper">
                                <form action="http://www.weimob.com/plus/formajax.php"
                                    method="post" class="form-horizontal">
                                    <table id="listTable"
                                        class="table table-bordered table-hover  dataTable">
                                        <thead>
                                            <tr>                                                
                                                <th>日期</th>
                                                <th>姓名</th>
                                                <th>空闲时间段</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        foreach ($duty_model as $_V){
                                        ?>
                                            <tr>
                                                <td><?php echo $_V['day_time'];?></td>
                                                <td><?php echo $_V['name'];?></td>
                                                <td><?php echo $_V['hour_time'];?></td>
                                                                                                                                                                    
                                                <td>                                                                                                
                                                <a href="javascript:;" onclick="DeleteDuty(<?php echo $_V['id'];?>)" class="btn" title="删除信息"><i></i>删除</a>                                             
                                                </td>
                                            </tr>
                                            <?php  }?>
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

function DeleteDuty($id){
    if(confirm('确定删除该护士值班信息吗？')){
        $.ajax({
            url:'/mama/duty/delete/id/'+$id,
            type:'post',
            success:function(res){
//              alert(JSON.stringify(res));
                if(res.code===0){
                    alert('已删除该护士值班信息！！');
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