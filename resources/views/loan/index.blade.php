@extends('layouts.app')
@section('content')
    <a href="/loans/create">Apply Loan</a>
    <br/>
    @if (session('status'))
        <br/>
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        <br/>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Loan Amount</th>
            <th scope="col">Loan Term</th>
            <th scope="col">Currency</th>
            <th scope="col">Interest Rate</th>
            <th scope="col">Weekly Repayment Amount</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($loans as $loan)
            <tr>
                <th scope="row">{{ $loan->id }}</th>
                <td>{{ $loan->loanAmount }}</td>
                <td>{{ $loan->loanTerm }}</td>
                <td>{{ $loan->currency }}</td>
                <td>{{ $loan->interest_rate }}</td>
                <td>{{ getRepaymentAmount($loan->loanAmount, $loan->interest_rate, $loan->loanTerm) }}</td>
                <td><a href="{{ '/pay_loan/' . $loan->id }}">Pay Loan</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection