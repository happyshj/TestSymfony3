<?php

namespace Mytest\TableBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MainTable
 *
 * @ORM\Table(name="main_table")
 * @ORM\Entity(repositoryClass="Mytest\TableBundle\Repository\MainTableRepository")
 */
class MainTable
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
     * @ORM\Column(name="sr", type="string", length=20, nullable=true)
     */
    private $sr;

    /**
     * @var string
     *
     * @ORM\Column(name="rma", type="string", length=20, nullable=true)
     */
    private $rma;

    /**
     * @var string
     *
     * @ORM\Column(name="jde", type="string", length=20, nullable=true)
     */
    private $jde;

    /**
     * @var string
     *
     * @ORM\Column(name="pn", type="string", length=10, nullable=true)
     */
    private $pn;

    /**
     * @var string
     *
     * @ORM\Column(name="sn", type="string", length=10, nullable=true)
     */
    private $sn;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_name", type="string", length=20, nullable=true)
     */
    private $customerName;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_address", type="string", length=100, nullable=true)
     */
    private $customerAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_number", type="string", length=20, nullable=true)
     */
    private $customerNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="physical_damaged", type="string", length=10, nullable=true)
     */
    private $physicalDamaged;

    /**
     * @var string
     *
     * @ORM\Column(name="linked_img", type="string", length=100, nullable=true)
     */
    private $linkedImg;

    /**
     * @var string
     *
     * @ORM\Column(name="assigned_owner", type="string", length=20, nullable=true)
     * @Assert\File(mimeTypes={"application/pdf"})
     */
    private $assignedOwner;

    /**
     * @var string
     *
     * @ORM\Column(name="awb", type="string", length=20, nullable=true)
     */
    private $awb;

    /**
     * @ORM\OneToMany(targetEntity="SubTable", mappedBy="mainTable")
     */
    private $subs;

    public function __construct()
    {
        $this->subs = new ArrayCollection();
    }

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
     * Set sr
     *
     * @param string $sr
     *
     * @return MainTable
     */
    public function setSr($sr)
    {
        $this->sr = $sr;

        return $this;
    }

    /**
     * Get sr
     *
     * @return string
     */
    public function getSr()
    {
        return $this->sr;
    }

    /**
     * Set rma
     *
     * @param string $rma
     *
     * @return MainTable
     */
    public function setRma($rma)
    {
        $this->rma = $rma;

        return $this;
    }

    /**
     * Get rma
     *
     * @return string
     */
    public function getRma()
    {
        return $this->rma;
    }

    /**
     * Set jde
     *
     * @param string $jde
     *
     * @return MainTable
     */
    public function setJde($jde)
    {
        $this->jde = $jde;

        return $this;
    }

    /**
     * Get jde
     *
     * @return string
     */
    public function getJde()
    {
        return $this->jde;
    }

    /**
     * Set pn
     *
     * @param string $pn
     *
     * @return MainTable
     */
    public function setPn($pn)
    {
        $this->pn = $pn;

        return $this;
    }

    /**
     * Get pn
     *
     * @return string
     */
    public function getPn()
    {
        return $this->pn;
    }

    /**
     * Set sn
     *
     * @param string $sn
     *
     * @return MainTable
     */
    public function setSn($sn)
    {
        $this->sn = $sn;

        return $this;
    }

    /**
     * Get sn
     *
     * @return string
     */
    public function getSn()
    {
        return $this->sn;
    }

    /**
     * Set customerName
     *
     * @param string $customerName
     *
     * @return MainTable
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;

        return $this;
    }

    /**
     * Get customerName
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Set customerAddress
     *
     * @param string $customerAddress
     *
     * @return MainTable
     */
    public function setCustomerAddress($customerAddress)
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    /**
     * Get customerAddress
     *
     * @return string
     */
    public function getCustomerAddress()
    {
        return $this->customerAddress;
    }

    /**
     * Set customerNumber
     *
     * @param string $customerNumber
     *
     * @return MainTable
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;

        return $this;
    }

    /**
     * Get customerNumber
     *
     * @return string
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }

    /**
     * Set physicalDamaged
     *
     * @param string $physicalDamaged
     *
     * @return MainTable
     */
    public function setPhysicalDamaged($physicalDamaged)
    {
        $this->physicalDamaged = $physicalDamaged;

        return $this;
    }

    /**
     * Get physicalDamaged
     *
     * @return string
     */
    public function getPhysicalDamaged()
    {
        return $this->physicalDamaged;
    }

    /**
     * Set linkedImg
     *
     * @param string $linkedImg
     *
     * @return MainTable
     */
    public function setLinkedImg($linkedImg)
    {
        $this->linkedImg = $linkedImg;

        return $this;
    }

    /**
     * Get linkedImg
     *
     * @return string
     */
    public function getLinkedImg()
    {
        return $this->linkedImg;
    }

    /**
     * Set assignedOwner
     *
     * @param string $assignedOwner
     *
     * @return MainTable
     */
    public function setAssignedOwner($assignedOwner)
    {
        $this->assignedOwner = $assignedOwner;

        return $this;
    }

    /**
     * Get assignedOwner
     *
     * @return string
     */
    public function getAssignedOwner()
    {
        return $this->assignedOwner;
    }

    /**
     * Set awb
     *
     * @param string $awb
     *
     * @return MainTable
     */
    public function setAwb($awb)
    {
        $this->awb = $awb;

        return $this;
    }

    /**
     * Get awb
     *
     * @return string
     */
    public function getAwb()
    {
        return $this->awb;
    }

    /**
     * Add sub
     *
     * @param \Mytest\TableBundle\Entity\SubTable $sub
     *
     * @return MainTable
     */
    public function addSub(\Mytest\TableBundle\Entity\SubTable $sub)
    {
        $this->subs[] = $sub;

        return $this;
    }

    /**
     * Remove sub
     *
     * @param \Mytest\TableBundle\Entity\SubTable $sub
     */
    public function removeSub(\Mytest\TableBundle\Entity\SubTable $sub)
    {
        $this->subs->removeElement($sub);
    }

    /**
     * Get subs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubs()
    {
        return $this->subs;
    }
}
