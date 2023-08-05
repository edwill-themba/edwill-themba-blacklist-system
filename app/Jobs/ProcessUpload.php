<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\StudentTeacher;
use Illuminate\Support\Facades\Redis;

class ProcessUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    /**
     * Create a new job instance.
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     */
    public function handle() : void
    {
        Redis::throttle('process_upload')->block(0)->allow(1)->every(30)->then(function () {
           // info('Lock obtained...');
            $data = array_map('str_getcsv', file($this->file));
            foreach ($data as $record) {
                StudentTeacher::updateOrCreate([
                    'fname' => $record[0]
                ], [
                    'lname' => $record[1],
                    'province' => $record[2],
                    'city' => $record[3],
                    'street_name' => $record[4],
                    'unversity' => $record[5]
                ]);
            }
            unlink($this->file);
           // Handle job...
        }, function () {
            // Could not obtain lock...
            return $this->release(5);
        });
    }
}
