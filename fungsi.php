<?php
function proses_konten($option, $item) {
	global $domen, $imgna;
	$konten = str_replace('%booktitle%', $item['Title'], $option);
	if($item['Thumb']) {
		$thumb = $item['Thumb'];
	}
	else {
		$thumb = $imgna;
	}
	if(empty($item['ISBN'])) {
		$konten = preg_replace("#\[ad_isbn\](.*)\[/ad_isbn\]#", '', $konten);
	}
	$konten = str_replace(array("[ad_isbn]","[/ad_isbn]"), "", $konten);

	if(empty($item['ReleaseDate'])) {
		$konten = preg_replace("#\[ad_releasedate\](.*)\[/ad_releasedate\]#", '', $konten);
	}
	$konten = str_replace(array("[ad_releasedate]","[/ad_releasedate]"), "", $konten);

	if(empty($item['NumberOfPages'])) {					
		$konten = preg_replace("#\[ad_numberofpages\](.*)\[/ad_numberofpages\]#", '', $konten);
	}
	$konten = str_replace(array("[ad_numberofpages]","[/ad_numberofpages]"), "", $konten);

	if(empty($item['Author'])) {
		$konten = preg_replace("#\[ad_author\](.*)\[/ad_author\]#", '', $konten);
	}
	$konten = str_replace(array("[ad_author]","[/ad_author]"), "", $konten);

	if(empty($item['Publisher'])) {
		$konten = preg_replace("#\[ad_publisher\](.*)\[/ad_publisher\]#", "", $konten);
	}
	$konten = str_replace(array("[ad_publisher]","[/ad_publisher]"), "", $konten);

	if(empty($item['ListPrice'])) {
		$konten = preg_replace("#\[ad_price\](.*)\[/ad_price\]#", "", $konten);
	}
	$konten = str_replace(array("[ad_price]","[/ad_price]"), "", $konten);

	$konten = str_replace('%thumb%', $thumb, $konten);
	$konten = str_replace('%isbn%', $item['ISBN'], $konten);
	$konten = str_replace('%releasedate%', $item['ReleaseDate'], $konten);
	$konten = str_replace('%numberofpages%', $item['NumberOfPages'], $konten);
	$konten = str_replace('%author%', $item['Author'], $konten);
	$konten = str_replace('%publisher%', $item['Publisher'], $konten);
	$konten = str_replace('%price%', $item['ListPrice'], $konten);
	$konten = str_replace('%domain%', $domen, $konten);
	return $konten;
}
function text_lang() {
	global $negara;
	switch ($negara) {
		case 'fr':
			$array =	array(
				'homekw' => 'Actu|Politique|Société|Adolescents|Art|Musique|Cinéma|Bandes dessinées|Beaux livres|Cuisine|Vins|Dictionnaires|langues|encyclopédies|Droit|Entreprise|Bourse|Érotisme|Esotérisme|Paranormal|Etudes supérieures|Famille|Santé|Bien-être|Fantasy|Terreur|Histoire|Humour|Informatique|Internet|Littérature|sentimentale|Livres pour enfants|Loisirs créatifs|décoration|bricolage|Manga|Nature|animaux|Policier|Suspense|Religions|Spiritualités|Science-Fiction|Sciences humaines|Sciences|Techniques|Médecine|Scolaire|Parascolaire|Sports|passions|Tourisme|Voyages',
				'clang' => 'fr',
				'lokal' => 'fr_FR',
				'title' => 'Titre',
				'filename' => 'Nom de fichier',
				'releasedate' => 'Date de sortie',
				'numberofpages' => 'Broché',
				'pagenya' => 'pages',
				'author' => 'Auteur',
				'publisher' => 'Éditeur',
				'mustregister' => 'Inscription obligatoire',
				'relatedtt' => 'Livres Similaires',
				'lpmodaltext' => 'Vous devez créer un <span class="red">compte gratuit</span> afin de <span class="blue">Télécharger</span> ou <span class="blue">lire en ligne</span> ce livre.',
				'lpmodalregister' => 'Inscrivez-vous Maintenant',
				'search' => 'Cherche',
				'bestseller' => 'Bestseller Livres',
				'recommend' => 'Livres Recommandés',
				'nextpage' => 'Page Suivante',
				'prevpage' => 'Page Précédente',
				'read' => 'Lire En Ligne ',
				'download' => 'Télécharger ',
				'scdesc' => '%booktitle%[ad_author] par %author%[/ad_author][ad_price] a été vendu pour %price% chaque copie[/ad_price].[ad_publisher] Le livre publié par %publisher%.[/ad_publisher][ad_numberofpages] Il contient %numberofpages% le nombre de pages.[/ad_numberofpages] Inscrivez-vous maintenant pour accéder à des milliers de livres disponibles en téléchargement gratuit. L’inscription était gratuite.',
				'smdesc' => 'Télécharger %booktitle% livre en format de fichier PDF, EPUB ou Audibook gratuitement sur %domain%.'
				);
			break;
		case 'it':
			$array =	array(
				'homekw' => 'Arte|cinema|fotografia|Azione|avventura|Biografie|diari|memorie|Calendari|agende|Diritto|Dizionari|opere di consultazione|Economia|affari|finanza|Famiglia|salute|benessere|Fantascienza|Horror|Fantasy|Fumetti|manga|Gialli|Thriller|Guide di revisione|aiuto allo studio|Humour|Informatica|Web|Digital Media|Letteratura|narrativa|Letteratura erotica|Libri per bambini|ragazzi|Libri scolastici|Lingua|linguistica|scrittura|Narrativa storica|Politica|Religione|Romanzi rosa|Scienze|tecnologia|medicina|Self-help|Società|scienze sociali|Sport|Storia|Tempo libero|Viaggi',
				'clang' => 'it',
				'lokal' => 'it_IT',
				'title' => 'Titolo',
				'filename' => 'Nome del file',
				'releasedate' => 'Data di rilascio',
				'numberofpages' => 'Numero di pagine',
				'pagenya' => 'pagine',
				'author' => 'Autore',
				'publisher' => 'Editore',
				'mustregister' => 'è richiesta la registrazione',
				'relatedtt' => 'Libri Correlati',
				'lpmodaltext' => 'È necessario creare un <span class="red">account gratuito</span> per <span class="blue">scaricare</span> e <span class="blue">leggere</span> online il libro.',
				'lpmodalregister' => 'Registrati ora',
				'search' => 'Ricerca',
				'bestseller' => 'Bestseller Libri',
				'recommend' => 'Libri Consigliati',
				'nextpage' => 'Pagina Successiva',
				'prevpage' => 'Pagina Precedente',
				'read' => 'Leggi online ',
				'download' => 'Scaricare ',
				'scdesc' => '',
				'smdesc' => '');
			break;
		case 'es':
			$array =	array(
				'homekw' => 'Acción|aventura|Arte|cine|fotografía|Biografías|diarios|hechos reales|Calendarios|agendas|Ciencias|tecnología|medicina|Consulta|Cómics|manga|Deporte|Derecho|Economía|empresa|Fantasía|terror|ciencia ficción|Ficción erótica|Ficción histórica|Guías de estudio|repaso|Historia|Hogar|manualidades|estilos de vida|Humor|Infantil|juvenil|Informática internet|medios digitales|Lengua|lingüística|redacción|Libros de texto|guías de viaje|Literatura|ficción|Policíaca|negra|suspense|Política|Religión|Romántica|Salud|familia|desarrollo personal|Sociedad|ciencias sociales',
				'clang' => 'es',
				'lokal' => 'es_ES',
				'title' => 'Título',
				'filename' => 'Nombre del archivo',
				'releasedate' => 'Fecha de lanzamiento',
				'numberofpages' => 'Número de páginas',
				'pagenya' => 'páginas',
				'author' => 'Autor',
				'publisher' => 'Editor',
				'mustregister' => 'Se requiere registro',
				'relatedtt' => 'Libros Relacionados',
				'lpmodaltext' => 'Debe crear una <span class="red">cuenta gratis</span> para <span class="blue">descargar</span> y <span class="blue">leer el libro en línea.</span>',
				'lpmodalregister' => 'Regístrate ahora',
				'search' => 'Buscar',
				'bestseller' => 'Los más vendidos Libros',
				'recommend' => 'Libros recomendados',
				'nextpage' => 'Siguiente Página',
				'prevpage' => 'Pagina Anterior',
				'read' => 'Leer on-line ',
				'download' => 'Descargar ',
				'scdesc' => '',
				'smdesc' => '');
			break;
		case 'de':
			$array =	array(
				'homekw' => '',
				'clang' => 'de',
				'lokal' => 'de_DE',
				'title' => 'Titel',
				'filename' => 'Dateiname',
				'releasedate' => 'Veröffentlichungsdatum',
				'numberofpages' => 'Seitenzahl',
				'pagenya' => 'seiten',
				'author' => 'Autor',
				'publisher' => 'Herausgeber',
				'mustregister' => 'Registrierung benötigt',
				'relatedtt' => 'Ähnliche Bücher',
				'lpmodaltext' => 'Sie müssen ein <span class="red">kostenloses Konto</span> anlegen zum <span class="blue">download</span> und <span class="blue">online lesen</span> das Buch.',
				'lpmodalregister' => 'Jetzt registrieren',
				'search' => 'Suche',
				'bestseller' => 'Bestseller Bücher',
				'recommend' => 'Empfohlene Bücher',
				'nextpage' => 'Folgeseite',
				'prevpage' => 'Vorherige Seite',
				'read' => 'Online lesen ',
				'download' => 'Download ',
				'scdesc' => '',
				'smdesc' => '');
			break;
		default:
			$array =	array(
				'homekw' => 'Cracking|Study Guide|Arts|Photography|Biographies|Memoirs|Business|Money|Calendars|Childrens Books|Christian Books|Bibles|Comics|Graphic Novels|Computers|Technology|Cookbooks|Food|Wine|Crafts|Hobbies|Home|Education|Teaching|Engineering|Transportation|Gay|Lesbian|Health|Fitness|Dieting|History|Humor|Entertainment|Law|Literature|Fiction|Medical Books|Mystery|Thriller|Suspense|Parenting|Relationships|Politics|Social Sciences|Reference|Religion|Spirituality|Romance|Science|Math|Science Fiction|Fantasy|Self-Help|Sports|Outdoors|Teen|Young Adult|Test Preparation|Travel',
				'clang' => 'en',
				'lokal' => 'en_US',
				'title' => 'Title',
				'filename' => 'Filename',
				'releasedate' => 'Release Date',
				'numberofpages' => 'Number of pages',
				'pagenya' => 'pages',
				'author' => 'Author',
				'publisher' => 'Publisher',
				'mustregister' => 'registration required',
				'relatedtt' => 'Related Books',
				'lpmodaltext' => 'You must create a <span class="red">free account</span> to <span class="blue">download</span> or <span class="blue">read online</span> the book.',
				'lpmodalregister' => 'Register now',
				'search' => 'Search',
				'bestseller' => 'Bestseller Books',
				'recommend' => 'Recommended Books',
				'nextpage' => 'Next Page',
				'prevpage' => 'Previous Page',
				'read' => 'Read Online ',
				'download' => 'Download ',
				'scdesc' => 'Sign up now to access thousands of books available for free download. <b>No Charge - Registration 100% Totaly free!</b>.',
				'smdesc' => 'Sign up now to access thousands of books available for free download. <b>No Charge - Registration 100% Totaly free!</b>.');
			break;
	}
	return $array;
}
function related_books() {
	$kw = dirname(__FILE__).'/kw.txt';
	$file = file($kw, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$rand = array_rand($file, 10);

	foreach($rand as $n) {
		$pecah = explode('-', $file[$n]);
		$asin = array_pop($pecah);
		$title = str_replace('-'.$asin, '', $file[$n]);
		$title = str_replace('-', ' ', $title);
		$title = ucfirst($title);
		$hsl[] = array(
			'asin' => $asin,
			'title' => $title);
	}
	return $hsl;
}
function widget_pop($type, $negara, $detslug) {
	$url = 'https://csbook.club/azon/azon.php?pass=aanganteng&cat=books';

	if($type != false) {
		$url .= '&tipe='.$type;
	}
	if($negara != 'fr') {
		$url .= '&country=fr';
	}
	$json = json_decode(json_cached($url), true);
	if(!empty($json)) {
		$li = array();
		foreach($json as $item) {
			$li[] = array(
				'asin'	=> $item['asin'],
				'title'	=> $item['title'],
				'img'	=> $item['img']);
		}
		return $li;
	}
}
function json_cached($url) {
	$cache_filename = "cache/".md5($url).".json";
	$time_expire = time() + 24*60*60;
	if (file_exists($cache_filename)) {
		if(filectime($cache_filename) > $time_expire || filesize($cache_filename) < 20) {
			unlink($cache_filename);
			$grab = file_get_contents($url);
			file_put_contents($cache_filename, json_encode($grab));
			$xml = file_get_contents($cache_filename);
		}
		else {
			$xml = file_get_contents($cache_filename);
		}
	}
	else {
		$grab = file_get_contents($url);
		file_put_contents($cache_filename, $grab);
		$xml = file_get_contents($cache_filename);
	}
	return $xml;
}
function acak_asin($data) {
	$akun = explode('||', $data);
	$terpilih = array_rand($akun, 1);
	$pecah = explode('|', $akun[$terpilih]);
	$apinya = array(
			'tag' => $pecah[0],
			'api' => $pecah[1],
			'secretkey' => $pecah[2]);
	return $apinya;
}
function acak($data) {
	$pecah = explode('|', $data);
	if($pecah > 1) {
		$keyword = array_rand($pecah, 1);
		return $pecah[$keyword];
	}
	else {
		return $pecah[0];
	}
}
function sanitize_title2($target) {
	$ganti = array('&','&amp;');
	$ganti2 = array('_','-',':','!',',','<','>','(',')','[',']','|','/','\\','#');
	$target = str_replace($ganti, 'and', $target);
	$target = str_replace($ganti2, '-', $target);
	return sanitize_title($target);
}
function sanitize_title($text) {
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	$text = preg_replace('~[^-\w]+~', '', $text);
	$text = trim($text, '-');
	$text = preg_replace('~-+~', '-', $text);
	$text = strtolower($text);
	if (empty($text)) {
	return 'n-a';
	}
	return $text;
}
function azon_gc($q) {
	global $negara;
	$region = $negara;
	$data = azon_gc_api($region, $q);
	if(!empty($data)) {
		return $data;
	}
	else {
		$url = 'http://5.189.137.123/grabzon/grab.php?region=fr&operasi=ItemLookup&q='.$q.'&author=&page=&pass=aanganteng&submit=Search';
		$content = eksekusi($url);
		$data = json_decode($content);
		if($data != false) {
			foreach($data->item as $j) {
				$arrayhasil[] =	array(
						'Title' => $j->Title,
						'Asin' => $j->Asin,
						'ISBN' => $j->ISBN,
						'Thumb' => $j->Thumb,
						'bigThumb' => $j->bigThumb,
						'Author' => $j->Author,
						'NumberOfPages' => $j->NumberOfPages,
						'Publisher' => $j->Publisher,
						'ReleaseDate' => $j->ReleaseDate,
						'Reviews' => $j->Reviews,
						'Category' => $j->Category,
						'ListPrice' => $j->ListPrice
					);
			}
			$hasil['item'] = $arrayhasil;
			return $hasil;
		}
		else {
			return false;
		}
	}
}
function ambil_asin($link) {
	$link = ambil_kw($link);
	$pecah = explode('-', $link);
	$asin = $pecah[0];
	return $asin;
}
function ambil_kw($link) {
	$pecah = explode('/', $link);
	$kata = $pecah[2];
	return $kata;
}
function azon_gc_api($region, $q) {
	if($region == 'com') {
		$api = 'tag-20|AKIAIYOYBCBTKY7W6TOQ|0OCBlJbbtQxz8uS6wA1SsmtuEDdXlAZ8nMyGLdml||tag-20|AKIAI3N7ILFKI6TAIOIA|6WcdUg4+b9BbfNGqtnlzFcAZ53FhODftPhRxhfH0||tag-20|AKIAIGUXDYCITZZZLFWA|WqBJriEZX1T0pYEEyJBPr0wJ2fvDJCdt6msOUjh+||tag-20|AKIAJJDJVJXYYS6QJWYQ|TGUeW30DGrsiLvwcCtueDQ9CIumzrLisddX8yudE||tag-20|AKIAJGPIFU6JI2VHGRNA|iJH7Rg/VsH9k1qo1UTAS/Oi2PrZ/y/3YYvOO+5fw||tag-20|AKIAJFSKT2IELS7QSY5Q|F8IDurSJxQOu3LEl9qSgAZo/2ynFLrLFJrtVVnwb||tag-20|AKIAI5EWXGP3VVBZFLVA|r+b/3eTi0TCKZVHTqC4zF70hJy+Ef9ZmDgG0EqiH||tag-20|AKIAJFSTHGEHOLBQUW4Q|H+8+hllwVq/hckeBjEzXwL6wV3WQ2C5I3cQTvd9T||tag-20|AKIAJ3PUQXH2A3E7XY2Q|hFic2yDRID86WqXEGwg6H2BJ+js2AML7ZXkDBoBl||tag-20|AKIAJCOXFPEP4U4WBPOA|md4bmjGdQwHtsmfA/w2xhB2+Ms66C4tWE91SrWj8||tag-20|AKIAJ3CCZYSPXFN56H2Q|jdm+QBaqbvPUutKoNBDeAS4vplxery9Jc34h+yhG||tag-20|AKIAJVFIZ7YHDOYD3XPA|Z/KsZx0q5vPtqCW3rZ9/ieN0TiGDsmX4Vf7MENQ5||tag-20|AKIAI3TQQGHPIHMGRCRQ|YnUWCKqCt7BmRp2JP8sBOOu0OhWF7baFPjmfSLOY||tag-20|AKIAIYZIHWCPJLPUK3HA|iBLBOYhR8o8ZIeJh5SVNYpPhm6+ZyKPQLFTPmESV||tag-20|AKIAJ7FRDG7JYJMG2AZA|dqBRL7k/m0XhdDKKL6Z3f/GKsuEekbyCyPJeYbAy||tag-20|AKIAI4YNERINOSUDD5HA|iozhRClz2c5eRhfQpFcDlOguTWsOY4tx3DzwtCMB||tag-20|AKIAIFHMCBSRFPXNXKBQ|t7Cf+8X2FT9BAXIG3H+sNNcntZPA0rK72qvXgl+r||tag-20|AKIAIM66XRB7QWUZNH5Q|PVRBDcz4RFNTUgeKvlUEsezTGWnMmn+6vstPWy/q||tag-20|AKIAIAUUWFXZD6DMEJSA|PawKbs2BLBGbzKb/QNn6z06IpGD85xBj4rzMtVm+||tag-20|AKIAJREVXYYVDV4WIXRA|PR/QWShplP0Zdd0DUDQimsMxQbhgC3jVxMb+aAV4||tag-20|AKIAJ3L27W3QAUO7R5YQ|YyxlVlxEamBMAaEniKkWKs3xzTMSGUd7wWrsCAwW||tag-20|AKIAJQOOV6X62R5MZUYQ|uNesVwISfxcZfcsX7k/za9ZGEvdIEBDTJfFkO5vt||tag-20|AKIAJNP5YIVGWYWT26WA|sX4RN7ogpYs8Yrm8t7zX0CjJDnJNOJZUOr0GHySr||tag-20|AKIAJISYH2VTJHAG6JBA|KDUy5mMR0qYElstMt1jD6mDQUoOyamSb6LIrd9y+||tag-20|AKIAJBEI5P4V5GKN2GOA|9oPYF2KmmY1xXz07D9gazNvmMVYskx+XW2CQPtRP||tag-20|AKIAI6YYKNJBN47N5WZA|/zewc7sBLrWOZfqhoCQo5CaoEZriBRlcpPlg3Iep||tag-20|AKIAJS5YM5M5CCMMXX6Q|1OqJQqTA7/ehb+/2ZtC2RLGbbYcQkWCtpWRAGTFL||tag-20|AKIAIYCALHXLJTEFA6FA|vhDEf3ixqGeOJXfSuZqb9dC+U6Mqb0sXJUq4lkDW||tag-20|AKIAJAZKJ7TISPXDDQ7Q|L1XUxAz48VF0wgRQlBMeCPLU9j5m7aMyKXmN4JJ8||tag-20|AKIAI3OP3FHHUOOUHK5Q|0yiGHzkepZyM7FmYFs4le7u4vBUEEbWUcdOAQVDC||tag-20|AKIAIB4RLOJQEHE7OZIA|/exS7e4I3MQ9Xuc9gXxIg4JqmELutmQ5eJh+OiDF||tag-20|AKIAJKBKZMAGQ3QFXLEQ|dADYwkX7nXAonAWocgIKW4eIfoqA8cOw6kI1N8Gu||tag-20|AKIAIKNHEUTIQGLYCTPQ|ufOij7Cy7H79pTQ0iISibUPQn3Ql5L0oN6RmCMaL||tag-20|AKIAJG4J3OYGW44EAKVA|gd5eh/9EOwL/SUD/5N/N44AzxphynS/q/xClmo/e||tag-20|AKIAID4GRUJCBQBAOE6A|LYsNXS1OPEJEO0fgRxmQ9lSJC6yfdOL6JkAY3rxN||tag-20|AKIAIJS42EUNP7VHZJMA|dBGwytlE37B0DxFKz4YbSEnUPdSMeyEY3feChoQs||tag-20|AKIAIG5ZFGVEI32BXDVA|NoxtAvj3j6ZiTeRiW4HjiZJq1F8BbCbYBYwqHYi2||tag-20|AKIAJ7CK22HNFEEHJR3A|3qZzAczO4iJVJbxioRJgCcey1WiXdtfbiGldNCnj||tag1-20|AKIAISWJ7TJ2FEPF7WHA|a5smCjX3H4QRIx+9jxqpt3j1AGavuni/Ly37Btnw||tag2-20|AKIAJ5ROPL7CDXIKKWIA|QTyFO9sXaZ22l/6GTvIYVW+UkcCetQoOCZirvYPw||tag3-20|AKIAJOZA5B6ONYKMNVLA|MvGPBjPEU0byVCmU/quETwC3JPiaoSgJQE+tQYfv||tag4-20|AKIAIZKMIKX7XSJJFNIQ|a4WUEOtDsaOGIs7Kyv+EQrH4HENXhw/dWf4ZcqNC||tag5-20|AKIAJEUBFDA33KPHWKJA|ajn048MKyClCfcOpKgu0UofQan5eL1FeewWLY6zV||tag6-20|AKIAJ5JU3Q2NZLHY6JBA|KHPne5gKbiDKt04Q3B2GISyGytCzHvJaqG3/SlcV||tag7-20|AKIAJID4KIUCTOJZLKRA|Me9XqxZMABHSlWO+w+A+qRjnJRfm57Qgk/8RQzWm||tag8-20|AKIAJCNFHXE2KQ2UGM5A|pylaXI/POuPpIpi2QhhIpZMJLDo1cOYFMbeI0a5H||tag9-20|AKIAIGCZD7GWMWWIKPHQ|v2+Uf2oemtEbVESjspiNAuNmDXlsrLri26+GCTkz||tag10-20|AKIAJRJBAV6VWIXY5FOQ|arBFaINP+wpop+HCh8H08vZyTs616VqECPErkrvX||tag11-20|AKIAI25OHREA3C7MSBEA|flupZE8BD+c/gE8QAg+IFKqacb8nnKzH5uz22DSa||tag12-20|AKIAIBP27MX6LBFNIQNA|jVq4XYZNDU6tBYtwTHalLcNydeP+5XN8u3KE/rBn||tag13-20|AKIAJFKMI7477LJ75OHA|Vg3gE2lAB6U4mzcG9aaX5Fl0pR7S3uaLSFWS0AF5||tag14-20|AKIAIGVWYFFEW4OC4DIA|oB0GYliqlksGNpccz4r7wIIg6OJCQf4nop13+OEj||tag15-20|AKIAID7GKPBL7JNAEXFA|uDwW7h6W9BP83Tnfw8z37A874g3/vGTzqMcLkCAx||tag16-20|AKIAINFFFBMVLF2LS67Q|CfBeRkKd5EOMluhcgaMT/PjNRzSbwevIiAiQN8b6||tag17-20|AKIAJSODS5Z4AWO2F5HQ|GmWP2PivcjWNT6f0og/mtb4cIxQKIigPAL59s1Wk||tag18-20|AKIAJSENUTGQSYWDQIGQ|NCjZhgnzNOJUKKhctSIOgAw5lmji92L9rM65D4hU||tag19-20|AKIAJHFWKCVA2B3OCR4Q|zh3pNx3Cxw6XFFPjBcvkWmOBJU6jCQnohSIbNS6z||tag20-20|AKIAJ3NZGXUZKLSQYY2A|I6xOyX3t6dI9EK/7mbH6dCdrPH/SfTMhPsVmjgpd||tag21-20|AKIAINE323GYC5KFJ2JA|ixo5aYXJQ9LZeJdxUpcY39x/cG5iwGVTYSVaWLzV||tag22-20|AKIAJ5R6EROFPXX6CGHQ|NjRjrkfDDqYI6EohdyIFbaJux/CKJVp6suDRuGHP||tag23-20|AKIAJ6SX2JCAYZHAZELQ|pV7jVgPZehkjsJvJ/3RJzecJRdoae8npNi/1JYJC||tag24-20|AKIAJCVFHITKX35X45PA|HRQZY34SMkha9i9qIAZO+WgwWwzFkLm2GPRZx+8v||tag25-20|AKIAII4PGX2E65L2Z57Q|+SasSLhQArwxovguvMir1E1KvTrIVhwWFOKOKJYK||tag26-20|AKIAITRFV457Z2VGTUOQ|K284/ocDDunCA/ilHiHgKp9TwtbuZEq1w+uR+RZR||tag27-20|AKIAJI2JWRPDCNIHXS7A|NI47M2NQ7qCANReDgRWYLC3XzHhrXWi5LRcHuONT||tag28-20|AKIAITCUTNY5YPFRTOTQ|tDA5iWhCsWtZ4hyiYvbiGOks9nPc7WLDQPZMJqTD||tag29-20|AKIAIYWICYUBKYWFAVAA|+sTzvKZ3e7qo9QvOsj+An29SA6IIXtobpFDkVPmM||tag30-20|AKIAJHOSLURVHDXR6RGA|/LJZlcFHx4CY++vE6F/Z5brRrRPeu5sSG4MoFWvT||tag31-20|AKIAJOX6TIZVJJ23JK6A|F5aXPQAll7Av1fwyOe+5eOinI8guv6VrGgsjc/0c||tag32-20|AKIAI3EFA4HV3MUP3YNA|FlJn/hAWc/kkp1eiVmUqKFrZ8nMXM1WjgZ8blyN6||tag33-20|AKIAJP3GMVTO5J5MRVKQ|2AzFoSMaagLyC39NHT9rdyjcN32NQEjCydRtqnlR||tag34-20|AKIAIH5MQMKPSYG3ZX5A|T8PWrgCQtIxTzZ/KqebPMeL/6hutYmICtvRHrLRx||tag35-20|AKIAJJLUUM6RZ3RV5C3Q|6JNXFrBIkYA4XDQiepHbB7VRSKdcIEUKuZJuSleT||tag36-20|AKIAI257C4WTN2VKPJEQ|0qMKp+FssOpUQsieIkUDlQoBQUVHl2ZND3fXHDSO||tag37-20|AKIAJCJRFVWQB6XJ77GQ|x9qS+mvgzXY0wogDVbdmgmC9oqRJuAdf7vtKjwmv||tag38-20|AKIAJLSXJK5L4XN3KHDQ|0z2DYpPCixaCfTpDwEWOVRYKHGCNW4nHVx3bsL/D||tag39-20|AKIAIATKE65OT27BWJFQ|U83nkm0mC31Csg1dnINCb+Kz7+B62qlbLuduCeAT||tag40-20|AKIAJNPNS3GUOZLWUVRQ|64wP/ho+b/7oM7xkC4WII4P7dETE/cOv19285Bfi';
	}
	else {
		$api = 'tag-21|AKIAIYOYBCBTKY7W6TOQ|0OCBlJbbtQxz8uS6wA1SsmtuEDdXlAZ8nMyGLdml||tag-21|AKIAI3N7ILFKI6TAIOIA|6WcdUg4+b9BbfNGqtnlzFcAZ53FhODftPhRxhfH0||tag-21|AKIAIGUXDYCITZZZLFWA|WqBJriEZX1T0pYEEyJBPr0wJ2fvDJCdt6msOUjh+||tag-21|AKIAJJDJVJXYYS6QJWYQ|TGUeW30DGrsiLvwcCtueDQ9CIumzrLisddX8yudE||tag-21|AKIAJGPIFU6JI2VHGRNA|iJH7Rg/VsH9k1qo1UTAS/Oi2PrZ/y/3YYvOO+5fw||tag-21|AKIAJFSKT2IELS7QSY5Q|F8IDurSJxQOu3LEl9qSgAZo/2ynFLrLFJrtVVnwb||tag-21|AKIAI5EWXGP3VVBZFLVA|r+b/3eTi0TCKZVHTqC4zF70hJy+Ef9ZmDgG0EqiH||tag-21|AKIAJFSTHGEHOLBQUW4Q|H+8+hllwVq/hckeBjEzXwL6wV3WQ2C5I3cQTvd9T||tag-21|AKIAJ3PUQXH2A3E7XY2Q|hFic2yDRID86WqXEGwg6H2BJ+js2AML7ZXkDBoBl||tag-21|AKIAJCOXFPEP4U4WBPOA|md4bmjGdQwHtsmfA/w2xhB2+Ms66C4tWE91SrWj8||tag-21|AKIAJ3CCZYSPXFN56H2Q|jdm+QBaqbvPUutKoNBDeAS4vplxery9Jc34h+yhG||tag-21|AKIAJVFIZ7YHDOYD3XPA|Z/KsZx0q5vPtqCW3rZ9/ieN0TiGDsmX4Vf7MENQ5||tag-21|AKIAI3TQQGHPIHMGRCRQ|YnUWCKqCt7BmRp2JP8sBOOu0OhWF7baFPjmfSLOY||tag-21|AKIAIYZIHWCPJLPUK3HA|iBLBOYhR8o8ZIeJh5SVNYpPhm6+ZyKPQLFTPmESV||tag-21|AKIAJ7FRDG7JYJMG2AZA|dqBRL7k/m0XhdDKKL6Z3f/GKsuEekbyCyPJeYbAy||tag-21|AKIAI4YNERINOSUDD5HA|iozhRClz2c5eRhfQpFcDlOguTWsOY4tx3DzwtCMB||tag-21|AKIAIFHMCBSRFPXNXKBQ|t7Cf+8X2FT9BAXIG3H+sNNcntZPA0rK72qvXgl+r||tag-21|AKIAIM66XRB7QWUZNH5Q|PVRBDcz4RFNTUgeKvlUEsezTGWnMmn+6vstPWy/q||tag-21|AKIAIAUUWFXZD6DMEJSA|PawKbs2BLBGbzKb/QNn6z06IpGD85xBj4rzMtVm+||tag-21|AKIAJREVXYYVDV4WIXRA|PR/QWShplP0Zdd0DUDQimsMxQbhgC3jVxMb+aAV4||tag-21|AKIAJ3L27W3QAUO7R5YQ|YyxlVlxEamBMAaEniKkWKs3xzTMSGUd7wWrsCAwW||tag-21|AKIAJQOOV6X62R5MZUYQ|uNesVwISfxcZfcsX7k/za9ZGEvdIEBDTJfFkO5vt||tag-21|AKIAJNP5YIVGWYWT26WA|sX4RN7ogpYs8Yrm8t7zX0CjJDnJNOJZUOr0GHySr||tag-21|AKIAJISYH2VTJHAG6JBA|KDUy5mMR0qYElstMt1jD6mDQUoOyamSb6LIrd9y+||tag-21|AKIAJBEI5P4V5GKN2GOA|9oPYF2KmmY1xXz07D9gazNvmMVYskx+XW2CQPtRP||tag-21|AKIAI6YYKNJBN47N5WZA|/zewc7sBLrWOZfqhoCQo5CaoEZriBRlcpPlg3Iep||tag-21|AKIAJS5YM5M5CCMMXX6Q|1OqJQqTA7/ehb+/2ZtC2RLGbbYcQkWCtpWRAGTFL||tag-21|AKIAIYCALHXLJTEFA6FA|vhDEf3ixqGeOJXfSuZqb9dC+U6Mqb0sXJUq4lkDW||tag-21|AKIAJAZKJ7TISPXDDQ7Q|L1XUxAz48VF0wgRQlBMeCPLU9j5m7aMyKXmN4JJ8||tag-21|AKIAI3OP3FHHUOOUHK5Q|0yiGHzkepZyM7FmYFs4le7u4vBUEEbWUcdOAQVDC||tag-21|AKIAIB4RLOJQEHE7OZIA|/exS7e4I3MQ9Xuc9gXxIg4JqmELutmQ5eJh+OiDF||tag-21|AKIAJKBKZMAGQ3QFXLEQ|dADYwkX7nXAonAWocgIKW4eIfoqA8cOw6kI1N8Gu||tag-21|AKIAIKNHEUTIQGLYCTPQ|ufOij7Cy7H79pTQ0iISibUPQn3Ql5L0oN6RmCMaL||tag-21|AKIAJG4J3OYGW44EAKVA|gd5eh/9EOwL/SUD/5N/N44AzxphynS/q/xClmo/e||tag-21|AKIAID4GRUJCBQBAOE6A|LYsNXS1OPEJEO0fgRxmQ9lSJC6yfdOL6JkAY3rxN||tag-21|AKIAIJS42EUNP7VHZJMA|dBGwytlE37B0DxFKz4YbSEnUPdSMeyEY3feChoQs||tag-21|AKIAIG5ZFGVEI32BXDVA|NoxtAvj3j6ZiTeRiW4HjiZJq1F8BbCbYBYwqHYi2||tag-21|AKIAJ7CK22HNFEEHJR3A|3qZzAczO4iJVJbxioRJgCcey1WiXdtfbiGldNCnj||tag1-21|AKIAISWJ7TJ2FEPF7WHA|a5smCjX3H4QRIx+9jxqpt3j1AGavuni/Ly37Btnw||tag2-21|AKIAJ5ROPL7CDXIKKWIA|QTyFO9sXaZ22l/6GTvIYVW+UkcCetQoOCZirvYPw||tag3-21|AKIAJOZA5B6ONYKMNVLA|MvGPBjPEU0byVCmU/quETwC3JPiaoSgJQE+tQYfv||tag4-21|AKIAIZKMIKX7XSJJFNIQ|a4WUEOtDsaOGIs7Kyv+EQrH4HENXhw/dWf4ZcqNC||tag5-21|AKIAJEUBFDA33KPHWKJA|ajn048MKyClCfcOpKgu0UofQan5eL1FeewWLY6zV||tag6-21|AKIAJ5JU3Q2NZLHY6JBA|KHPne5gKbiDKt04Q3B2GISyGytCzHvJaqG3/SlcV||tag7-21|AKIAJID4KIUCTOJZLKRA|Me9XqxZMABHSlWO+w+A+qRjnJRfm57Qgk/8RQzWm||tag8-21|AKIAJCNFHXE2KQ2UGM5A|pylaXI/POuPpIpi2QhhIpZMJLDo1cOYFMbeI0a5H||tag9-21|AKIAIGCZD7GWMWWIKPHQ|v2+Uf2oemtEbVESjspiNAuNmDXlsrLri26+GCTkz||tag10-21|AKIAJRJBAV6VWIXY5FOQ|arBFaINP+wpop+HCh8H08vZyTs616VqECPErkrvX||tag11-21|AKIAI25OHREA3C7MSBEA|flupZE8BD+c/gE8QAg+IFKqacb8nnKzH5uz22DSa||tag12-21|AKIAIBP27MX6LBFNIQNA|jVq4XYZNDU6tBYtwTHalLcNydeP+5XN8u3KE/rBn||tag13-21|AKIAJFKMI7477LJ75OHA|Vg3gE2lAB6U4mzcG9aaX5Fl0pR7S3uaLSFWS0AF5||tag14-21|AKIAIGVWYFFEW4OC4DIA|oB0GYliqlksGNpccz4r7wIIg6OJCQf4nop13+OEj||tag15-21|AKIAID7GKPBL7JNAEXFA|uDwW7h6W9BP83Tnfw8z37A874g3/vGTzqMcLkCAx||tag16-21|AKIAINFFFBMVLF2LS67Q|CfBeRkKd5EOMluhcgaMT/PjNRzSbwevIiAiQN8b6||tag17-21|AKIAJSODS5Z4AWO2F5HQ|GmWP2PivcjWNT6f0og/mtb4cIxQKIigPAL59s1Wk||tag18-21|AKIAJSENUTGQSYWDQIGQ|NCjZhgnzNOJUKKhctSIOgAw5lmji92L9rM65D4hU||tag19-21|AKIAJHFWKCVA2B3OCR4Q|zh3pNx3Cxw6XFFPjBcvkWmOBJU6jCQnohSIbNS6z||tag20-21|AKIAJ3NZGXUZKLSQYY2A|I6xOyX3t6dI9EK/7mbH6dCdrPH/SfTMhPsVmjgpd||tag21-21|AKIAINE323GYC5KFJ2JA|ixo5aYXJQ9LZeJdxUpcY39x/cG5iwGVTYSVaWLzV||tag22-21|AKIAJ5R6EROFPXX6CGHQ|NjRjrkfDDqYI6EohdyIFbaJux/CKJVp6suDRuGHP||tag23-21|AKIAJ6SX2JCAYZHAZELQ|pV7jVgPZehkjsJvJ/3RJzecJRdoae8npNi/1JYJC||tag24-21|AKIAJCVFHITKX35X45PA|HRQZY34SMkha9i9qIAZO+WgwWwzFkLm2GPRZx+8v||tag25-21|AKIAII4PGX2E65L2Z57Q|+SasSLhQArwxovguvMir1E1KvTrIVhwWFOKOKJYK||tag26-21|AKIAITRFV457Z2VGTUOQ|K284/ocDDunCA/ilHiHgKp9TwtbuZEq1w+uR+RZR||tag27-21|AKIAJI2JWRPDCNIHXS7A|NI47M2NQ7qCANReDgRWYLC3XzHhrXWi5LRcHuONT||tag28-21|AKIAITCUTNY5YPFRTOTQ|tDA5iWhCsWtZ4hyiYvbiGOks9nPc7WLDQPZMJqTD||tag29-21|AKIAIYWICYUBKYWFAVAA|+sTzvKZ3e7qo9QvOsj+An29SA6IIXtobpFDkVPmM||tag30-21|AKIAJHOSLURVHDXR6RGA|/LJZlcFHx4CY++vE6F/Z5brRrRPeu5sSG4MoFWvT||tag31-21|AKIAJOX6TIZVJJ23JK6A|F5aXPQAll7Av1fwyOe+5eOinI8guv6VrGgsjc/0c||tag32-21|AKIAI3EFA4HV3MUP3YNA|FlJn/hAWc/kkp1eiVmUqKFrZ8nMXM1WjgZ8blyN6||tag33-21|AKIAJP3GMVTO5J5MRVKQ|2AzFoSMaagLyC39NHT9rdyjcN32NQEjCydRtqnlR||tag34-21|AKIAIH5MQMKPSYG3ZX5A|T8PWrgCQtIxTzZ/KqebPMeL/6hutYmICtvRHrLRx||tag35-21|AKIAJJLUUM6RZ3RV5C3Q|6JNXFrBIkYA4XDQiepHbB7VRSKdcIEUKuZJuSleT||tag36-21|AKIAI257C4WTN2VKPJEQ|0qMKp+FssOpUQsieIkUDlQoBQUVHl2ZND3fXHDSO||tag37-21|AKIAJCJRFVWQB6XJ77GQ|x9qS+mvgzXY0wogDVbdmgmC9oqRJuAdf7vtKjwmv||tag38-21|AKIAJLSXJK5L4XN3KHDQ|0z2DYpPCixaCfTpDwEWOVRYKHGCNW4nHVx3bsL/D||tag39-21|AKIAIATKE65OT27BWJFQ|U83nkm0mC31Csg1dnINCb+Kz7+B62qlbLuduCeAT||tag40-21|AKIAJNPNS3GUOZLWUVRQ|64wP/ho+b/7oM7xkC4WII4P7dETE/cOv19285Bfi';
	}
	$query = strtoupper($q);
	$apinya = acak_asin($api);
	$tag = $apinya['tag'];
	$api = $apinya['api'];
	$secretkey = $apinya['secretkey'];
	
	$agc = amagc($tag, $api, $secretkey, $region, $query);
	if(@simplexml_load_string($agc)) {
		$xmlin = simplexml_load_string($agc);
//		print_r($xmlin);
		if(!empty($xmlin->Items->Item)) {
			$total = $xmlin->Items->TotalResults;
			$arrayhasil = array();
			foreach($xmlin->Items->Item as $xml) {
				if($xml->ItemAttributes->ReleaseDate) {
					$ReleaseDate = date('F j, Y', strtotime($xml->ItemAttributes->ReleaseDate));
				} else { $ReleaseDate = null; }
				if(isset($xml->EditorialReviews->EditorialReview->Content)) {
					$reviews = $xml->EditorialReviews->EditorialReview->Content;
				} else { $reviews = null; }
				if($xml->BrowseNodes->BrowseNode) {
					$category = $xml->BrowseNodes->BrowseNode->Name;
				} else { $category = 'Uncategorized'; }
				$arraysim = array();
				if($xml->SimilarProducts->SimilarProduct) {
					foreach($xml->SimilarProducts->SimilarProduct as $similar) {
						$arraysim[] = array(
							'Asin' => (string) $similar->ASIN,
							'Title' => (string) $similar->Title);
					}
				}

				$arrayhasil[] =	array(
						'Title' => (string) $xml->ItemAttributes->Title,
						'Asin' => (string) $xml->ASIN,
						'ISBN' => (string) $xml->ItemAttributes->ISBN,
						'Thumb' => (string) $xml->MediumImage->URL,
						'bigThumb' => (string) $xml->LargeImage->URL,
						'Author' => (string) $xml->ItemAttributes->Author,
						'NumberOfPages' => (string) $xml->ItemAttributes->NumberOfPages,
						'Publisher' => (string) $xml->ItemAttributes->Publisher,
						'ReleaseDate' => (string) $ReleaseDate,
						'Reviews' => (string) $reviews,
						'Category' => (string) $category,
						'ListPrice' => (string) $xml->ItemAttributes->ListPrice->FormattedPrice,
						'similar' => $arraysim
					);
			}
			$hasil['item'] = $arrayhasil;

			if($operation == 'ItemSearch') {
				$hasil['total'] = $total;
			}
			return $hasil;
		}
		else {
			return false;
		}
	}
	else {
		return false;
	}
}
function amagc($tag, $api, $secretkey, $region, $query) {
	$time = time() + 10000;
	$method = 'GET';
	$host = 'webservices.amazon.'.$region;
	$uri = '/onca/xml';
	$slug["Service"] = "AWSECommerceService";
	$slug["Operation"] = "ItemLookup";
	$slug["AWSAccessKeyId"] = $api;
	$slug["AssociateTag"] = $tag;
	$slug["Version"] = "2011-08-01";
	$slug["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z",$time);

	$slug["ItemId"] = $query;
	$slug["SearchIndex"] = 'Books';
	$slug["IncludeReviewsSummary"] = 'True';
	$slug["TruncateReviewsAt"] = '500';
	$slug["ResponseGroup"] = 'Large';

	ksort($slug);
	$query_slug = array();
	foreach ($slug as $slugs=>$value) {
		$slugs = str_replace("%7E", "~", rawurlencode($slugs));
		$value = str_replace("%7E", "~", rawurlencode($value));
		$query_slug[] = $slugs."=".$value;
	}

	$query_slug = implode("&", $query_slug);
	$signinurl = $method."\n".$host."\n".$uri."\n".$query_slug;
	$signature = base64_encode(hash_hmac("sha256", $signinurl, $secretkey, True));
	$signature = str_replace("%7E", "~", rawurlencode($signature));
	$request = "http://".$host.$uri."?".$query_slug."&Signature=".$signature;
	$response = eksekusi($request);
	return $response;
}
function eksekusi($url) {
	$timeout = 5;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; de; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3 (.NET CLR 3.5.30729) (Prevx 3.0.5)');
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
function authorlist() {
	if (file_exists('author.txt')) {
		$myfile = fopen("author.txt", "r") or die("Unable to open file!");
		echo '<ul>';
		while( $i < 10) {
			$seek = rand(0, filesize("author.txt"));
			if ($seek > 0) {
				fseek($myfile, $seek);
				fgets($myfile);
			}
			$kiwot = fgets($myfile);
			if (!empty($kiwot)) {
				$kiwot = trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $kiwot), ' ');
				$url = str_replace (' ','-',$kiwot);
				$url = '/auteur/'.$url.'';
                $judul = preg_replace("/^(\w+\s)/", "", $kiwot);
				echo '<i class="fa fa-file-pdf-o" aria-hidden="true"style=" color:red"></i> <a href="'.$url.'" title="'.ucwords($judul).'">'.ucwords($judul).'</a> ';
				
			}
			$i++;
		}
		echo '</ul>';
		fclose($myfile);
	}
}
function poplist() {
	if (file_exists('pop.txt')) {
		$myfile = fopen("pop.txt", "r") or die("Unable to open file!");
		while( $i < 13) {
			$seek = rand(0, filesize("pop.txt"));
			if ($seek > 0) {
				fseek($myfile, $seek);
				fgets($myfile);
			}
			$kiwot = fgets($myfile);
			if (!empty($kiwot)) {
				$kiwot = trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $kiwot), ' ');
				$url = str_replace (' ','-',$kiwot);
				$url = '/telecharger/'.$url.'';
                $judul = preg_replace("/^(\w+\s)/", "", $kiwot);
				echo '<li class="list-group-item"><i class="fa fa-file-pdf-o" aria-hidden="true"style=" color:red"></i> <a href="'.$url.'" title="'.ucwords($judul).'">'.ucwords($judul).'</a></li>';
				
			}
			$i++;
		}
		fclose($myfile);
	}
}
function agclist() {
	if (file_exists('pop.txt')) {
		$myfile = fopen("pop.txt", "r") or die("Unable to open file!");
		echo '<ul>';
		while( $i < 30) {
			$seek = rand(0, filesize("pop.txt"));
			if ($seek > 0) {
				fseek($myfile, $seek);
				fgets($myfile);
			}
			$kiwot = fgets($myfile);
			if (!empty($kiwot)) {
				$kiwot = trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $kiwot), ' ');
				$url = str_replace (' ','-',$kiwot);
				$url = '/telecharger/'.$url.'';
                $judul = preg_replace("/^(\w+\s)/", "", $kiwot);
				echo '<a href="'.$url.'" title="'.ucwords($judul).'">'.ucwords($judul).'</a>';
				
			}
			$i++;
		}
		echo '</ul>';
		fclose($myfile);
	}
}

function Copasan($url){
     // inisialisasi CURL
     $data = curl_init();
     // setting CURL
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     // menjalankan CURL untuk membaca isi file
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}
function spinText($text){
    $test = preg_match_all("#\{(.*?)\}#", $text, $out);

    if (!$test) return $text;

    $toFind = Array();
    $toReplace = Array();

    foreach($out[0] AS $id => $match){
    $choices = explode("|", $out[1][$id]);
    $toFind[]=$match;
    $toReplace[]=trim($choices[rand(0, count($choices)-1)]);
    }

    return str_replace($toFind, $toReplace, $text);
}  
function auto_tag($target) {
	$target = sanitize_title2($target);
	$items = explode('-', $target);
	$items = array_unique($items);
	$tags = array();
	foreach($items as $item){		
		if (strlen($item) > 3) {
			$tags[] = "<a href='http://zulu.r867qq.net/offer?prod=536&type=exact_match&ref=5143710&q=".sanitize_title2($item)."'rel='nofollow'target='_blank' title='".$item."'>".$item."</a>";
		}
	}
	return implode(', ', $tags);
}
?>