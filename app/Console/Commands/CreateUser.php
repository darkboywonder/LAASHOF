<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Parental\Tests\Models\Admin;

class CreateUser extends Command
{
    // @todo: remove this command when we allow public members
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {--no-interactivity} {--f|first=} {--l|last=} {--e|email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user record for registration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('no-interactivity') && is_null($this->option('email'))) {
            $this->error("Email missing. Please pass email with command using '-e=' shortcut or '--email=' option");
            return Command::FAILURE;
        }

        $email = $this->option('email') ?? $this->ask('What is the user\'s email');

        $user = User::firstWhere('email', $email);

        if ($user) {
            $this->error('User already exists. Please register user.');
            return Command::FAILURE;
        }

        if ($this->option('no-interactivity') && (is_null($this->option('first')) || is_null($this->option('last')))) {
            $this->error("first name or last name is missing. Please pass both using their respective options '(-f=, --first=)' and '(-l=, -last=)'");
            return Command::FAILURE;
        }

        $user = User::create([
            'first_name' => $this->option('first') ?? $this->ask("What's the user's first name?"),
            'last_name' => $this->option('last') ?? $this->ask("What's the user's last name?"),
            'type' => 'admin',
            'email' => $email,
            'phone' => 'add',
            'city' => 'add',
            'state' => 'add',
            'address' => 'add',
            'zip' => 'add',
        ]);

        if ($user) {
            $this->info('User was successfully created!');
            return Command::SUCCESS;
        } else {
            $this->error('There was an issue creating the user. Please check the logs.');
            return Command::FAILURE;
        }
    }
}
