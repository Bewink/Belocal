<?php
/**
 *
 */

namespace classes;

/**
 * Class Template
 */
class Template
{
    private $aVars;

    /**
     *
     */
    public function __construct()
    {
        $this->aVars = array();
    }

    /**
     * @param array $aVars
     */
    public function assign($aVars, $aValue = null)
    {
        if ($aValue == null) {
            $this->aVars = array_merge($this->aVars, $aVars);
        } else {
            $this->aVars[$aVars] = $aValue;
        }
    }

    /**
     * @param string $sFile
     * @param array $aVars
     */
    public function render($sFile, $aVars = array())
    {
        $this->assign($aVars);
        extract($this->aVars);

        require(VIEWS_DIR . 'header.php');
        require(VIEWS_DIR . $sFile);
        require(VIEWS_DIR . 'footer.php');
    }
}
