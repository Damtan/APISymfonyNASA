<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\NasaCameraToRoverRepository")
 */
class NasaCameraToRover
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $camera_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $rover_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCameraId(): ?int
    {
        return $this->camera_id;
    }

    public function setCameraId(int $camera_id): self
    {
        $this->camera_id = $camera_id;

        return $this;
    }

    public function getRoverId(): ?int
    {
        return $this->rover_id;
    }

    public function setRoverId(int $rover_id): self
    {
        $this->rover_id = $rover_id;

        return $this;
    }
}
