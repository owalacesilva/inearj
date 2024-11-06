<?php

namespace App\Models;

use App\Interfaces\Entities\StationDomain;
use App\Interfaces\Entities\StationEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';


    /**
     * Get attributes to station domain
     */
    public function toDomain(): StationDomain
    {
        return new StationEntity(
            $this->id,
            $this->created_at,
            $this->updated_at,
            $this->title,
            $this->code,
        );
    }
}
