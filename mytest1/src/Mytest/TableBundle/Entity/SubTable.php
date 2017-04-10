<?php

namespace Mytest\TableBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SubTable
 *
 * @ORM\Table(name="sub_table")
 * @ORM\Entity(repositoryClass="Mytest\TableBundle\Repository\SubTableRepository")
 */
class SubTable
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
     * @ORM\Column(name="status", type="string", length=20)
     * @Assert\NotBlank()
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="owner", type="string", length=20)
     * @Assert\NotBlank()
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity="MainTable", inversedBy="subs")
     * @ORM\JoinColumn(name="main_id", referencedColumnName="id")
     */
    private $mainTable;

    /**
     * @Assert\Type(type="Mytest\TableBundle\Entity\MainTable")
     * @Assert\Valid()
     */
    protected $maint;

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
     * Set status
     *
     * @param string $status
     *
     * @return SubTable
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return SubTable
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return SubTable
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set mainTable
     *
     * @param \Mytest\TableBundle\Entity\MainTable $mainTable
     *
     * @return SubTable
     */
    public function setMainTable(\Mytest\TableBundle\Entity\MainTable $mainTable = null)
    {
        $this->mainTable = $mainTable;

        return $this;
    }

    /**
     * Get mainTable
     *
     * @return \Mytest\TableBundle\Entity\MainTable
     */
    public function getMainTable()
    {
        return $this->mainTable;
    }

    public function getMaint()
    {
        return $this->maint;
    }

    public function setMaint(MainTable $maint = null)
    {
        $this->maint = $maint;
    }
}
