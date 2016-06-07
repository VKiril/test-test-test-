<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @package AppBundle\Entity
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $cost;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $purpose;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $quantity;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $countable;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $raw;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    protected $mediumPrice;

    /**
     * @var Purchase
     *
     * @ORM\ManyToOne(targetEntity="Purchase", inversedBy="product")
     */
    protected $purchase;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * @param mixed $purpose
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getCountable()
    {
        return $this->countable;
    }

    /**
     * @param mixed $countable
     */
    public function setCountable($countable)
    {
        $this->countable = $countable;
    }

    /**
     * @return mixed
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @param mixed $raw
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;
    }

    /**
     * @return mixed
     */
    public function getEquivalent()
    {
        return $this->equivalent;
    }

    /**
     * @param mixed $equivalent
     */
    public function setEquivalent($equivalent)
    {
        $this->equivalent = $equivalent;
    }

    /**
     * @return Purchase
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * @param Purchase $purchase
     */
    public function setPurchase($purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * @return float
     */
    public function getMediumPrice()
    {
        return $this->mediumPrice;
    }

    /**
     * @param float $mediumPrice
     */
    public function setMediumPrice($mediumPrice)
    {
        $this->mediumPrice = $mediumPrice;
    }
}
