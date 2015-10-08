<?php
class BaseNurserController extends Controller {

	public $layout = '/layouts/main';
	public $pageTitle = '橙妈妈平台';
	public $comId = 0;
	public $comName = '';
	public $keyword = '';
	
	public function filters() {
		$filters = parent::filters ();
		//$filters ['login'] = 'login';
		return $filters;
	}
	 public function filterLogin($filterChain) {
		$id = Company::getId();
		if (empty ( $id )) {
			throw new RuntimeException ( '非法访问' );
		}
		$this->comId = $id;
		$this->comName = Company::getName ();
		return $filterChain->run ();
	} 

}
