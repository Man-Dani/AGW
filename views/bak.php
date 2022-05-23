<?php 
  $textToTranslate = '';
  $translatedTest = '';

  if (isset($_POST['textToTranslate']) === true) {
    $textToTranslate = $_POST['textToTranslate'];
    $translatedTest = \App\Translator::tranlateToUpperCase($textToTranslate);
  }
?>

<iframe id="ytplayer" type="text/html" width="640" height="360"
  src="http://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"
  frameborder="0"/>

<form action="index.php" method="POST" style="margin: 50px 0px"> 
  <input type="text" value="<?= $textToTranslate ?>" name="textToTranslate" placeholder="enter your text here..."/> 
  <input type="submit" value="Translate"/> 
</form>


<form action="save.php" method="GET"> 
  <input type="text" value="<?= $translatedTest ?>" name="translatedText" placeholder="translation"/> 
  <input type="submit" value="Save"/> 
 </form>
