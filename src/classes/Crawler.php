<?php
/**
 *
 */

namespace classes;

/**
 * Class Crawler
 */
class Crawler
{
    private $sUrl;
    private $aPages;

    /**
     * @param string $sUrl
     */
    public function __construct($sUrl)
    {
        $this->sUrl = $sUrl;
        $this->aPages = array();
        Logger::the()->log('Crawler initialised.');
        $this->doCrawl();
    }

    /**
     * @return array
     */
    public function getPages()
    {
        return $this->aPages;
    }

    /**
     *
     */
    private function doCrawl()
    {
        Logger::the()->log('Launching crawl...');

        $this->aPages[] = PdfGenerator::generate($this->sUrl);
    }
}
