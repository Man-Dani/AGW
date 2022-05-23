<!DOCTYPE html>
<html>
<head>
    <title>Translator</title>
   <script src="https://cdn.jwplayer.com/libraries/tlTcl5yS.js"></script>
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="px-4 py-4 flex justify-between items-center z-100 sticky top-0 bg-teal-500">
    <a href="/">
        <img class="hidden md:block px-4 py-2" src="./media/wbh-logo.png">
        <img class="px-4 py-2 md:hidden" src="./media/wbh-logo2.png">
    </a>
    <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-black-600 p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6 gap-x-10 px-8 text-lg text-gray-700">
        <li class="px-1"><a class="hover:underline font-bold" href="/">Home</a></li>
        <li class="px-1"><a class="hover:underline font-bold" href="/about">About</a></li>
        <li class="px-1"><a class="hover:underline font-bold" href="/contact">Contact</a></li>
    </ul>
</nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
                <img class="px-4 py-2" src="./media/wbh-logo2.png">
				</a>
				<button class="navbar-close">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					<li class="mb-1">
						<a class="block p-4 font-semibold text-gray-400 hover:bg-teal-50 hover:text-teal-600 rounded" href="/">Home</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 font-semibold text-gray-400 hover:bg-teal-50 hover:text-teal-600 rounded" href="/about">About</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 font-semibold text-gray-400 hover:bg-teal-50 hover:text-teal-600 rounded" href="/contact">Contact</a>
					</li>
				</ul>
			</div>
		</nav>
    </div>

    <script>
    // Menu
    document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});
</script>

<div class="h-full -z-100">
  <?php 

    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        case '/' :
            require __DIR__ . '/views/main.php';
            break;
        case '' :
            require __DIR__ . '/views/main.php';
            break;
        case '/about' :
            require __DIR__ . '/views/about.php';
            break;
        case '/contact' :
            require __DIR__ . '/views/contact.php';
            break;
        case '/save' :
            require_once __DIR__ . "./save.php";
            \App\Save::saveForm($_POST['textToTranslate'], $_POST['translatedText']);
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/views/404.php';
            break;
    }

  ?>
</div>

<footer class="-z-10 fixed bottom-0">
    <div class="flex w-screen h-20 bg-teal-500 ">
       <div class="flex w-screen justify-center items-center text-gray-700">© 2022 Daniel Mantay</div> 
    </div>
</footer>

</body>
</html>
