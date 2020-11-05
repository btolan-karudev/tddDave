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

   /*  public function testSlugIsEmptyWithNoTitle() 
    {
        $this->assertSame($this->article->getSlug(), "");
    }

    public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example     \n      title";

        $this->assertEquals($this->article->getSlug(), "an_example_title");
    }

    public function testSlugDoesNotStartOrEndWithUnderscores()
    {
        $this->article->title = " An example title ";

        $this->assertEquals($this->article->getSlug(), "an_example_title");
    }

    public function testSlugNotHaveAnyNonWordCharacters()
    {
        $this->article->title = " An! example§ title? ";

        $this->assertEquals($this->article->getSlug(), "an_example_title");
    }
 */

    public function titleProvider()
    {
        return [
            "prima" => ["An example title","an_example_title"],
            "duo" => [" An example title ","an_example_title"],
            "trio" => [" An example      \n title ","an_example_title"],
            "gamma" => [" An!!! example   ? title§ ","an_example_title"]
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }

}