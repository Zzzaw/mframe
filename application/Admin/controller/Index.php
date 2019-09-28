<?php
namespace application\Admin\controller;
// 使用并继承\core\lib\Controller类
use \core\lib\Controller;

class Index extends Controller
{
	public function test($a, $b, $c)
	{
		p($a.$b.$c);
		//p(__FUNCTION__);
		$this->display('test');
	}

	public function index($a, $b, $c)
	{
		//$this->display('index');
	}
}