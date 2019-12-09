<?php


    if(!function_exists('normalize_number')) {

        function normalize_number($number, $zeroesToAdd) {

            for($i = $zeroesToAdd; $i > 0; $i--) {
                $number .= '0';
            }

            return $number;

        }

    }

    if(!function_exists('process_big_numbers')) {


        function process_big_numbers($nomalizedNumber, $numbersCollection, $originalNumber) {

            $zeroes = substr_count($nomalizedNumber, '0');

            \Log::info('zeroes: ' . $zeroes);

            if($zeroes == 3) {

                return $numbersCollection[$nomalizedNumber[0]] . ' mil';

            } else {

                // if second digit is greater than 0 we didnt need the word 'mil'
                if($originalNumber[1] > 0) {
                    return $numbersCollection[$nomalizedNumber[0] . '0'];
                } else {
                    return $numbersCollection[$nomalizedNumber[0] . '0'] . ' mil';
                }

            }

        }

    }

