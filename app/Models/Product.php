<?php

namespace App\Models;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id','warehouse_id','name','price','stock','unit','shelf'];
    public function warehouse(): BelongsTo{
        return $this->belongsTo(Warehouse::class);
    }
}
