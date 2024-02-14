<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'tbl_sales';
    protected $primaryKey = 'sale_id';
    protected $fillable = ['vat', 'discount'];

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class, 'sale_id', 'sale_id');
    }
    
}
