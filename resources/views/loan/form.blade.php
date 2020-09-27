@extends('layouts.app')

@section('content')
    <form id="loan-form" action="{{ '/loans' }}" method="POST" class="d-none">
        @csrf
        <div class="soft">
            <div class="form-group push-half--bottom">
                <label for="ic">IC Number<span class="required-field">*</span></label>
                <input id="ic" name="ic" type="text" disabled class="input  one-whole  js-form-element-required" data-error="Please enter a valid ic number" tabindex="1" value="{{ Auth::user()->ic }}">
            </div>
            <div class="form-group push-half--bottom">
                <label for="loanAmount">Loan Amount<span class="required-field">*</span></label>
                <select name="loanAmount" id="loanAmount" class="input  form-control form-control-lg  one-whole">
                    <option value="">Please Select Loan Amount</option>
                    <option value="10000">10000</option>
                    <option value="15000">15000</option>
                    <option value="20000">20000</option>
                    <option value="25000">25000</option>
                </select>
            </div>
            <div class="form-group push-half--bottom">
                <label for="loanTerm">Loan Term<span class="required-field">*</span></label>
                <select name="loanTerm" id="loanTerm" class="input  form-control form-control-lg  one-whole">
                    <option value="">Please Select Loan Term</option>
                    <option value="5">5 Years (3% Interest Rate)</option>
                    <option value="7">7 Years (5% Interest Rate)</option>
                    <option value="9">9 Years (7% Interest Rate)</option>
                </select>
            </div>
            <div class="form-group push-half--bottom">
                <label for="currency">Loan Currency<span class="required-field">*</span></label>
                <select name="currency" id="currency" class="input  form-control form-control-lg  one-whole">
                    <option value="">Please Select Loan Currency</option>
                    @foreach($currencyList as $currency)
                        <option value="{{ $currency->sISOCode }}">{{ $currency->sISOCode . ' ' . $currency->sName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-action">
                <input type="hidden" name="_csrf" value="=">
                <button class="btn">Submit Loan Application</button>
            </div>
        </div>
    </form>
@endsection