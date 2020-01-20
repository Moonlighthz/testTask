<?php

namespace App\Jobs;

use App\Contracts\TaxManagerContract;
use App\Factories\TaxManagerFactory;
use Exception;
use Illuminate\Support\Facades\Log;

class TaxJob extends Job
{
    /**
     * @var string
     */
    public $connection = 'beanstalkd';

    /**
     * @var string
     */
    public $queue = 'nalogka-notifications';

    /**
     * @var array $data
     */
    protected $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return void
     */
    public function handle()
    {
        try {
            $factory = new TaxManagerFactory($this->data);
            $manager = $factory->make();

            if (!$manager instanceof TaxManagerContract) {
                throw new Exception('Не верно задан класс-обработчик');
            }

            $manager->writeLog();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
