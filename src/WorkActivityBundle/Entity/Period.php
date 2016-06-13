<?php

namespace WorkActivityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Period
 *
 * @ORM\Entity
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
    protected $from;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $to;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    protected $holiday;

    public function __construct()
    {
        $this->holiday = [];
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
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param \DateTime $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return \DateTime
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param \DateTime $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return \DateTime
     */
    public function getHoliday()
    {
        return $this->holiday;
    }

    /**
     * @param \DateTime $holiday
     */
    public function setHoliday($holiday)
    {
        $this->holiday = $holiday;
    }


}
