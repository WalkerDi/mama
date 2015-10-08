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
						<form action="/mama/order/updatewrite" method="post">
							<div
								class="step ui-formwizard-content ui-helper-reset ui-corner-all"
								id="firstStep" style="display: block;">
								
								<div class="step-forms">
								<?php foreach ($order_info as $V){?>
								<input type = "hidden" name = "id" value ="<?php echo $V['id']?>">
									<div class="control-group">
										服务：<br/>
									 
										<select id="item_name" size="1" name = "item_id">
													<option value =""></option>
													<?php foreach ($item_info as $_V){?>
													  <option value ="<?php echo $_V['id'];?>"><?php echo $_V['name'];?></option>
													<?php }?>
										</select>
								
											<span class="help-inline" style="color:#F00" >*</span>
									</div>
									<div class="control-group">
										金额：<br/>
											<input type="text" name="price" id="item_name" value="<?php echo $V['price']?>"/>
											<span class="help-inline" style="color:#F00" >*</span>
									</div>
								
									<div class="control-group">
										地址：
											<textarea id="summary_address" name="address" rows="5"
												
												class="input-xlarge ui-wizard-content ui-helper-reset ui-state-default">
												<?php echo $V['address']?>
												</textarea>
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
										备注：
											<textarea id="summary_remark" name="remark" rows="5"
												
												class="input-xlarge ui-wizard-content ui-helper-reset ui-state-default">
												<?php echo $V['remark']?>
												</textarea>
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
											editor.render("summary_remark");
										</script>
							</div>
							<?php } ?>
							<div class="span12">
										<div class="form-actions">
											<input type="submit"
												class="btn btn-primary ui-wizard-content ui-formwizard-button ui-helper-reset ui-state-default ui-state-active"
												value="提交" id="next">
										</div>
									</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>