<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankDetail extends Model
{
    use HasFactory;

    protected $table = 'user_bank_detail';
    protected $guared = ['id'] ;

    protected $fillable = [
        'user_id',
        'account_number',
        'account_holder_name',
        'bank_name',
        'bank_address',
        'branch_number',
        'institute_number',
        'routing_number',
        'swift_bic_code',
    ];
}
