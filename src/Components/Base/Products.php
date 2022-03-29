<?php


namespace VetNext\Front\Components\Base;

use Illuminate\View\Component;

class Products extends Component
{
    public $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */



    public function render()
    {
        return view('vetuk::components.base.products');
    }
}
