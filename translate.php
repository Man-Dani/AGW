<?php
declare(strict_types=1);

namespace App;

class Translator {
  public static function tranlateToUpperCase(string $string): string {
    return strtoupper($string);
  }
}

?>
