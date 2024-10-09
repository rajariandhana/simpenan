<?php

namespace App\Models;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    /** @use HasFactory<\Database\Factories\WarehouseFactory> */
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id','name'];

    public function products(): HasMany{
        return $this->hasMany(Product::class);
    }
}
