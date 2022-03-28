<?php
    include './config.cfg.php';
    include './class/Gallery.class.php';

	include './layout/header.php';
	include './layout/mainNav.php';

	if(isset($_GET['page'])){
		switch ($_GET['page']) {
			case 'start':
				$pageTitle = 'Start - strona główna';
				$pageDescription = 'Start - Opis strony głównej';
				$pageUrl = './sites/start.php';
				break;
			case 'form':
				$pageTitle = 'Form - formularz dodawania plików';
				$pageDescription = 'Form - formularz dodawania plików';
				$pageUrl = './sites/form.php';
				break;
			case 'install':
				$pageTitle = 'Instalacja - Tworzneie bazy danych';
				$pageDescription = 'Instalacja - Tworzneie bazy danych';
				$pageUrl = './sites/install.php';
				break;
			case 'gallery':
				$pageTitle = 'Galerie zdjęć';
				$pageDescription = 'Galerie zdjęć';
				$pageUrl = './sites/gallery.php';
				break;

			default:
				$pageTitle = 'Default - strona główna';
				$pageDescription = 'Default - Opis strony głównej';
				$pageUrl = './sites/start.php';
				break;
		}

		include $pageUrl;
	}

	include './layout/footer.php';
?>
