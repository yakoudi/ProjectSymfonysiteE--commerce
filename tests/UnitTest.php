<?php
namespace App\Tests;

use App\Entity\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    public function testArticleTitle()
    {
        $article = new Article();
        $article->setTitle('Symfony Testing');

        $this->assertTrue($article->getTitle() === 'Symfony Testing');
        $this->assertEquals('Symfony Testing', $article->getTitle());
    }
}
