<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Purchase
 * @ORM\Entity
 * @ORM\Table(name="purchase")
 * @ORM\HasLifecycleCallbacks
 * @package AppBundle\Entity
 */
class Purchase
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $place;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $wasAlone;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $forMe;

    /**
     * @var Product
     *
     * @ORM\OneToMany(targetEntity="Product", mappedBy="purchase")
     */
    protected $product;


    protected $user;

    /**
     * @var Update
     *
     * @ORM\OneToMany(targetEntity="Update", mappedBy="purchase")
     */
    protected $update;

    public function __construct()
    {
//        $date = new \DateTime('now');
//        $this->createdAt = $date->format('Y-m-d');
        $this->createdAt = new \DateTime('now');
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return boolean
     */
    public function isWasAlone()
    {
        return $this->wasAlone;
    }

    /**
     * @param boolean $wasAlone
     */
    public function setWasAlone($wasAlone)
    {
        $this->wasAlone = $wasAlone;
    }

    /**
     * @return boolean
     */
    public function isForMe()
    {
        return $this->forMe;
    }

    /**
     * @param boolean $forMe
     */
    public function setForMe($forMe)
    {
        $this->forMe = $forMe;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return Update
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * @param Update $update
     */
    public function setUpdate($update)
    {
        $this->update = $update;
    }

}
