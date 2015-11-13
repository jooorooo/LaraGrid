<?php 

namespace Simexis\LaraGrid\Data\Source;

class SModel extends SQueryBuilder {
	
	public function setSource($source) {
		$this->source = $source->getQuery();
		return $this;
	}
	
	
	
}