<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;


/**
 * @ApiFilter(NumericFilter::class, properties={"id"})
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\NasaSpaceFullInfoViewRepository")
 * @ORM\Entity(readOnly=true)
 * @ORM\Table(name="nasa_space_full_info_view")
 */
class NasaSpaceFullInfoView
{
    const TABLE_NAME = 'nasa_space_full_info';


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img_src;

    /**
     * @ORM\Column(type="datetime")
     */
    private $earth_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $camera_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $camera_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $camera_full_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $rover_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rover_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgSrc(): ?string
    {
        return $this->img_src;
    }

    public function setImgSrc(string $img_src): self
    {
        $this->img_src = $img_src;

        return $this;
    }

    public function getEarthDate(): ?\DateTimeInterface
    {
        return $this->earth_date;
    }

    public function setEarthDate(\DateTimeInterface $earth_date): self
    {
        $this->earth_date = $earth_date;

        return $this;
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

    public function getCameraName(): ?string
    {
        return $this->camera_name;
    }

    public function setCameraName(string $camera_name): self
    {
        $this->camera_name = $camera_name;

        return $this;
    }

    public function getCameraFullName(): ?string
    {
        return $this->camera_full_name;
    }

    public function setCameraFullName(string $camera_full_name): self
    {
        $this->camera_full_name = $camera_full_name;

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

    public function getRoverName(): ?string
    {
        return $this->rover_name;
    }

    public function setRoverName(string $rover_name): self
    {
        $this->rover_name = $rover_name;

        return $this;
    }
}
