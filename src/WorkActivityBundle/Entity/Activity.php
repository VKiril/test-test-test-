<?php

namespace WorkActivityBundle\Entity;


class Activity
{
    protected $id;

    protected $name;

    protected $description;

    protected $time;

    protected $createdAt;

    protected $updatedAt;

    protected $selfTeach;

    protected $invoiceable;

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
     * @return mixed
     */
    public function getInvoiceable()
    {
        return $this->invoiceable;
    }

    /**
     * @param mixed $invoiceable
     */
    public function setInvoiceable($invoiceable)
    {
        $this->invoiceable = $invoiceable;
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
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
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
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getSelfTeach()
    {
        return $this->selfTeach;
    }

    /**
     * @param mixed $selfTeach
     */
    public function setSelfTeach($selfTeach)
    {
        $this->selfTeach = $selfTeach;
    }
}
