<?php

namespace App\Console\Commands;

use App\Mail\MoviesMail;
use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoMovies extends Command
{
/**
* The name and signature of the console command.
*
* @var string
*/
protected $signature = 'report:movies {--email=}';

/**
* The console command description.
*
* @var string
*/
protected $description = 'Returns a list of all movies to the admin user';

/**
* Execute the console command.
*
* @return int
*/
public function handle()
{
$sendToEmail = $this->option('email');
if(!$sendToEmail) {
    error_log("Make sure you set an email option");
return Command::FAILURE;
}
$movies = Movie::all();

if ($movies->count() > 0) {

//Send one main list of all overdue books email to management
Mail::to($sendToEmail)->send(new MoviesMail($movies));

}

return Command::SUCCESS;
}
}