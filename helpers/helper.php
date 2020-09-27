<?php

    /**
     * @param $loanAmount
     * @param $interestRate
     * @param $loanTerm
     * @return float|int
     */
    function getRepaymentAmount($loanAmount, $interestRate, $loanTerm) {
        $period = $loanTerm * 52;
        $interestRatePerMonth = $loanAmount * $interestRate / 100 / 97.65;
        $instalment = $loanAmount / $period + $interestRatePerMonth;

        return number_format((float)$instalment, 2, '.', '');
    }
