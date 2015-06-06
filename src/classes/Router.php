<?php
/**
 *
 */

namespace classes;

use controllers\Controller;

/**
 * Class Router
 */
class Router
{
    private static $oInstance;

    private $aRoutes;

    /**
     *
     */
    public function __construct()
    {
        $this->aRoutes = array(
            'home',
            'notFound',
        );
    }

    /**
     * @return Router
     */
    public static function the()
    {
        if (self::$oInstance == null) {
            self::$oInstance = new Router();
        }

        return self::$oInstance;
    }

    /**
     *
     */
    public function dispatch()
    {
        $sPage = $this->parsePage() . 'Action';
        $oController = new Controller();

        $oController->$sPage();
    }

    /**
     * @return string
     */
    private function parsePage()
    {
        if (isset($_GET['page'])) {
            if (in_array($_GET['page'], $this->aRoutes)) {
                $sPage = $_GET['page'];
            } else {
                $sPage = 'notFound';
            }
        } else {
            $sPage = 'home';
        }

        return $sPage;
    }
}
