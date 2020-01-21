<?php

namespace App\Factories;

use App\Managers\EmailManager;
use Exception;

class TaxManagerFactory
{
    /**
     * @var array
     */
    protected $data;

    /**
     * TaxManagerFactory constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return EmailManager
     * @throws Exception
     */
    public function make()
    {
        switch ($this->data['transport']) {
            case EmailManager::getTransport():
                return new EmailManager($this->data);
                break;
            case null:
                throw new Exception('Не указан тип транспорта');
                break;
            default:
                throw new Exception('Неверный тип транспорта');
                break;
        }
    }
}
