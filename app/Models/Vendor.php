<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $validated)
 */
class Vendor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_name',
        'address',
        'city',
        'postal_code',
        'country',
        'fiscal_code',
        'p_iva',
        'iban',
        'email',
        'pec',
        'telephone',
        'other_contact'
    ];

}
