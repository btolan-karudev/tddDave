<?php

use App\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{

    protected $article;

    protected function setUp()
    {
        $this->article = new Article;
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);        
    }    

    public function testSlugIsEmptyWithNoTitle() 
    {
        $this->assertSame($this->article->getSlug(), "");
    }

    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example     \n      title";

        $this->assertEquals($this->article->getSlug(), "an_example_title");
    }

}