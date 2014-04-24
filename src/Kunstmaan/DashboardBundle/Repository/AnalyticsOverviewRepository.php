<?php

namespace Kunstmaan\DashboardBundle\Repository;

use Doctrine\ORM\EntityRepository;

use Kunstmaan\DashboardBundle\Entity\AnalyticsOverview;

/**
 * AnalyticsOverviewRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnalyticsOverviewRepository extends EntityRepository
{
    /**
     * Get all overviews
     *
     * @return array $results A collection of AnalyticOverview objects
     */
    public function getAll()
    {
        $query = $this->getEntityManager()->createQuery(
          'SELECT c FROM KunstmaanDashboardBundle:AnalyticsOverview c'
        );

        return $query->getResult();
    }

    /**
     * Get an overview
     *
     * @param int $id
     *
     * @return AnalyticOverview $result
     */
    public function getOverview($id)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('o')
          ->from('KunstmaanDashboardBundle:AnalyticsOverview', 'o')
          ->where('o.id = :id')
          ->setParameter('id', $id);

        $results = $qb->getQuery()->getResult();
        if ($results) {
            return $results[0];
        }

        return false;
    }

    public function getOverviewData() {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('o.id, o.title')
          ->from('KunstmaanDashboardBundle:AnalyticsOverview', 'o');
        $results = $qb->getQuery()->getResult();
        if ($results) {
            return $results;
        }

        return false;
    }

}
