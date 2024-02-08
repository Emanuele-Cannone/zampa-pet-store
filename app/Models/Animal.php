<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
        'species',
        'breed',
        'year_birth',
        'is_sterilized'
    ];

    public function getIsSterilizedLabelAttribute(){
        if($this->is_sterilized){
            return 'Sì';
        }
        return 'No';
    }

    public function customer(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}
