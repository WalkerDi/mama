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
										姓名:<br/>
										    <?php echo $form->textField($nurseUser_model,'name',array('id'=>'item_name'));?>	 
											<?php echo $form->error($nurseUser_model,'name');?>											
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									<div class="control-group">
										电话:<br/>
										    <?php echo $form->textField($nurseUser_model,'phone',array('id'=>'item_name'));?>	 
											<?php echo $form->error($nurseUser_model,'phone');?>											
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									<div class="control-group">
										性别:<br/>
										    <?php echo $form->dropDownList($nurseUser_model,'sex',$sex,array('height'=>25));?>
											<?php echo $form->error($nurseUser_model,'sex');?>											
									<span class="help-inline" style="color:#F00" >*</span>
									</div>
									<!--
									<div class="control-group">
										服务:
										    <?php echo $form->dropDownList($itemrealte_model,'item_id',$item,array('height'=>25,'multiple'=>'multiple'));?>									
									<span class="help-inline" style="color:#F00" >*</span>
									</div> -->
									<div class="control-group">
										年龄:<br/>
										    <?php echo $form->textField($nurseUser_model,'age',array('id'=>'item_name'));?>	 
											<?php echo $form->error($nurseUser_model,'age');?>											
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									<div class="control-group">
										职称:<br/>
										    <?php echo $form->textField($nurseUser_model,'title',array('id'=>'item_name'));?>	 
											<?php echo $form->error($nurseUser_model,'title');?>											
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									<div class="control-group">
										头像:<br/>										
											<?php echo CHtml::activeFileField($nurseUser_model,'thumb',array(
													'class'=>'btn select_img ui-wizard-content ui-helper-reset ui-state-default',
													'multiple'=>'multiple'))?>
													<span class="help-inline" style="color:#F00" ></span>建议尺寸:宽50像素,高50像素或等比图片,且小于2M																									
											
									</div>
									<div class="control-group">
										地址:
										    <?php echo $form->textArea($nurseUser_model,'address',array(
													'id'=>'summary_address',
													'rows'=>'5',
													'class'=>'input-xlarge ui-wizard-content ui-helper-reset ui-state-default'
											));?>																	
									</div>	
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
											editor.render("summary_address");
										</script>
									
									<div class="control-group">
										描述:
										<?php echo $form->textArea($nurseUser_model,'description',array(
													'id'=>'summary_description',
													'rows'=>'5',
													'class'=>'input-xlarge ui-wizard-content ui-helper-reset ui-state-default'
											));?>
									</div>
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
											editor.render("summary_description");
										</script>
									
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