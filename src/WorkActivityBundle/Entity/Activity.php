<?php

namespace WorkActivityBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Activity
 *
 * @ORM\Entity
 * @ORM\Table(name="activity")
 *
 * @package WorkActivityBundle\Entity
 */
class Activity
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
    protected $time;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $selfTeach;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $invoiceable;

    /**
     * Activity constructor.
     */
    public function __construct()
    {
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $time;
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
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return boolean
     */
    public function isSelfTeach()
    {
        return $this->selfTeach;
    }

    /**
     * @param boolean $selfTeach
     */
    public function setSelfTeach($selfTeach)
    {
        $this->selfTeach = $selfTeach;
    }

    /**
     * @return boolean
     */
    public function isInvoiceable()
    {
        return $this->invoiceable;
    }

    /**
     * @param boolean $invoiceable
     */
    public function setInvoiceable($invoiceable)
    {
        $this->invoiceable = $invoiceable;
    }

}
