<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'makeuser:admin {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Geef een gebruiker naar keuze beheerrechten.';

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

        if ($user->admin == false) {
            $user->admin = true;

            $user->save();

            $this->info('De gebruiker met de naam ' . $user->name . ' en user ID ' . $user->id . ' heeft nu beheerrechten.');
        } else {
            $this->error('De gebruiker met de naam ' . $user->name . ' en user ID ' . $user->id . ' heeft heeft al beheerrechten.');
        }
    }
}
