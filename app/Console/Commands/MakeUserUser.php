<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class MakeUserUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makeuser:user {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Neem de beheerrechten van de gewenste gebruiker terug.';

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
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id');

        $user = User::find($id);

        if ($user->admin == true) {
            $user->admin = false;

            $user->save();

            $this->info('De gebruiker met de naam ' . $user->name . ' en user ID ' . $user->id . ' heeft nu geen beheerrechten meer.');
        } else {
            $this->error('De gebruiker met de naam ' . $user->name . ' en user ID ' . $user->id . ' had nog geen beheerrechten.');
        }
    }
}
