<?php
declare(strict_types=1);

namespace App;

class Save {
  public static function saveForm(string $textToTranslate, string $translatedText): void
  {
    $file =  __DIR__."./translation.txt";
    $txt = fopen('php://output', "w");
    fwrite($txt, "Text to translate:" . PHP_EOL);
    fwrite($txt, $textToTranslate . PHP_EOL);
    fwrite($txt, "Translated text:" . PHP_EOL);
    fwrite($txt, $translatedText . PHP_EOL);

    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename=save.txt');
    exit();
  }
}
?>
