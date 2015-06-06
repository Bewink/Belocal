<?php
/**
 *
 */

namespace classes;

use vendors\mikehaertl\wkhtmlto\Pdf;

/**
 * Class PdfGenerator
 */
class PdfGenerator
{
    /**
     * @param string $sUrl
     * @return null|string
     */
    public static function generate($sUrl)
    {
        $oPdf = new Pdf();
        $oPdf->addPage($sUrl);

        Logger::the()->log('Added page ' . $sUrl);
        Logger::the()->log('Generating file...');

        $sFileName = '';
        do {
            $sFileName = date('YmdHis') . '-' . md5(rand(0, PHP_INT_MAX)) . '.pdf';
        } while (file_exists(PDFS_DIR . $sFileName));

        if ($oPdf->saveAs(PDFS_DIR . $sFileName)) {
            Logger::the()->log('Successfully saved file ' . $sFileName);
            return $sFileName;
        } else {
            Logger::the()->log('Error while saving file "' . $sFileName . '": ' . $oPdf->getError());
            return null;
        }
    }
}
