<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Article_Tag;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\Article_TagFactory;

class Article_TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::paginate(100);
        $articles = Article::paginate(100);

        foreach($articles as $article){
            $count = rand(1,5);

            for($i = 0; $i < $count; $i++){
                Article_Tag::create([
                    'article_id' => $article->id,
                    'tag_id' => rand(100/$count*$i + 1,100/$count*($i+1))  ,
                ]);
            }
        }
    }
}
