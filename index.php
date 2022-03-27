<?php
    include './config.cfg.php';
    include './class/Gallery.class.php';

	include './layout/header.php';

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

			default:
				# code...
				break;
		}

		include $pageUrl;
	}

	include './layout/footer.php';
?>
