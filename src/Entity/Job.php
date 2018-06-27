<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $instruction;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastAssignation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $assignation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Solution", mappedBy="Job")
     */
    private $solutions;

    public function __toString()
    {
        return (string)$this->id;
    }

    public function __construct()
    {
        $this->solutions = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    public function setInstruction(string $instruction): self
    {
        $this->instruction = $instruction;

        return $this;
    }

    public function getLastAssignation(): ?\DateTimeInterface
    {
        return $this->lastAssignation;
    }

    public function setLastAssignation(?\DateTimeInterface $lastAssignation): self
    {
        $this->lastAssignation = $lastAssignation;

        return $this;
    }

    public function getAssignation(): ?string
    {
        return $this->assignation;
    }

    public function setAssignation(?string $assignation): self
    {
        $this->assignation = $assignation;

        return $this;
    }

    /**
     * @return Collection|Solution[]
     */
    public function getSolutions(): Collection
    {
        return $this->solutions;
    }

    public function addSolution(Solution $solution): self
    {
        if (!$this->solutions->contains($solution)) {
            $this->solutions[] = $solution;
            $solution->setJob($this);
        }

        return $this;
    }

    public function removeSolution(Solution $solution): self
    {
        if ($this->solutions->contains($solution)) {
            $this->solutions->removeElement($solution);
            // set the owning side to null (unless already changed)
            if ($solution->getJob() === $this) {
                $solution->setJob(null);
            }
        }

        return $this;
    }
}
