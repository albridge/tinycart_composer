<?php
namespace app;
class InputFilters{

	public function getMethod()
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}

	public function isPost()
	{
		if($this->getMethod() === 'post')
		{
			return true;
		}
	}


	public function isGet()
	{
		if($this->getMethod() === 'get')
		{
			return true;
		}
	}

	public function getBody()
    {
        $data = [];
        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $data;
    }    
}