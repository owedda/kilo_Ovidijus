<?php

namespace App\Http\Controllers;

use Exception;
use Ovidijus\OffersPackage\ReaderInterface;

class OffersController extends Controller
{
    private ReaderInterface $reader;

    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function index()
    {
        try {
            $dataToSend = $this->reader->read(config('constants.file_location'));
        }
        catch (Exception) {
            return response(json_encode(["message" => "Reading invalid data"]), 422);
        }

        return response()->json($dataToSend->getIterator());
    }
}
