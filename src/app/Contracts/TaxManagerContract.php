<?php

namespace App\Contracts;

use Exception;

interface TaxManagerContract
{
    /**
     * @return string
     */
    public static function getTransport(): string;

    /**
     * @return void
     */
    public function writeLog(): void ;

    /**
     * @return bool|mixed
     * @throws Exception
     */
    public function validate(): bool;

    /**
     * @return array
     */
    public function getMessageStructure(): array;

    /**
     * @return string
     */
    public function prepareDataToWrite(): string ;
}
