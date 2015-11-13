<?php 

namespace Simexis\LaraGrid\Data\Source;

use Illuminate\Support\Collection;

class SArrayObject extends SCollection {
	
	public function setSource($source) {
		$this->source = new Collection($source);
		return $this;
	}
	
}