<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index(Request $request, $number) {

        $numbersCollection = \Config::get('constants.numbers');

        $separator = \Config::get('constants.separator');

        // business logic, explode the number into array and analyze it
        $numbers = str_split($number);

        // starting response without value
        $response = '';

        // solving negative numbers
        if($numbers[0] == '-') {

            $response = 'menos ';

            // remove negative signal from array
            array_shift($numbers);

            // remove negative signal from number
            $number = substr($number, 1);

        }

        // check array length
        $numbersLength = count($numbers);

        // TODO IN THE FUTURE
        // check if is a real number
        // caso do cento e 1

        for($i = 0; $i < $numbersLength; $i++) {

            // if the actual number is 0 skip
            if($numbers[$i] == 0) {
                continue;
            }

            $leftNumber = substr($number, $i);

            // if number exists in collection, it is already normalized
            if (array_key_exists($leftNumber, $numbersCollection)) {

                $response .= $numbersCollection[$leftNumber];

                // already found all numbers
                break;

            } else {

                $nomalizedNumber = normalize_number($numbers[$i], $numbersLength - ($i +1));

                // check if normalized number exists in collection
                if(array_key_exists($nomalizedNumber, $numbersCollection)) {

                    // if number is greater than 100 and less or equal than 199, change cem to cento
                    if($leftNumber > 100 && $leftNumber <= 199) {
                        $response .= 'cento';
                    } else {
                        $response .= $numbersCollection[$nomalizedNumber];
                    }

                // if number is greater than 1k, process it
                } else if($nomalizedNumber > 1000) {

                    $response .= process_big_numbers($nomalizedNumber, $numbersCollection, $number);

                    // check if we can skip the other iterations
                    $restOfNumber = substr($number, 1);

                    if($restOfNumber == 0) {
                        break;
                    }

                } else {

                    $response .= $numbersCollection[$numbers[$i]];

                }

            }

            if($i + 1 < $numbersLength) {
                $response .= $separator;
            }

        }

        return response()->json([
            'extenso' => $response
        ]);

    }
}
