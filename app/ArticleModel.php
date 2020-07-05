<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArticleModel extends Model
{
    public $timestamps = true;

    public static function insert($title, $content, $slug, $tag){
        DB::table('article')->insert(['title' => $title, 'content' => $content, 'slug' => $slug, 'tag' => $tag]);
    }

    public static function getAllArticle(){
        $articles = DB::table('article')->get();
        return $articles;
    }

    public static function getArticleById($id){
        $article = DB::table('article')->where('article_id', $id)->first();
        return $article;
    }

    public static function updateArticleById($id, $newTitle, $newContent, $newSlug, $newTag){
        DB::table('article')->where('article_id', $id)
            ->update([
                'title' => $newTitle,
                'content' => $newContent,
                'slug' => $newSlug,
                'tag' => $newTag,
            ]);
    }

    public static function deleteArticleById($id){
        DB::table('article')->where('article_id', $id)->delete();
    }
}
