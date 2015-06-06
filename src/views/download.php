<?php

if (isset($aPages)) {
    $i = 0;
    while ($i < count($aPages)) {
        echo '<a href="' . PDFS_URI . $aPages[$i] . '" target="_blank">Page ' . ($i + 1) . '</a><br />';
        $i++;
    }

    echo '<br /><a href="' . $sLogUrl . '" target="_blank">View log</a>';
} else {
    echo $sError;
}
