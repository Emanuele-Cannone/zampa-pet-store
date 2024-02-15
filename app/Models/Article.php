<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'ean_code',
        'product_code',
        'description',
        'is_active',
        'in_order'
    ];

    public function getIsActiveLabelAttribute(){
        return $this->is_active ? 'Sì': 'No';
    }

    public function getInOrderLabelAttribute(){
        return $this->in_order ? 'Sì': 'No';
    }
}
