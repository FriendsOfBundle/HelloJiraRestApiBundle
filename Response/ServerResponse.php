<?php

namespace Hgtan\Bundle\HelloJiraRestApiBundle\Response;

class ServerResponse
{
    /**
     * Operation is success or not
     * @access public
     * @var bool
     */
	public $Success = true;

    /**
     * Array contains all error info
     * @access public
     * @var null
     */
	public $ErrorInfo = NULL;
	
    /**
     * Array contains all replied data
     * @access public
     * @var null
     */	
	public $Data = NULL;

	 /**
     * Add an error info into ErrorInfo array & set Success to false
     * @param $errField : Field name
     * @param $errCode : Error code 
     * @return mixed
     */
	public function addErrorInfo($errField, $errCode)
	{
		if($this->ErrorInfo == NULL)
			$this->ErrorInfo = Array();
		
		$this->Success = false;
		$this->ErrorInfo[$errField]=$errCode;
	}

	/**
	 * Array contains all replied data
	 * @param $data
	 * @return mixed
	 */
	public function setResponseData($data)
	{
		$this->Data = $data;
	}
	
	
}
