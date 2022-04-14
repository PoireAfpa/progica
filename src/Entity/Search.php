<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

class Search
{
    private $keyword;
    private $cities;
    private $lat;
    private $lng;
    private $maxPrice;
    private $minSurface;
    private $minRoom;
    private $minPeople;
    private $pet;
    private $smoker;
    private $options;


    
    /**
     * Get the value of keyword
     */ 
    public function getKeyword():?string
    {
        return $this->keyword;
    }

    /**
     * Set the value of keyword
     *
     * @return  self
     */ 
    public function setKeyword(string $keyword):self
    {
        $this->keyword = $keyword;
        return $this;
    }
    

    /**
     * Get the value of maxPrice
     */ 
    public function getMaxPrice():?int
    {
        return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     *
     * @return  self
     */ 
    public function setMaxPrice(int $maxPrice) :self
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get the value of minSurface
     */ 
    public function getMinSurface():?int
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @return  self
     */ 
    public function setMinSurface(int $minSurface):self
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of minRoom
     */ 
    public function getMinRoom():?int
    {
        return $this->minRoom;
    }

    /**
     * Set the value of minRoom
     *
     * @return  self
     */ 
    public function setMinRoom(int $minRoom):self
    {
        $this->minRoom = $minRoom;
        return $this;
    }

        /**
     * Get the value of minPeople
     */ 
    public function getMinPeople():?int
    {
        return $this->minPeople;
    }

    /**
     * Set the value of minPeople
     *
     * @return  self
     */ 
    public function setMinPeople(int $minPeople):self
    {
        $this->minPeople = $minPeople;
        return $this;
    }

    /**
     * Get the value of pet
     */ 
    public function getPet():?Bool
    {
        return $this->pet;
    }

    /**
     * Set the value of pet
     *
     * @return  self
     */ 
    public function setPet(bool $pet):self
    {
        $this->pet = $pet;
        return $this;
    }

    /**
     * Get the value of smoker
     */ 
    public function getSmoker():?Bool
    {
        return $this->smoker;
    }

    /**
     * Set the value of smoker
     *
     * @return  self
     */ 
    public function setSmoker(bool $smoker):self
    {
        $this->smoker = $smoker;
        return $this;
    }


    /**
     * Get the value of options
     */ 
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @return  self
     */ 
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the value of cities
     */ 
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * Set the value of cities
     *
     * @return  self
     */ 
    public function setCities($cities)
    {
        $this->cities = $cities;

        return $this;
    }

    /**
     * Get the value of lat
     */ 
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set the value of lat
     *
     * @return  self
     */ 
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get the value of lng
     */ 
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set the value of lng
     *
     * @return  self
     */ 
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }
}