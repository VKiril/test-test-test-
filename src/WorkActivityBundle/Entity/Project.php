<?php

namespace WorkActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Project
 *
 * @ORM\Entity
 * @ORM\Table(name="project")
 *
 * @package WorkActivityBundle\Entity
 */
class Project
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
    protected $owner;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $technology;

    /**
     * @var Activity $activity
     *
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="project")
     */
    protected $activity;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $closed;

    public function __construct()
    {
        $this->closed = false;
    }

    /**
     * @return string
     */
    public function getTechnology()
    {
        return $this->technology;
    }

    /**
     * @param string $technology
     */
    public function setTechnology($technology)
    {
        $this->technology = $technology;
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
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param Activity $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @return boolean
     */
    public function isClosed()
    {
        return $this->closed;
    }

    /**
     * @param boolean $closed
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    }

}
