<?php

namespace DR\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artpurchase
 *
 * @ORM\Table(name="artpurchase")
 * @ORM\Entity(repositoryClass="DR\PlatformBundle\Repository\ArtpurchaseRepository")
 */
class Artpurchase
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
     * @ORM\Column(name="visualname", type="string", length=255, unique=true)
     */
    private $visualname;

    /**
     * @var string
     *
     * @ORM\Column(name="linkfile", type="string", length=255, unique=true)
     */
    private $linkfile;

    /**
     * @var float
     *
     * @ORM\Column(name="cost", type="float", nullable=true)
     */
    private $cost;

    /**
     * @var string
     *
     * @ORM\Column(name="refnum", type="string", length=255, unique=true)
     */
    private $refnum;
// -----------------------------------FOREIGN KEY---------------------------------------

    /**
    * @ORM\ManyToOne(targetEntity="Type")
    * @ORM\JoinColumn(nullable=false)
    */
    private $type;

    /**
    * @ORM\ManyToOne(targetEntity="Folder")
    * @ORM\JoinColumn(nullable=false)
    */
    private $folder;
// -------------------------------------------------------------------------------------

    /**
     * @var string
     *
     * @ORM\Column(name="orderform", type="string", length=255, unique=true)
     */
    private $orderform;
// -----------------------------------FOREIGN KEY---------------------------------------

    /**
    * @ORM\ManyToOne(targetEntity="Supplier")
    * @ORM\JoinColumn(nullable=false)
    */
    private $supplier;

    /**
    * @ORM\ManyToOne(targetEntity="Customer")
    * @ORM\JoinColumn(nullable=false)
    */
    private $customer;
// -------------------------------------------------------------------------------------

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startdate", type="datetime", nullable=true)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="datetime", nullable=true)
     */
    private $enddate;
// -----------------------------------FOREIGN KEY---------------------------------------

    /**
    * @ORM\ManyToMany(targetEntity="Area")
    * @ORM\JoinColumn(nullable=false)
    */
    private $area;

    /**
    * @ORM\ManyToMany(targetEntity="Support")
    * @ORM\JoinColumn(nullable=false)
    */
    private $support;
// -------------------------------------------------------------------------------------

    /**
     * @var int
     *
     * @ORM\Column(name="copy", type="integer", nullable=true)
     */
    private $copy;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;


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
     * Set visualname
     *
     * @param string $visualname
     *
     * @return Artpurchase
     */
    public function setVisualname($visualname)
    {
        $this->visualname = $visualname;

        return $this;
    }

    /**
     * Get visualname
     *
     * @return string
     */
    public function getVisualname()
    {
        return $this->visualname;
    }

    /**
     * Set linkfile
     *
     * @param string $linkfile
     *
     * @return Artpurchase
     */
    public function setLinkfile($linkfile)
    {
        $this->linkfile = $linkfile;

        return $this;
    }

    /**
     * Get linkfile
     *
     * @return string
     */
    public function getLinkfile()
    {
        return $this->linkfile;
    }

    /**
     * Set cost
     *
     * @param float $cost
     *
     * @return Artpurchase
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set refnum
     *
     * @param string $refnum
     *
     * @return Artpurchase
     */
    public function setRefnum($refnum)
    {
        $this->refnum = $refnum;

        return $this;
    }

    /**
     * Get refnum
     *
     * @return string
     */
    public function getRefnum()
    {
        return $this->refnum;
    }

    /**
     * Set startdate
     *
     * @param \DateTime $startdate
     *
     * @return Artpurchase
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     *
     * @return Artpurchase
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set copy
     *
     * @param integer $copy
     *
     * @return Artpurchase
     */
    public function setCopy($copy)
    {
        $this->copy = $copy;

        return $this;
    }

    /**
     * Get copy
     *
     * @return int
     */
    public function getCopy()
    {
        return $this->copy;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Artpurchase
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}

