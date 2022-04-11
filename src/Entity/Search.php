<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

class Search
{
    private $keyword;
    private $maxPrice;
    private $minSurface;
    private $minRoom;
    private $minPeople;
    private $pet;
    private $smoker;

    
    /**
     * Get the value of keyword
     */ 
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set the value of keyword
     *
     * @return  self
     */ 
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
        return $this;
    }
    

    /**
     * Get the value of maxPrice
     */ 
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     *
     * @return  self
     */ 
    public function setMaxPrice($maxPrice) 
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get the value of minSurface
     */ 
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @return  self
     */ 
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of minRoom
     */ 
    public function getMinRoom()
    {
        return $this->minRoom;
    }

    /**
     * Set the value of minRoom
     *
     * @return  self
     */ 
    public function setMinRoom($minRoom)
    {
        $this->minRoom = $minRoom;
        return $this;
    }

        /**
     * Get the value of minPeople
     */ 
    public function getMinPeople()
    {
        return $this->minPeople;
    }

    /**
     * Set the value of minPeople
     *
     * @return  self
     */ 
    public function setMinPeople($minPeople)
    {
        $this->minPeople = $minPeople;
        return $this;
    }

    /**
     * Get the value of pet
     */ 
    public function getPet()
    {
        return $this->pet;
    }

    /**
     * Set the value of pet
     *
     * @return  self
     */ 
    public function setPet($pet)
    {
        $this->pet = $pet;
        return $this;
    }

    /**
     * Get the value of smoker
     */ 
    public function getSmoker()
    {
        return $this->smoker;
    }

    /**
     * Set the value of smoker
     *
     * @return  self
     */ 
    public function setSmoker($smoker)
    {
        $this->smoker = $smoker;
        return $this;
    }

}