<?php

namespace App\Jobs;

use App\Models\Absensi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MarkAbsentStudents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $absensi;

    public function __construct(Absensi $absensi)
    {
        $this->absensi = $absensi;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $unattendedStudents = $this->absensi->getUnattendedStudents();

        foreach ($unattendedStudents as $student) {
            $student->absensis()->attach($this->absensi->id, ['status' => 'alpa']);
        }
    }
}
