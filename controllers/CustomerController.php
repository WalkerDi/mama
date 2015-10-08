<?php

class CustomerController extends BaseNurserController{
	public function actions() {
	        
	        return array(
	        	//客户首页	
	            'index' => array(
	                'class' => 'mama.controllers.customer.IndexAction'
	            ),
	        	//客户查询
        		'search' => array(
        				'class' => 'mama.controllers.customer.SearchAction'
        		),
        		//删除客户信息
        		'delete' => array(
        				'class' => 'mama.controllers.customer.DeleteAction'
        		),
        		//删除客户信息
        		'update' => array(
        				'class' => 'mama.controllers.customer.UpdateAction'
        		),
        		//审核客户信息
        		'check' => array(
        				'class' => 'mama.controllers.customer.CheckAction'
        		),
	        	
	        );
	    }
}