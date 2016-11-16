<?php

/**
 * Description of Plate
 *
 * @author fagottino
 */
class Plate {
    private $name;
    private $description;
    private $price;
    private $imagePath;
    private $available;
    
    public function createPlate($_name, $_description, $_price, $_imagePath, $_available) {
        $this->name;
        $this->description;
        $this->price;
        $this->imagePath;
        $this->available;
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

    public function getImagePath() {
        return $this->imagePath;
    }

    public function getAvailable() {
        return $this->available;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;
    }

    public function setAvailable($available) {
        $this->available = $available;
    }
}
