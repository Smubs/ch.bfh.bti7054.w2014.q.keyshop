<?php

namespace Repository;

/**
 * Class EntityRepositoryException
 * @package Repository
 */
class EntityRepositoryException extends \Exception {}

/**
 * Class EntityRepository
 * @package Repository
 */
class EntityRepository extends \Doctrine\ORM\EntityRepository {
    /**
     * @var \Doctrine\ORM\EntityManager $em
     */
    protected $em;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     * @param \Doctrine\ORM\Mapping\ClassMetadata $class
     */
    public function __construct(\Doctrine\ORM\EntityManager $em, \Doctrine\ORM\Mapping\ClassMetadata $class)
    {
        parent::__construct($em, $class);
        $this->em = $em;
    }

    public function searchBy(array $criteria)
    {
        $qb = $this->createQueryBuilder('e');
        if (!empty($criteria)) {
            $orX = $qb->expr()->orX();
            foreach ($criteria as $field => $value) {
                $orX->add(
                    (is_object($value)) ? $qb->expr()->eq('e.'   . $field, ':' . $field)
                                        : $qb->expr()->like('e.' . $field, ':' . $field)
                );
                $qb->setParameter($field, (is_object($value)) ? $value : '%' . $value . '%');
            }
            $qb->where($orX);
        }
        return $qb->getQuery()->getResult();
    }
}
