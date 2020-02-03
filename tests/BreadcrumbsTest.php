<?php

declare(strict_types = 1);

namespace Yiisoft\Yii\Bootstrap4\Tests;

use Yiisoft\Yii\Bootstrap4\Breadcrumbs;

/**
 * Tests for Breadcrumbs widget
 *
 * BreadcrumbsTest
 */
final class BreadcrumbsTest extends TestCase
{
    public function testRender(): void
    {
        ob_start();
        ob_implicit_flush(0);

        Breadcrumbs::counter(0);

        echo Breadcrumbs::widget()
            ->homeLink(['label' => 'Home', 'url' => '#'])
            ->links([
                ['label' => 'Library', 'url' => '#'],
                ['label' => 'Data']
            ]);

        $expected = <<<HTML
<nav aria-label="breadcrumb"><ol id="w0-breadcrumb" class="breadcrumb"><li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="#">Library</a></li>
<li class="breadcrumb-item active" aria-current="page">Data</li>
</ol></nav>
HTML;


        $this->assertEqualsWithoutLE($expected, ob_get_clean());
    }
}
