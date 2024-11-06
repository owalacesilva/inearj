<?php

namespace App\Repositories;

use App\Interfaces\Entities\DataCollectionDomain;
use App\Interfaces\Repositories\ReportRepositoryInterface;
use App\Models\DataCollection;

/**
 * Class ReportRepository
 * @package App\Repositories
 */
class ReportRepository implements ReportRepositoryInterface
{
    public function createReport(DataCollectionDomain $report): DataCollection
    {
        return DataCollection::create([
            'station_id' => $report->getStation()->getId(),
            'collected_at' => $report->getCollectedAt(),
            'rain' => $report->getRain(),
            'level' => $report->getLevel()
        ]);
    }
}