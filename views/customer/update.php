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
								
								<div class="step-forms" style="">
									<div class="control-group">
										姓&nbsp;&nbsp;&nbsp;名:<br/>
											<?php echo $form->textField($customer_info,'name',array('id'=>'item_name'));?>	 
											<?php echo $form->error($customer_info,'name');?>											
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									<div class="control-group">
										性&nbsp;&nbsp;&nbsp;别:<br/>
										    <?php echo $form->dropDownList($customer_info,'sex',$sex,array('height'=>25));?>
											<?php echo $form->error($customer_info,'sex');?>											
										<span class="help-inline" style="color:#F00" >*</span>
									</div>
									<div class="control-group">
										电&nbsp;&nbsp;&nbsp;话:<br/>
										    <?php echo $form->textField($customer_info,'phone',array('id'=>'item_name'));?>	 
											<?php echo $form->error($customer_info,'phone');?>											
										<span class="help-inline" style="color:#F00" >*</span>										
									</div>
									<div class="control-group">
										微信号:<br/>
										    <?php echo $form->textField($customer_info,'open_id',array('id'=>'item_name'));?>	 
											<?php echo $form->error($customer_info,'open_id');?>										
										<span class="help-inline" style="color:#F00" >*</span>
										
									</div>
									<div class="control-group">
										描&nbsp;&nbsp;&nbsp;述:
											<?php echo $form->textArea($customer_info,'description',array(
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
										地&nbsp;&nbsp;&nbsp;址:
										    <?php echo $form->textArea($customer_info,'address',array(
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
							<div class="span12">
								<div class="form-actions">
									<input type="submit"
										class="btn btn-primary ui-wizard-content ui-formwizard-button ui-helper-reset ui-state-default ui-state-active"
										value="保存" id="next">
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