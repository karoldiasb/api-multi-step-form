<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlanCompilation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'plan_id', 'plan_type_id', 'value'];

    /**
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    public function planType(): HasOne
    {
        return $this->HasOne(PlanType::class, 'id', 'plan_type_id');
    }
}
