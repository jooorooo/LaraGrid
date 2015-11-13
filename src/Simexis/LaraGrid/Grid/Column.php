<?php 

namespace Simexis\LaraGrid\Grid;

class Column {

	private $name;
	private $value;
	private $label = "";
	private $orderby = null;
    private $orderby_field = null;

    public function __construct($name, $label = null, $orderby = false) {
		
        $this->name = $name;
		
        $this->label($label);
        $this->orderby($orderby);
		
	}

    public function getName() {
        return $this->name;
    }

    public function setValue($value)
    {
        $this->value = $value;
		return $this;
    }

    protected function label($label)
    {
        $this->label = is_null($label) ? $this->name : $label;
    }

    protected function orderby($orderby)
    {
        $this->orderby = is_callable($this->name) ? false : (bool) $orderby;
        if ($this->orderby) {
            $this->orderby_field = (is_string($orderby)) ? $orderby : $this->name;
        }

        return $this;
    }

}
