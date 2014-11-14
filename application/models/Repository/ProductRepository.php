<?php

namespace Repository;

/**
 * Class ProductRepositoryException
 * @package Repository
 */
class ProductRepositoryException extends \Exception {}

/**
 * Class ProductRepository
 * @package Repository
 */
class ProductRepository extends \Doctrine\ORM\EntityRepository {
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
