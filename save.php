<?php
declare(strict_types=1);

namespace App;

class Save {
  public static function saveForm(string $textToTranslate, string $translatedText): void
  {
    ob_end_clean();
    $file =  tmpfile();
    fwrite($file, "Text to translate:" . PHP_EOL);
    fwrite($file, $textToTranslate . PHP_EOL);
    fwrite($file, "Translated text:" . PHP_EOL);
    fwrite($file, $translatedText . PHP_EOL);

    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment');
    fseek($file, 0);
    echo fread($file, 1024);
    fclose($file);
    exit;
  }
}

