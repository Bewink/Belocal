<?php
/**
 *
 */

namespace controllers;

use classes\Crawler;
use classes\Logger;
use classes\Template;

/**
 * Class Controller
 */
class Controller
{
    private $oTemplate;

    /**
     *
     */
    public function __construct()
    {
        $this->oTemplate = new Template();
    }

    /**
     *
     */
    public function homeAction()
    {
        if (isset($_POST['url']) && preg_match('#^https?://#', $_POST['url'])) {
            $sUrl = htmlentities($_POST['url']);

            try {
                $oCrawler = new Crawler($sUrl);

                $i = 0;
                $aPages = $oCrawler->getPages();
                $sLogUrl = Logger::the()->getFileName();

                $this->oTemplate->assign(array(
                    'aPages' => $aPages,
                    'sLogUrl' => $sLogUrl,
                ));
            } catch (Exception $oE) {
                $sError = 'Error : ' . $oE->getMessage();

                $this->oTemplate->assign('sError', $sError);
            }

            $this->oTemplate->render('download.php');
        } else {
            if (isset($_POST['url']) && !preg_match('#^https?://#', $_POST['url'])) {
                $sError = 'Please provide an entire URL, beginning with "http://" or "https://".';
            }

            $this->render('home.php');
        }
    }

    /**
     *
     */
    public function notFoundAction()
    {
        $this->render('404.php');
    }

    /**
     * @param $sFile
     */
    private function render($sFile)
    {
        require(VIEWS_DIR . 'header.php');
        require(VIEWS_DIR . $sFile);
        require(VIEWS_DIR . 'footer.php');
    }
}
