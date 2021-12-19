<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CarteiraController;

class dailyAt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'carrega:ativos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualização das informações de ativos do app';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $controller = new CarteiraController();
        $controller->atualizar_dados();
    }
}
