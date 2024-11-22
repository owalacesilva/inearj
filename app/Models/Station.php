<?php

namespace App\Models;

use App\Interfaces\Entities\StationDomain;
use App\Interfaces\Entities\StationEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
     * The attributes that are mass assignable.
     */
    public function dataCollections(): HasMany
    {
        return $this->hasMany(DataCollection::class);
    }


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
