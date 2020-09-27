<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['ic', 'loanAmount', 'loanTerm', 'currency', 'interest_rate'];

    public function repayments()
    {
        return $this->hasMany('App\Models\Repayments', 'loan_id', 'id');
    }
}
