<?php

/**
 * Description of Plate
 *
 * @author fagottino
 */
class Drink {
    private $id;
    private $name;
    private $description;
    private $price;
    private $size;
    private $imagePath;
    private $available;
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getSize() {
        return $this->size;
    }

    public function getImagePath() {
        return $this->imagePath;
    }

    public function getAvailable() {
        return $this->available;
    }
    
    public function setId($_id) {
        $this->id = $_id;
    }

    public function setName($_name) {
        $this->name = $_name;
    }

    public function setDescription($_description) {
        $this->description = $_description;
    }

    public function setPrice($_price) {
        $this->price = $_price;
    }

    public function setSize($_size) {
        $this->size = $_size;
    }

    public function setImagePath($_imagePath) {
        $this->imagePath = $_imagePath;
    }

    public function setAvailable($_available) {
        $this->available = $_available;
    }
}
