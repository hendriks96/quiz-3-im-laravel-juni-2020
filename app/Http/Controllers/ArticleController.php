<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ArticleModel;

class ArticleController extends Controller
{
    public function index(){
        $articles = ArticleModel::getAllArticle();
        $datas['articles'] = $articles;
        return view('article.article-list', $datas);
    }

    public function create(){
        return view('article.article-create');
    }

    public function store(Request $request){
        $title = $request['title'];
        $content = $request['content'];
        $tag = $request['tag'];
        $slug = $this->slugify($request['title']);

        ArticleModel::insert($title, $content, $slug, $tag);
        return redirect('/article');
    }

    public function show($id){
        $article = ArticleModel::getArticleById($id);
        $datas['article'] = $article;
        $tag = $article->tag;
        $tagArr = [];

        //delete whitespace in tag
        $trimWhiteSpace = preg_replace('/\s+/', '', $tag);

        //chek if contains commas
        if(strpos($trimWhiteSpace, ',') !== false){
            $tagArr = explode(',', $trimWhiteSpace);
        }
        $article->tags = $tagArr;
        return view('article.article-detail', $datas);
    }

    public  function edit($id){
        $article = ArticleModel::getArticleById($id);
        $datas['article'] = $article;
        return view('article.article-edit', $datas);

    }

    public function update($id, Request $request){
        $newTitle = $request['title'];
        $newContent = $request['content'];
        $newTag = $request['tag'];
        $newSlug = $this->slugify($request['title']);

        ArticleModel::updateArticleById($id, $newTitle, $newContent, $newSlug, $newTag);
        return redirect('/article');
    }

    public function destroy($id){
        ArticleModel::deleteArticleById($id);
        return redirect('/article');
    }

    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
