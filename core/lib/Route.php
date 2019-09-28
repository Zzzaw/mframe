<?php
namespace core\lib;

class Route
{
	public $module;//模块
	public $controller;//控制器
	public $action;//方法
	public $param;//参数

	public function __construct()
	{

		//当url为xx.com/aa/bb时，经过解析，访问控制器aa中的方法bb
		$url = $_SERVER['REQUEST_URI'];
		$var = self::parseUrl($url);
		$this->module = $var['MODULE'];
		$this->controller = $var['CONTROLLER'];
		$this->action = $var['ACTION'];
		$this->param = $var['PARAM'];
		
	}

	private static function parseUrl($url)
	{

		$url = explode('?', $url);
		$url[0] = trim($url[0], '/');
		$path = explode('/', $url[0]);

		if(isset($url[1])) {
			$temp1 = explode('&', $url[1]);
			foreach ($temp1 as $value) {
				$temp2 = explode('=', $value);
				$param[$temp2[0]] = $temp2[1];
			}
			$var['PARAM'] = $param;
		}
		
		//TODO 默认控制器等应从配置文件读取
		$var['MODULE'] = isset($path[0]) && !empty($path[0]) ? ucfirst($path[0]) : 'admin';
		$var['CONTROLLER'] = isset($path[1]) && !empty($path[0]) ? ucfirst($path[1]) : 'index';
		$var['ACTION'] = isset($path[2]) && !empty($path[0]) ? $path[2] : 'index';
		
		return $var;
	}
}