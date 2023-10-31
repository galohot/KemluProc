<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DataFetchController extends Controller
{
    public function fetchAllData()
    {
        $messages = [];

        $commands = [
            'fetch:data_epurchasing',
            'fetch:data_lpse',
            'fetch:data_sirup'
        ];

        foreach ($commands as $command) {
            try {
                Artisan::call($command);
                $messages[$command] = 'Data fetched and stored successfully.';
            } catch (\Exception $e) {
                $messages[$command] = $e->getMessage();
            }
        }

        return response()->json(['messages' => $messages]);
    }

    public function fetchDataEpurchasing()
    {
        return $this->fetchData('fetch:data_epurchasing');
    }

    public function fetchDataLpse()
    {
        return $this->fetchData('fetch:data_lpse');
    }

    public function fetchDataSirup()
    {
        return $this->fetchData('fetch:data_sirup');
    }

    private function fetchData($command)
    {
        try {
            Artisan::call($command);
            $message = 'Data fetched and stored successfully.';
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json(['message' => $message]);
    }
}
