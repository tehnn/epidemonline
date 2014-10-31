<?php

class ReportPdfController extends Controller {

    public $layout = '//layouts/mm'; //กรณีต้องการเปลี่ยน layout หลัก

    public function actionIndex() {
        $this->render('//test/pdf');
    }

    public function actionCreatepdf($type = 'I') {
        ini_set('memory_limit', '30M');
        ini_set('max_execution_time', '60');
        
      
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        spl_autoload_register(array('YiiBase', 'autoload'));
          //เพิ่ม  font
        $fontname = $pdf->addTTFfont('pdffont/FONTNONGNAM.TTF', 'TrueTypeUnicode', '', 32);


        // set document information
        
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetTitle("UTHN PHNU");
        $pdf->SetHeaderData('', 0, "UTEHN - PHNU", "เวลาพิมพ์ " . date('Y-m-d H:i:s') . "");
        $pdf->setHeaderFont(Array('freeserif', '', '14'));
        $pdf->setFooterFont(Array('freeserif', '', '10'));
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        //$pdf->SetFont('freeserif', '', 12);
        //เรียกใช้ font ที่เพิ่ม
        $pdf->SetFont($fontname, '', 14, '', false);
        $pdf->SetTextColor(80, 80, 80);
        $pdf->AddPage();

        $sql = "select code,disease from c_disease";

        $dataReader = Yii::app()->db->createCommand($sql)->queryAll();

        $tbl = '<table cellspacing="0" cellpadding="4" border="1">';
        $tbl.= "<tr><th>รหัสโรค</th><th>ชื่อโรค</th></tr>";

        foreach ($dataReader as $key => $value) {
            $col1 = $value['code'];            
            $col2 = $value['disease'];
            $tbl.="<tr bgcolor='#FF0000'><td>$col1</td><td>$col2</td></tr>";
        }

        $tbl.='</table>';

        $pdf->writeHTML($tbl, true, false, true, false, '');

        // reset pointer to the last page
        $pdf->lastPage();

        //Close and output PDF document
        if ($type == 'I') {
            $pdf->Output('filename.pdf', 'I'); // I= Preview , D=Download
        } else {
            $pdf->Output('filename.pdf', 'D'); // I= Preview , D=Download  
        }
        Yii::app()->end();
    }

}
