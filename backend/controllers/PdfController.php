<?php

namespace backend\controllers;

use Yii;
// use kartik\mpdf\Pdf;

class PdfController extends \yii\web\Controller
{
    public function actionCreatePdf() {
      // $pdf = new Pdf([
      //   'mode'        => Pdf::MODE_CORE,
      //   'format'      => Pdf::FORMAT_A4,
      //   'orientation' => Pdf::ORIENT_PORTRAIT,
      //   'destination' => Pdf::DEST_BROWSER,
      //   'content'     => "This is first PDF",
      //   'options' => ['title' => 'First PDF Title'],
      //    // call mPDF methods on the fly
      //   'methods' => [
      //       'SetHeader'=>['PDF Header'],
      //       'SetFooter'=>['{PAGENO}'],
      //   ]
      // ]);

      $pdf = Yii::$app->pdf;
      $mpdf = $pdf->api;
      // $pdf->content = "This is first Global Pdf";
      // $pdf->options = ['title' => 'First PDF Title'];
      // $pdf->methods = ['SetHeader'=>['PDF Header'],
      //       'SetFooter'=>['{PAGENO}'],];

      $mpdf->SetHeader("Pdf Header");
      // $pdf->SetHeader = "Pdf Header";
      $mpdf->WriteHtml("This is first Api Called");
      $mpdf->SetFooter('{PAGENO}');


      return $mpdf->output();
    }
}
