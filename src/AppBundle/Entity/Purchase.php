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
     * @return mixed
     */
    public function getForMe()
    {
        return $this->forMe;
    }

    /**
     * @param mixed $forMe
     */
    public function setForMe($forMe)
    {
        $this->forMe = $forMe;
    }

    /**
     * @return mixed
     */
    public function getWasAlone()
    {
        return $this->wasAlone;
    }

    /**
     * @param mixed $wasAlone
     */
    public function setWasAlone($wasAlone)
    {
        $this->wasAlone = $wasAlone;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}
