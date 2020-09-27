<?php

namespace App\Http\Controllers\API;

use SoapClient;

class LoanController extends Controller
{
    public static function getCurrencies()
    {
        $soap = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?wsdl');
        $currencyList = $soap->__soapCall('ListOfCurrenciesByName', []);
        $currencyList = $currencyList->ListOfCurrenciesByNameResult->tCurrency;

        return response()->json([
           'currencyList' => $currencyList
        ]);
    }
}