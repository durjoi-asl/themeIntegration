<?php

namespace backend\controllers;

use Yii;
// use kartik\mpdf\Pdf;

class PdfController extends \yii\web\Controller
{
    public function actionCreatePdf() {
      $content = $this->renderPartial('_pdf');

      $pdf = Yii::$app->pdf;
      $pdf->marginLeft = 20;
      $pdf->marginRight = 15;
      $pdf->marginTop = 48;
      $pdf->marginBottom = 25;
      $pdf->marginHeader = 10;
      $pdf->marginFooter = 10;

      $mpdf = $pdf->api;

      $mpdf->SetProtection(['print'], '123456', 'abcd' );
      $mpdf->SetTitle("Acme Trading Co. - Invoice");
      $mpdf->SetAuthor("Acme Trading Co.");
      $mpdf->SetWatermarkText("Paid");
      $mpdf->showWatermarkText = true;
      $mpdf->watermark_font = 'DejaVuSansCondensed';
      $mpdf->watermarkTextAlpha = 0.1;
      $mpdf->SetDisplayMode('fullpage');
      $mpdf->WriteHtml($content);


      return $mpdf->output();
    }
}
