<?php
/**
 *
 */

namespace classes;

/**
 * Class Logger
 */
class Logger
{
    const SEVERITY_INFO = 0;
    const SEVERITY_SUCCESS = 1;
    const SEVERITY_WARNING = 2;
    const SEVERITY_ERROR = 3;
    const SEVERITY_FATAL = 4;

    private static $oInstance;

    private $rStream;
    private $sFileName;

    /**
     *
     */
    public function __construct()
    {
        if ($this->checkFolder()) {
            if (!$this->makeNewFile()) {
                throw new \Exception('Cannot write log file');
            }
        } else {
            throw new \Exception('Cannot access log folder ' . LOGS_DIR);
        }
    }

    /**
     * @return Logger
     */
    public static function the()
    {
        if (self::$oInstance == null) {
            self::$oInstance = new Logger();
        }

        return self::$oInstance;
    }

    /**
     * Adds a log
     *
     * @param string $sMessage
     * @param integer $iSeverity
     * @return bool
     */
    public function log($sMessage, $iSeverity = self::SEVERITY_INFO)
    {
        if ($iSeverity < 0) {
            $iSeverity = 0;
        } elseif ($iSeverity > 4) {
            $iSeverity = 4;
        }

        $sSeverity = '    <span class="severity-' . $iSeverity . '">' . $this->getSeverity($iSeverity) . '</span>';
        $sMessage = preg_replace('#\*{2}(.+)\*{2}#i', '<strong>$1</strong>', $sMessage);
        $sNewline = '<br />' . PHP_EOL;

        return $this->addContentToFile($sSeverity . $sMessage . $sNewline);
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return LOGS_URI . $this->sFileName;
    }

    /**
     * @param $iSeverity
     * @return string
     */
    private function getSeverity($iSeverity)
    {
        switch ($iSeverity) {
            default:
            case 0:
                return 'Info';
                break;

            case 1:
                return 'Success';
                break;

            case 2:
                return 'Warning';
                break;

            case 3:
                return 'Error';
                break;

            case 4:
                return 'Fatal';
                break;
        }
    }

    /**
     * @return resource
     */
    private function makeNewFile()
    {
        $oFI = new \FilesystemIterator(LOGS_DIR, \FilesystemIterator::SKIP_DOTS);
        $iNbFiles = iterator_count($oFI) + 1;

        do {
            $this->sFileName = $iNbFiles . '-' . date('YmdHis') . '.html';
        } while (file_exists(LOGS_DIR . $this->sFileName));

        touch(LOGS_DIR . $this->sFileName);
        $this->rStream = fopen(LOGS_DIR . $this->sFileName, 'r+');

        $sBase = file_get_contents(LOGS_DIR . 'base.html');
        $sBase = str_replace('%DATE%', date('Y-m-d H:i:s'), $sBase);

        fseek($this->rStream, -16, SEEK_END);
        return $this->addContentToFile($sBase, false);
    }

    /**
     * @param string $sContent
     * @param bool $bAddHtmlEnd
     * @return bool
     */
    private function addContentToFile($sContent, $bAddHtmlEnd = true)
    {
        if ($bAddHtmlEnd) {
            $sContent .= '</body>' . PHP_EOL . '</html>' . PHP_EOL;
        }

        $bReturn = (bool) fputs($this->rStream, $sContent);
        fseek($this->rStream, -16, SEEK_END);

        return $bReturn;
    }

    /**
     * Checks whether we have access to the folder or not
     */
    private function checkFolder()
    {
        return is_dir(LOGS_DIR) && is_writeable(LOGS_DIR);
    }
}
