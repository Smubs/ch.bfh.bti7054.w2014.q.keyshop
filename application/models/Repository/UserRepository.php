<?php

namespace Repository;

class UserRepositoryException extends \Exception {}

class UserRepository extends \Doctrine\ORM\EntityRepository {
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em, \Doctrine\ORM\Mapping\ClassMetadata $class)
    {
        parent::__construct($em, $class);
        $this->em = $em;
    }
}
