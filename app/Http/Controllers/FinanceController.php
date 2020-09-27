<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Loan;
use App\Models\Repayments;
use App\Http\Controllers\API\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function index()
    {
        $loans = Loan::where('ic', '=', Auth::user()->ic)->get();
        return view('loan.index',compact('loans',$loans));
    }

    public function create()
    {
        $currencyList = LoanController::getCurrencies()->getData()->currencyList;

        return View::make('loan.form', ['currencyList' => $currencyList]);
    }

    public function store(Request $request)
    {
        $interest_rate = 0;
        $term = $request->get('loanTerm');

        if ($term == 5) {
            $interest_rate = 3;
        }

        if ($term == 7) {
            $interest_rate = 5;
        }

        if ($term == 9) {
            $interest_rate = 7;
        }

        $loan = new Loan();
        $loan->ic = Auth::user()->ic;
        $loan->loanAmount = $request->get('loanAmount');
        $loan->loanTerm = $request->get('loanTerm');
        $loan->currency = $request->get('currency');
        $loan->interest_rate = $interest_rate;
        $loan->save();

        return redirect('/loans')->with('status', 'Loan Application Successful!');
    }

    public function pay($loan_id)
    {
        $now = Carbon::now();
        $thisWeekofMonth = $now->weekOfMonth;

        $repayments = Repayments::where('loan_id', $loan_id)
            ->latest('created_at')
            ->first();

        if (!empty($repayments)) {
            $date = Carbon::parse($repayments->created_at);
            $repaymentWeekofMonth = $date->weekOfMonth;
            if ($repaymentWeekofMonth === $thisWeekofMonth) {
                return redirect('/loans')->with('status', 'Payment Had Been Made For This Week!');
            } else {
                $this->repayment($loan_id);

                return redirect('/loans')->with('status', 'Payment Successful!');
            }
        } else {
            $this->repayment($loan_id);

            return redirect('/loans')->with('status', 'Payment Successful!');
        }
    }

    private function repayment($loan_id)
    {
        $repayment = new Repayments();
        $repayment->flag = true;
        $repayment->loan_id = $loan_id;
        $repayment->save();
    }
}
