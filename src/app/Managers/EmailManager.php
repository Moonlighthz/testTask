<?php

namespace App\Managers;

use App\Contracts\TaxManagerContract;
use Exception;
use Illuminate\Support\Facades\Log;

class EmailManager implements TaxManagerContract
{
    /**
     * @var array
     */
    protected $data;

    /**
     * EmailManager constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public static function getTransport(): string
    {
        return 'email';
    }

    /**
     * @throws Exception
     */
    public function writeLog(): void
    {
        if ($this->validate()) {
            Log::info($this->prepareDataToWrite());
        } else {
            throw new Exception('Не верная структура передаваемых данных');
        }

    }

    /**
     * @return string
     */
    public function prepareDataToWrite(): string
    {
        return $this->data['id'] . ' отправлено. transport: ' .
            $this->data['transport'] . '. to: ' . $this->data['message']['to'] . ', subject: ' .
            $this->data['message']['subject'];
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function validate(): bool
    {
        if (isset($this->data['id']) &&
            isset($this->data['message']) &&
            array_keys($this->data['message']) == $this->getMessageStructure()) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function getMessageStructure(): array
    {
        return [
            'from',
            'to',
            'subject',
            'html',
            'text',
        ];
    }
}
