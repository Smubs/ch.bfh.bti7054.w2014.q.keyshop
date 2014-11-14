<?php

namespace Repository;

/**
 * Class OrderRepositoryException
 * @package Repository
 */
class OrderRepositoryException extends \Exception {}

/**
 * Class OrderRepository
 * @package Repository
 */
class OrderRepository extends \Doctrine\ORM\EntityRepository {
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
}
