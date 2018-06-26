<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $solution;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastAssignation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $assignation;

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

    public function getSolution(): ?string
    {
        return $this->solution;
    }

    public function setSolution(?string $solution): self
    {
        $this->solution = $solution;

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
}
