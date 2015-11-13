<?php 

namespace Simexis\LaraGrid\Facades;

use Illuminate\Support\Facades\Facade;

class Grid extends Facade {

	protected static function getFacadeAccessor()
    {
        return 'laraGrid';
    }

}
