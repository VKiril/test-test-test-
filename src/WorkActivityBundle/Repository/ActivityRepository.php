<?php

namespace WorkActivityBundle\Repository;

use Doctrine\ORM\EntityRepository;
use WorkActivityBundle\Entity\Period;

class ActivityRepository extends EntityRepository
{
    /**
     * @param Period $period
     * @return array
     */
    public function findByPeriod(Period $period)
    {
        $activities = $this->getEntityManager()->getRepository('WorkActivityBundle:Activity')
            ->createQueryBuilder('a')
            ->select('a')
            ->where('a.period := period')
            ->setParameter('period', $period)
            ->getQuery()
            ->getResult();

        return $activities;
    }
}
