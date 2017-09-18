<?php
namespace Schmutt\Tablespan\ViewHelper;


class TableColspanViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {


    /**
     * @param array $row - array with row content
     * @param bool $head - true if this is row with "<th>"
     * @param string $delimiter - delimiter for content and colspan number
     *
     * Example TYPO3 Table:
     *     Col1|Col2|Col3
     *     Content1|Content2|Content3
     *     Colspan2;;;2|Content3
     *
     * Usage in Fluid:
     * <tr>
     *     <schmutt:tableColspan row="{row}" head="{rowIterator.isFirst}" />
     * </tr>
    */
    public function render($row, $head=false, $delimiter=';;;') {

        $output = '';
        $rowEnd = count($row);
        for ($i=0;$i<$rowEnd;$i++) {
            $cell = $row[$i];
            $cellArray = explode($delimiter, $cell);

            if ($head) {
                $tag = '<th';
                $tagEnd = '</th>';
            } else {
                $tag = '<td';
                $tagEnd = '</td>';
            }

            if (count($cellArray) > 0) {
                $colspan = (int)$cellArray[1];
                if ($colspan > 1) {
                    $tag .= ' colspan="' . $colspan . '" ';
                    $rowEnd = $rowEnd - $colspan + 1;
                }
            }
            $tag .= '>';

            $content = $cellArray[0];

            $output .= $tag . $content . $tagEnd;
        }


        return $output;
    }

}