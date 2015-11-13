<?php 

namespace Simexis\LaraGrid\Data\Source;

use Illuminate\Support\Facades\DB;

class SDb extends SQueryBuilder {
	
	public function setSource($source) {
		$this->source = DB::table($source);
	}
	
	public function getType() {
		return static::SOURCE_QUERY_BUILDER;
	}
	
}