<body>
	<div id="main">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="box">
						<div class="box-title">
							<div class="span10">
								<h3>
									<i class="icon-table"></i>基本设置
								</h3>
							</div>
							<div class="span2">
								<a class="btn" href="Javascript:window.history.go(-1)">返回</a>
							</div>
						</div>

					<div class="box-content">
						<?php $form = $this->beginWidget('CActiveForm',array(							
								'id'=>'nurse-form',
								'enableClientValidation'=>true,
								'enableAjaxValidation'=>false,
								'htmlOptions'=>array('enctype'=>'multipart/form-data'),
						)); ?>
							<div
								class="step ui-formwizard-content ui-helper-reset ui-corner-all"
								id="firstStep" style="display: block;">
								
								<div class="step-forms">
									<div class="control-group">
										名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称:<br/>
										    <?php echo $form->textField($mama_model,'name',array('id'=>'item_name'));?>	 
											<?php echo $form->error($mama_model,'name');?>											
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									<div class="control-group">
										客服电话:<br/>
										    <?php echo $form->textField($mama_model,'service_phone',array('id'=>'item_name'));?>	 
											<?php echo $form->error($mama_model,'service_phone');?>											
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									<div class="control-group">
										使用帮助:
										<?php echo $form->textArea($mama_model,'help',array(
													'id'=>'summary_help',
													'rows'=>'5',
													'class'=>'input-xlarge ui-wizard-content ui-helper-reset ui-state-default'
											));?>
										<script>
											var editor = new UE.ui.Editor({
												initialFrameHeight:100,
												initialFrameWidth:400,
												toolbars: [
												            ['fullscreen', 'source', 'undo', 'redo', 'bold','initialFrameWidth']
												        ],
												autoHeightEnabled: true,
												autoFloatEnabled: true
											});
											editor.render("summary_help");
										</script>
									</div>
									
									<div class="control-group">
										关于我们:
										<?php echo $form->textArea($mama_model,'about',array(
													'id'=>'summary_about',
													'rows'=>'5',
													'class'=>'input-xlarge ui-wizard-content ui-helper-reset ui-state-default'
											));?>
									<script>
											var editor = new UE.ui.Editor({
												initialFrameHeight:100,
												initialFrameWidth:400,
												toolbars: [
												            ['fullscreen', 'source', 'undo', 'redo', 'bold','initialFrameWidth']
												        ],
												autoHeightEnabled: true,
												autoFloatEnabled: true
											});
											editor.render("summary_about");
										</script>	
									</div>
									<div class="control-group">
										服务条款:
										<?php echo $form->textArea($mama_model,'cluse',array(
													'id'=>'summary_cluse',
													'rows'=>'5',
													'class'=>'input-xlarge ui-wizard-content ui-helper-reset ui-state-default'
											));?>
									<script>
											var editor = new UE.ui.Editor({
												initialFrameHeight:100,
												initialFrameWidth:400,
												toolbars: [
												            ['fullscreen', 'source', 'undo', 'redo', 'bold','initialFrameWidth']
												        ],
												autoHeightEnabled: true,
												autoFloatEnabled: true
											});
											editor.render("summary_cluse");
										</script>		
									</div>
									<div class="control-group">
										联系客服:
										<?php echo $form->textArea($mama_model,'call_customer',array(
													'id'=>'summary_customer',
													'rows'=>'5',
													'class'=>'input-xlarge ui-wizard-content ui-helper-reset ui-state-default'
											));?>
									<script>
											var editor = new UE.ui.Editor({
												initialFrameHeight:100,
												initialFrameWidth:400,
												toolbars: [
												            ['fullscreen', 'source', 'undo', 'redo', 'bold','initialFrameWidth']
												        ],
												autoHeightEnabled: true,
												autoFloatEnabled: true
											});
											editor.render("summary_customer");
										</script>		
									</div>
																		
									<div class="control-group">
											logo&nbsp;&nbsp;&nbsp;图:<br/>										
											<?php echo CHtml::activeFileField($mama_model,'logo',array(
													'class'=>'btn select_img ui-wizard-content ui-helper-reset ui-state-default',
													'multiple'=>'multiple'))?>
											<?php
											
											 if(!empty($mama_model->logo)){
											 	$imgArray = explode(",",$mama_model->logo);
												foreach ($imgArray as $K=>$logo){?> 
												<img src ="<?php echo $logo ;?>" width='50px' height='50px'/>
												<a href="javascript:;" onclick="DeleteImg(<?php echo $mama_model->id;?>,<?php echo $K;?>)" class="btn" title="删除图片"><i></i>删除</a>	
											<?php }
											 }?>
										    建议尺寸:宽50像素,高50像素或等比图片,且小于2M																																				
									</div>																																					
					<div class="control-group">						
							<div class="span12">
								<div class="form-actions">
									<input type="submit"
										class="btn btn-primary ui-wizard-content ui-formwizard-button ui-helper-reset ui-state-default ui-state-active"
										value="提交" id="next">
								</div>
							</div>
						<?php $this -> endwidget(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>
<script type="text/javascript">

	function DeleteImg($id,$K){
		if(confirm('确定删除该图片吗？')){
			$.ajax({
				url:'/mama/mama/DelImg/id/'+$id+'/K/'+$K,
				type:'post',
				success:function(res){
					if(res.code===0){
						alert('已删除该图片！！');
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