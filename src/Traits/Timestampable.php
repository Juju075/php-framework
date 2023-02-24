<?php

namespace App\Traits;


use App\Framework\Database\SchemaResolver;
use Exception;

trait Timestampable
{
    private ?\DateTimeInterface $createdAt = null;
    private ?\DateTimeInterface $updatedAt = null;

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @throws Exception
     */
    public function setCreatedAt($createdAt): self
    {
        if ($createdAt instanceof \DateTime) {
            $this->createdAt = $createdAt;
        } else {
            $this->createdAt = new \DateTime($createdAt);
        }
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @throws Exception
     */
    public function setUpdatedAt($updatedAt): self
    {
        if ($updatedAt instanceof \DateTime) {
            $this->updatedAt = $updatedAt;
        } else {
            $this->updatedAt = new \DateTime($updatedAt);
        }
        return $this;
    }

    /**
     * @throws Exception
     */
    public function updateTimestamps()
    {
        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTimeImmutable);
        }
        $this->setUpdatedAt(new \DateTimeImmutable);
    }
}


