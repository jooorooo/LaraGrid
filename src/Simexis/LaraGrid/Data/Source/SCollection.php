<?php 

namespace Simexis\LaraGrid\Data\Source;

class SCollection extends AbstractSource {
	
	public function getType() {
		return static::SOURCE_COLLECTION;
	}
	
	public function getKey() {
		return $this->key;
	}
	
	public function orderBy($key, $order) {
		$this->setSource($this->getSource()->sortBy($key, SORT_REGULAR, strtolower($order) == 'desc' ? true : false));
		return $this;
	}
	
	public function getData() {
		return $this->getSource()->all();
	}
	
}