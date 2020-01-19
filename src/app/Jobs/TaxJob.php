<?php

namespace App\Jobs;

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
        $manager = TaxManagerFactory::make($this->data['transport'] ?? null);

        if (!$manager instanceof ) {
            throw new \Exception(0);
        }

        Log::info('Job completed', $this->data);
    }
}
