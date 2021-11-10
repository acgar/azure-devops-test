<?php

namespace Acgar\AzureDevops\Test\Functional;

use PHPUnit\Framework\TestCase;

class ExternalCurlTest extends TestCase
{
    function testExternalContent()
    {
        $content = file_get_contents('https://raw.githubusercontent.com/acgar/azure-devops-test/master/.gitignore');
        $this->assertNotEmpty($content);
        $this->assertIsInt(strpos($content, 'vendor'));
    }

    function testBlobStorageContent()
    {
        $content = file_get_contents('https://iseshrstorglive.blob.core.windows.net/user-assets/acasas-dev/iseazy-fonts/1.0.0/nunito_rounded/regular/4c8b5a83a2f98c4fc18f3a4ea0516341.woff');
        $this->assertNotEmpty($content);
    }

}