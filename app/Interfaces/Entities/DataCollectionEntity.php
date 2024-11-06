<?php

namespace App\Interfaces\Entities;

use App\Interfaces\Entities\StationDomain;
use DateTime;

/**
 * The data collection entity interface.
 */
interface DataCollectionDomain
{
    public function getId(): int;
    public function getCreatedAt(): DateTime;
    public function getUpdatedAt(): DateTime;
    public function getStation(): StationDomain;
    public function getCollectedAt(): DateTime;
    public function getRain(): int;
    public function getLevel(): int;
}

class DataCollectionEntity implements DataCollectionDomain
{
    /**
     * The data collection entity constructor.
     * 
     * @param int $id The data collection ID.
     * @param DateTime $createdAt The data collection creation date.
     * @param DateTime $updatedAt The data collection update date.
     * @param StationDomain $station The data collection station.
     * @param DateTime $collectedAt The data collection collected date.
     * @param int $rain The data collection rain amount.
     * @param int $level The data collection level amount.
     */
    public function __construct(
        private ?int $id = null,
        private ?DateTime $createdAt = null,
        private ?DateTime $updatedAt = null,
        private ?StationDomain $station = null,
        private DateTime $collectedAt,
        private int $rain,
        private int $level
    ) {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->station = $station;
        $this->collectedAt = $collectedAt;
        $this->rain = $rain;
        $this->level = $level;
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

    public function getStation(): StationDomain
    {
        return $this->station;
    }

    public function getCollectedAt(): DateTime
    {
        return $this->collectedAt;
    }

    public function getRain(): int
    {
        return $this->rain;
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}