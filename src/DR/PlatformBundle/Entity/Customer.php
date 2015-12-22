<?php

namespace DR\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="DR\PlatformBundle\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="customersociety", type="string", length=255, unique=true)
     */
    private $customersociety;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set customersociety
     *
     * @param string $customersociety
     *
     * @return Customer
     */
    public function setCustomersociety($customersociety)
    {
        $this->customersociety = $customersociety;

        return $this;
    }

    /**
     * Get customersociety
     *
     * @return string
     */
    public function getCustomersociety()
    {
        return $this->customersociety;
    }
}

