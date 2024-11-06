<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Entities\DataCollectionDomain;
use App\Models\DataCollection;

/**
 * Interface ReportRepositoryInterface
 * @package App\Repositories
 */
interface ReportRepositoryInterface
{
    /**
     * Create a new report.
     * 
     * @param DataCollectionDomain $data The data to create the report from
     * @return DataCollection The created report
     */
    public function createReport(DataCollectionDomain $data): DataCollection;
}