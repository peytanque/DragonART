<?php

namespace DR\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Supplier
 *
 * @ORM\Table(name="supplier")
 * @ORM\Entity(repositoryClass="DR\PlatformBundle\Repository\SupplierRepository")
 */
class Supplier
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
     * @ORM\Column(name="suppliersociety", type="string", length=255, unique=true)
     */
    private $suppliersociety;


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
     * Set suppliersociety
     *
     * @param string $suppliersociety
     *
     * @return Supplier
     */
    public function setSuppliersociety($suppliersociety)
    {
        $this->suppliersociety = $suppliersociety;

        return $this;
    }

    /**
     * Get suppliersociety
     *
     * @return string
     */
    public function getSuppliersociety()
    {
        return $this->suppliersociety;
    }
}

