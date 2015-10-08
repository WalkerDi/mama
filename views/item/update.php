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
										服务名称:<br/>
										    <?php echo $form->textField($item_model,'name',array('id'=>'item_name'));?>	 
											<?php echo $form->error($item_model,'name');?>											
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									
									<div class="control-group">
										金额/小时:<br/>
										    <?php echo $form->textField($item_model,'price',array('id'=>'item_name'));?>	 
											<?php echo $form->error($item_model,'price');?>											
										<span class="help-inline" style="color:#F00" >*</span>										
									</div>
									<div class="control-group">
										金额描述:<br/>
										    <?php echo $form->textField($item_model,'price_desc',array('id'=>'item_name'));?>	 
											<?php echo $form->error($item_model,'price_desc');?>											
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									<div class="control-group">
										<div class="control-group">
										服务简介:
										<?php echo $form->textArea($item_model,'brief',array(
													'id'=>'summary_brief',
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
											editor.render("summary_brief");
										</script>
								</div>
									<div class="control-group">
										<div class="control-group">
										服务描述:
										<?php echo $form->textArea($item_model,'description',array(
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