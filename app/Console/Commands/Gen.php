<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TaliumAbstract\Commads\RepositoryFileGenerator;

class Gen extends Command
{
    use RepositoryFileGenerator;

    protected $signature = 'make:gen {modelName} {--m} {--c}';

    protected $description = 'Generate model and other files';

    public function __construct()
    {
        parent::__construct();
    }
}
