<?php 

namespace Simexis\LaraGrid\Data\Source;

class SQueryBuilder extends AbstractSource {
	
	public function getType() {
		return static::SOURCE_QUERY_BUILDER;
	}
	
	public function getKey() {
		return 'id';
	}
	
	public function orderBy($key, $order) {
		$this->getSource()->orderBy($key, $order);
		return $this;
	}
	
	public function getData() {
		return $this->getSource()->get();
	}
	
}