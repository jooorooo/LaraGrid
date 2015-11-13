<?php 

namespace Simexis\LaraGrid\Grid;

class Row {

	private $columns = [];

    public function __construct(array $columns, $source) {
		foreach($columns AS $column) {
			if(is_callable($column->getName())) {
				$column->setValue(call_user_func($column->getName(), $source));
			} else if(is_array($source) && array_key_exists($column->getName(),$source)) {
				$column->setValue($source[$column->getName()]);
			} else if(is_object($source) && isset($source->{$column->getName()})) {
				$column->setValue($source->{$column->getName()});
			}
			$this->columns[] = $column;
		}
	}

}
