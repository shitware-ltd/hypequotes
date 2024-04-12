<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\password;

class CreateUserCommand extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make:user {name} {email} {password} {--bearer}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user.';

    /**
     * Prompt for missing input arguments using the returned questions.
     *
     * @return array<string, string>
     */
    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => ['What is the name of the user?', 'John Doe'],
            'email' => ['What is the email of the user?', 'john.doe@acme.tld'],
            'password' => fn () => password(
                label: 'Choose a secure password for the user',
                placeholder: '********',
            ),
        ];
    }

    /**
     * Perform actions after the user was prompted for missing arguments.
     */
    protected function afterPromptingForMissingArguments(InputInterface $input, OutputInterface $output): void
    {
        $input->setOption('bearer', confirm(
            label: 'Would you like to generate a bearer token for the user?',
            default: $this->option('bearer')
        ));
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => $this->argument('password'),
        ]);

        if ($this->option('bearer')) {
            $token = $user->createToken('api-token');
        }

        $this->table(['Name', 'Email', 'Bearer Token'], [
            [$user->name, $user->email, $token->plainTextToken ?? ''],
        ]);
    }
}
