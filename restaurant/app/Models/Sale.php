<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use App\Models\SaleDetail;

class Sale extends Model
{
    use HasFactory;
    
    public function saleDetails(): HasMany
    {
        return $this->hasMany(saleDetail::class);
    }
}
