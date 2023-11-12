<?php

    class Formatter {

        /* --- PROPERTIES --- */


        /* --- METHODS --- */

        public static function formatCurrency($number) {
            /*
            $currencyFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
            $currencyFormatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);
            return $currencyFormatter->formatCurrency($number, 'USD');
            */
            return '$' . number_format($number, 2);
        }

        public static function formatNumber($number, $precision) {
            /*
            $numberFormatter = new NumberFormatter('en_US',NumberFormatter::DECIMAL);
            $numberFormatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $precision);
            return $numberFormatter->format($number);
            */
            return number_format($number, $precision);
        }
    }