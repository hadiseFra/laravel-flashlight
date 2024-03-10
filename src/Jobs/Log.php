<?php

namespace HesamRad\Flashlight\Jobs;

use HesamRad\Flashlight\Drivers\Loggable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;


class Log implements ShouldQueue
{
    /**
     * An instance of a log driver
     *
     * @var \HesamRad\Flashlight\Drivers\Loggable
     */
    protected $driver;

    /**
     * Array of data made from Request to be logged.
     *
     * @var array
     */
    protected $data;

    use
        Dispatchable,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param \HesamRad\Flashlight\Drivers\Loggable  $driver
     * @param array  $data
     * @return void
     */
    public function __construct(Loggable $driver, $data)
    {
       $this->driver = $driver;
       $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->driver->log($this->data);
    }
}
