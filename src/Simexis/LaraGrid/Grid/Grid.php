<?php 

namespace Simexis\LaraGrid\Grid;

use Simexis\LaraGrid\Data\DataSource;

class Grid extends DataSource {

	private $columns = [];

    /**
     * @param string $name
     * @param string $label
     * @param bool   $orderby
     *
     * @return Column
     */
    public function add($name, $label = null, $orderby = false)
    {
        $column = new Column($name, $label, $orderby);
        $this->columns[] = $column;
        return $column;
    }

	public function build() {
		$rows = [];
		foreach($this->getSource()->getData() AS $source) {
			$rows[] = new Row($this->columns, $source);
		}
		dd($rows);
	}
	
	public function __call($method, $parameters) { 
		if($this->source && method_exists($this->source, $method))
			return call_user_func_array([$this->source, $method], $parameters);
		throw new DataSetException('Missing method "' . $method . '"');
	}

}
