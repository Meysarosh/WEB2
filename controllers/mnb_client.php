<?php

class MNBClient {
    private $wsdl = "http://www.mnb.hu/arfolyamok.asmx?wsdl";

    public function getExchangeRates($startDate, $endDate, $currencies = null) {
        $client = new SoapClient($this->wsdl, ['trace' => true]);

        $params = [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'currencyNames' => $currencies,
        ];

        try {
            $response = $client->GetExchangeRates($params);
            return $response->GetExchangeRatesResult;
        } catch (SoapFault $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function parseExchangeRates($startDate, $endDate, $currencies = null) {
        $xmlData = $this->getExchangeRates($startDate, $endDate, $currencies);

        if (strpos($xmlData, '<Day') === false) {
            return [];
        }

        $parsedData = new SimpleXMLElement($xmlData);

        $rates = [];
        foreach ($parsedData->Day as $day) {
            $date = (string)$day['date'];
            foreach ($day->Rate as $rate) {
                $currency = (string)$rate['curr'];
                $value = (float)str_replace(',', '.', $rate);
                $rates[] = [
                    'date' => $date,
                    'currency' => $currency,
                    'value' => $value,
                ];
            }
        }
        $rates = array_reverse($rates);
        return $rates;
    }
}

// Example Usage
// $mnb = new MNBClient();
// $rates = $mnb->parseExchangeRates('2023-01-01', '2023-01-31', 'EUR,USD');

// if (empty($rates)) {
//     echo "<p>No exchange rate data available for the given date range or currencies.</p>";
// } else {
//     echo "<h2>Exchange Rates:</h2>";
//     echo "<pre>" . print_r($rates, true) . "</pre>";
// }
