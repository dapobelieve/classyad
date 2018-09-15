<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;

class AreaComposer 
{
    private $area;

    public function compose(View $view)
    {
        // add us in config
        if (!$this->area) {
            $this->area = \App\Area::where('slug', session()->get('area', config()->get('believe.defaults.area')))->first();
        }

        return $view->with ('area', $this->area);
    }
}