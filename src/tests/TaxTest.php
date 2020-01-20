<?php

use App\Jobs\TaxJob;

class TaxTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testTax()
    {
        $task = [
            'id' => 'hMRYdzqkXrQkAj6KlwuojpbWIhiPC3G9',
            'transport' => 'email',
            'message' => [
                'from' => '"Our service" <service@example.com>',
                'to' => '"Иван Сидоров" <ivan@example.com>',
                'subject' => 'Наложка.РФ. Добро пожаловать!',
                'html' => '...',
                'text' => '...'
            ]
        ];

        dispatch(new TaxJob($task));
    }
}
