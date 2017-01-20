<?php
namespace Curl;

class Json extends Curl {

	public function post($url, $data = array()){
		$data_string=json_encode($data);

		// These are required for this method
		$this->setHeader('Content-Type','application/json');
		$this->setHeader('Content-Length',strlen($data_string));

		// These are included in parent::post and if they could be abstracted
		// we could simply call the parent method - we can't because it wants
		// to use http_build_query on our $data array
		$this->setopt(CURLOPT_POSTFIELDS,$data_string);
		$this->setopt(CURLOPT_URL,$url);
		$this->setopt(CURLOPT_POST,TRUE);
		$this->_exec();

		// returns itself for accessing result quickly
		return $this;
	}
}
