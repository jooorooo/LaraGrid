<?php 

namespace Simexis\LaraGrid\Data\Source;

use ArrayObject;

class SArray extends SArrayObject {
	
	public function setSource($source) {
		return parent::setSource(new ArrayObject($source));
	}
	
}