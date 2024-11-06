<?php

namespace App\Interfaces\Entities;

use DateTime;

/**
 * The station entity interface.
 */
interface StationDomain
{
    public function getId(): int;
    public function getCreatedAt(): DateTime;
    public function getUpdatedAt(): DateTime;
    public function getTitle(): string;
    public function getCode(): string;
}

class StationEntity implements StationDomain
{
    /**
     * The station entity constructor.
     * 
     * @param int $id The station ID.
     * @param DateTime $createdAt The station creation date.
     * @param DateTime $updatedAt The station update date.
     * @param string $title The station title.
     * @param string $code The station code.
     */
    public function __construct(
        private int $id,
        private DateTime $createdAt,
        private DateTime $updatedAt,
        private string $title,
        private string $code
    ) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->title = $title;
        $this->code = $code;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}