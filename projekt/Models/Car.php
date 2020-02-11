<?php
class Car{
    public $brand;
    public $model;
    public $color;

    function setBrand($brand){
        $this->brand = $brand;
    }

    function setModel($model){
        $this->model = $model;
    }

    function setColor($color){
        $this->color = $color;
    }

    function getBrand(){
        return $this->brand;
    }

    function getModel(){
        return $this->model;
    }

    function getColor(){
        return $this->color;
    }
}
?>