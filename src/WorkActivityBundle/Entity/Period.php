<?php

namespace WorkActivityBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Period
 *
 * @ORM\Entity(repositoryClass="WorkActivityBundle\Repository\PeriodRepository")
 * @ORM\Table(name="period")
 *
 * @package WorkActivityBundle\Entity
 */
class Period
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $fromDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $toDate;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    protected $holiday;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $closed;

    /**
     * @var Activity $activity
     *
     * @ORM\OneToMany(targetEntity="WorkActivityBundle\Entity\Activity", mappedBy="period")
     */
    protected $activity;

    /**
     * @var TODOActivity $TODOActivity
     *
     * @ORM\OneToMany(targetEntity="TODOActivity", mappedBy="period")
     */
    protected $TODOActivity;

    public function __construct()
    {
        $this->holiday = [];
        $this->closed = false;
        $this->TODOActivity = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * @param \DateTime $fromDate
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    }

    /**
     * @return \DateTime
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * @param \DateTime $toDate
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    }

    /**
     * @return array
     */
    public function getHoliday()
    {
        return $this->holiday;
    }

    /**
     * @param array $holiday
     */
    public function setHoliday($holiday)
    {
        $this->holiday = $holiday;
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
     * @return TODOActivity
     */
    public function getTODOActivity()
    {
        return $this->TODOActivity;
    }

    /**
     * @param TODOActivity $TODOActivity
     */
    public function setTODOActivity($TODOActivity)
    {
        $this->TODOActivity = $TODOActivity;
    }
}
