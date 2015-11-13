<?php 

namespace Simexis\LaraGrid\Data;

use ArrayObject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder AS EloquentBuilder;
use Illuminate\Database\Query\Builder AS QueryBuilder;

class DataSource {
	
	const SOURCE_QUERY_BUILDER = 0x1;
	const SOURCE_COLLECTION = 0x2;
	
	protected $source;

	public function source($source) {
		$this->setSource($source);
		
		return $this;
	}

	public function getSource() {
		return $this->source;
	}
	
	public function orderBy($key, $order = 'desc') { 
		$this->source->orderBy($key, $order);
	}

    protected function setSource($source)
    {
        if($source instanceof EloquentBuilder)
			return $this->source = new Source\SEloquentBuilder($this, $source);
        if($source instanceof QueryBuilder)
			return $this->source = new Source\SQueryBuilder($this, $source);
        if($source instanceof Model)
			return $this->source = $source->exists ? new Source\SCollection($this, with(new Collection)->push($source)) : new Source\SModel($this, $source);
        if($source instanceof Collection)
			return $this->source = new Source\SCollection($this, $source);
        if($source instanceof ArrayObject)
			return $this->source = new Source\SArrayObject($this, $source);
        if(is_array($source))
			return $this->source = new Source\SArray($this, $source);
        if(is_string($source) && Schema::hasTable($source))
			return $this->source = new Source\SDb($this, $source);
		throw new DataSetException(' "source" must be a table name, an eloquent model or an eloquent builder. you passed: ' . get_class($this->source));
    }

}
