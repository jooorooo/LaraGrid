<?php 

namespace Simexis\LaraGrid\Data\Source;

use Simexis\LaraGrid\Data\DataSource;

abstract class AbstractSource {
	
	const SOURCE_QUERY_BUILDER = DataSource::SOURCE_QUERY_BUILDER;
	const SOURCE_COLLECTION = DataSource::SOURCE_COLLECTION;
	
	protected $source;
	protected $type;
	protected $data_source;
	protected $key;
	
	public function __construct(DataSource $data_source, $source) {
		$this->setSource($source);
		$this->setDataSource($data_source);
		$this->setType($this->getType());
		$this->setKey($this->getKey());
	}
	
	public function setDataSource(DataSource $data_source) {
		$this->data_source = $data_source;
		return $this;
	}
	
	public function getDataSource() {
		return $this->data_source;
	}
	
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	
	public function setKey($key) {
		$this->key = $key;
		return $this;
	}
	
	public function setSource($source) {
		$this->source = $source;
		return $this;
	}
	
	public function getSource() {
		return $this->source;
	}
	
	abstract public function getType();
	
	abstract public function getKey();
	
	abstract public function orderBy($key, $order);
	
	abstract public function getData();
	
	
}