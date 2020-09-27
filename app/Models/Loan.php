<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['ic', 'loanAmount', 'loanTerm', 'currency', 'interest_rate'];
}
