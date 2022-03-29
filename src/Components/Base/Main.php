<?php


namespace VetNext\Front\Components\Base;

use Illuminate\View\Component;

use Illuminate\Pagination\Paginator;

class Main extends Component
{
    public $products;
    public $product;
    public $sorted;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products, $product, $sorted)
    {
        $this->products = $products;
        $this->product = $product;
        $this->sorted = $sorted;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('vetuk::components.base.main');
    }
}
