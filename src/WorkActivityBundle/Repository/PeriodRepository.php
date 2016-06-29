<?php

namespace WorkActivityBundle\Repository;


use Doctrine\ORM\EntityRepository;
use WorkActivityBundle\Entity\Period;

/**
 * Class PeriodRepository
 * @package WorkActivityBundle\Repository
 */
class PeriodRepository extends EntityRepository
{
    public function getLastPeriods()
    {
        $result = $this->getEntityManager()->getRepository('WorkActivityBundle:Period')
            ->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

        $date = new \DateTime('now');

        $response = [];
        if(sizeof($result) > 0){
            /** @var Period $period */
            $period = $result[0];
            $response = $period->getFromDate() <= $date || $period->getToDate() >= $date;
        }

        return ['isValid' => $response, 'period' => $result];
    }

    public function getCurrentPeriod()
    {
        $period = $this->getEntityManager()->getRepository('WorkActivityBundle:Period')
            ->createQueryBuilder('p')
            ->select('p')
            ->where('p.fromDate <= :date')
            ->orWhere('p.toDate >= :date')
            ->setParameter('date', new \DateTime('now'))
            ->getQuery()
            ->getResult();

        return $period;
    }

    public function validatePeriod(Period $period)
    {
        $result = $this->getEntityManager()->getRepository('WorkActivityBundle:Period')
            ->createQueryBuilder('p')
            ->select('p')
            ->where('p.toDate >= :formDate ')
            ->setParameter('formDate', $period->getFromDate())
            ->getQuery();

        $result = $result->getArrayResult();

        return sizeof($result) != 0;
    }
}
