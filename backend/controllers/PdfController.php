<?php

namespace backend\controllers;

use kartik\mpdf\Pdf;

class PdfController extends \yii\web\Controller
{
    public function actionCreatePdf() {
      $pdf = new Pdf([
        'mode'        => Pdf::MODE_CORE,
        'format'      => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'destination' => Pdf::DEST_BROWSER,
        'content'     => "This is first PDF",
        'options' => ['title' => 'First PDF Title'],
         // call mPDF methods on the fly
        'methods' => [
            'SetHeader'=>['PDF Header'],
            'SetFooter'=>['{PAGENO}'],
        ]
      ]);

      return $pdf->render();
    }
}
