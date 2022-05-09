<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ShowArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:tag {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Консольная команда должна возвращать количество статей привязанных к тегу с идентификатором {id}';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tag_id = $this->argument('id');
        $article_count = DB::table('article_tags')->where('tag_id', '=', $tag_id)->count();
        echo "Количество статей привязанных к тегу с идентификатором $tag_id - $article_count\n";
        return $article_count;
    }
}
