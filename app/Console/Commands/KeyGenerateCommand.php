<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class KeyGenerateCommand extends Command
{
    /**
     * The console command name.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-12
     *
     * @var string
     */
    protected $name = 'key:generate';

    /**
     * The console command description.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-12
     *
     * @var string
     */
    protected $description = "Set the application key";

    /**
     * Execute the console command.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-12
     *
     * @return mixed
     */
    public function handle()
    {
        $key = $this->getRandomKey();

        if ($this->option('show')) {
            return $this->line('<comment>' . $key . '</comment>');
        }

        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents(
                $path,
                str_replace(
                    'APP_KEY=' . env('APP_KEY'),
                    'APP_KEY=' . $key,
                    file_get_contents($path)
                )
            );
        }

        $this->info("Application key [$key] set successfully.");
    }

    /**
     * Generate a random key for the application.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-12
     *
     * @return string
     */
    protected function getRandomKey()
    {
        return Str::random(32);
    }

    /**
     * Get the console command options.
     *
     * @author Valentin magde <valentinmagde@gmail.com>
     * @since 2023-11-12
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array(
                'show',
                null,
                InputOption::VALUE_NONE,
                'Simply display the key instead of modifying files.'
            ),
        );
    }
}
