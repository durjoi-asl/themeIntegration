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

      $content = $this->renderPartial('_pdf');

      $pdf = Yii::$app->pdf;
      $pdf->marginLeft = 20;
      $pdf->marginRight = 15;
      $pdf->marginTop = 48;
      $pdf->marginBottom = 25;
      $pdf->marginHeader = 10;
      $pdf->marginFooter = 10;

      $mpdf = $pdf->api;
      // $pdf->content = "This is first Global Pdf";
      // $pdf->options = ['title' => 'First PDF Title'];
      // $pdf->methods = ['SetHeader'=>['PDF Header'],
      //       'SetFooter'=>['{PAGENO}'],];

      $mpdf->SetProtection(array('print'));
      $mpdf->SetTitle("Acme Trading Co. - Invoice");
      $mpdf->SetAuthor("Acme Trading Co.");
      $mpdf->SetWatermarkText("Paid");
      $mpdf->showWatermarkText = true;
      $mpdf->watermark_font = 'DejaVuSansCondensed';
      $mpdf->watermarkTextAlpha = 0.1;
      $mpdf->SetDisplayMode('fullpage');

      // $mpdf->SetHeader("Pdf Header");
      // $pdf->SetHeader = "Pdf Header";
      $mpdf->WriteHtml($content);
      // $mpdf->SetFooter('{PAGENO}');


      return $mpdf->output();
    }
}
