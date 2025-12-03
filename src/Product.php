<?php
class Product {
    public $name;
    public $category;
    public $price;
    public $stock;
    public $image_path;
    public $status;

    public function __construct($name = '', $category = '', $price = 0, $stock = 0, $image_path = null, $status = 'active') {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->stock = $stock;
        $this->image_path = $image_path;
        $this->status = $status;
    }
}
