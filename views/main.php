<?php
require_once __DIR__ . "/../translate.php";

$textToTranslate = '';
$translatedText = '';

if (isset($_POST['textToTranslate']) === true) {
  $textToTranslate = $_POST['textToTranslate'];
  $translatedText = \App\Translator::tranlateToUpperCase($textToTranslate);
}

?>

<div class="flex flex-col items-center">

  <div class="p-8 w-full">
    <form id="textForm" action="/" method="POST" class="flex flex-wrap gap-x-16 gap-y-10">

      <div class="flex flex-col grow">
        <textarea class="grow border-2 border-gray-200 rounded" type="text" name="textToTranslate" placeholder=" enter your text here..."><?= $textToTranslate ?></textarea>
        <div class="py-3 w-1/6 min-w-fit">
          <input class="shadow font-bold rounded bg-teal-500 text-gray-700 p-1 w-full" type="submit" value="Translate" />
        </div>
      </div>

      <div class="flex flex-col grow">
        <textarea class="grow border-2 border-gray-200 rounded" type="text" name="translatedText" placeholder=" translation"><?= $translatedText ?></textarea>
        <div class="py-3 w-1/6 min-w-fit">
          <input id="save" class="shadow font-bold rounded bg-teal-500 text-gray-700 p-1 w-full" type="submit" formaction="/save" value="Save" />
        </div>
      </div>

    </form>
  </div>

  <div class="flex justify-center bg-black container px-4">
    <video src="./media/Blumen.mp4" width="640" height="480" controls></video>
    <!--<div id="player"></div>
      <script type="text/JavaScript">
        jwplayer("player").setup({ 
            "playlist": [{
                "file": "./media/Blumen.mp4",
                "image": "./media/Screen.png",
            }],
            width: "640px",
            height: "480px",
        });
      </script>
  </div>-->
  </div>  


</div>

<script>
  const saveButton = document.getElementById('save');
  saveButton.addEventListener('click', function() {

    const myForm = document.getElementById('textForm');

    fetch('/save', {
      method: 'POST',
      body: new FormData(myForm),
    })
    
    .then(response => response.blob())
      .then(blob => {
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'halloWelt.txt';
        document.body.appendChild(a);
        a.click();
        a.remove();
      });
      
  });
</script>