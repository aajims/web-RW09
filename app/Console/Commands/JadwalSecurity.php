<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Jadwal;
use App\Http\Controllers\JadwalController;
class JadwalSecurity extends Command
{
   
    protected $signature = 'jadwal:security';

    protected $description = 'Menjadwalkan petugas security';
    protected $jadwalController;
    public function __construct(JadwalController $jadwalController)
    {
        parent::__construct();
        $this->jadwalController = $jadwalController;
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->jadwalController->jadwalPetugas();
    }
}
