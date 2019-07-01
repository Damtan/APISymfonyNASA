<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\NasaSpaceMissionRepository")
 */
class NasaSpaceMission
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
    private $eid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img_src;

    /**
     * @ORM\Column(type="datetime")
     */
    private $earth_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEid(): ?int
    {
        return $this->eid;
    }

    public function setEid(int $eid): self
    {
        $this->eid = $eid;

        return $this;
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
}
