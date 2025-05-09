<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

function convertAccentsAndSpecialToNormal($string) {
    $table = array(
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Ă'=>'A', 'Ā'=>'A', 'Ą'=>'A', 'Æ'=>'A', 'Ǽ'=>'A',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'ă'=>'a', 'ā'=>'a', 'ą'=>'a', 'æ'=>'a', 'ǽ'=>'a',

        'Þ'=>'B', 'þ'=>'b', 'ß'=>'Ss',

        'Ç'=>'C', 'Č'=>'C', 'Ć'=>'C', 'Ĉ'=>'C', 'Ċ'=>'C',
        'ç'=>'c', 'č'=>'c', 'ć'=>'c', 'ĉ'=>'c', 'ċ'=>'c',

        'Đ'=>'Dj', 'Ď'=>'D', 'Đ'=>'D',
        'đ'=>'dj', 'ď'=>'d',

        'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ĕ'=>'E', 'Ē'=>'E', 'Ę'=>'E', 'Ė'=>'E',
        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'ę'=>'e', 'ė'=>'e',

        'Ĝ'=>'G', 'Ğ'=>'G', 'Ġ'=>'G', 'Ģ'=>'G',
        'ĝ'=>'g', 'ğ'=>'g', 'ġ'=>'g', 'ģ'=>'g',

        'Ĥ'=>'H', 'Ħ'=>'H',
        'ĥ'=>'h', 'ħ'=>'h',

        'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'İ'=>'I', 'Ĩ'=>'I', 'Ī'=>'I', 'Ĭ'=>'I', 'Į'=>'I',
        'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'į'=>'i', 'ĩ'=>'i', 'ī'=>'i', 'ĭ'=>'i', 'ı'=>'i',

        'Ĵ'=>'J',
        'ĵ'=>'j',

        'Ķ'=>'K',
        'ķ'=>'k', 'ĸ'=>'k',

        'Ĺ'=>'L', 'Ļ'=>'L', 'Ľ'=>'L', 'Ŀ'=>'L', 'Ł'=>'L',
        'ĺ'=>'l', 'ļ'=>'l', 'ľ'=>'l', 'ŀ'=>'l', 'ł'=>'l',

        'Ñ'=>'N', 'Ń'=>'N', 'Ň'=>'N', 'Ņ'=>'N', 'Ŋ'=>'N',
        'ñ'=>'n', 'ń'=>'n', 'ň'=>'n', 'ņ'=>'n', 'ŋ'=>'n', 'ŉ'=>'n',

        'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ō'=>'O', 'Ŏ'=>'O', 'Ő'=>'O', 'Œ'=>'O',
        'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ō'=>'o', 'ŏ'=>'o', 'ő'=>'o', 'œ'=>'o', 'ð'=>'o',

        'Ŕ'=>'R', 'Ř'=>'R',
        'ŕ'=>'r', 'ř'=>'r', 'ŗ'=>'r',

        'Š'=>'S', 'Ŝ'=>'S', 'Ś'=>'S', 'Ş'=>'S',
        'š'=>'s', 'ŝ'=>'s', 'ś'=>'s', 'ş'=>'s',

        'Ŧ'=>'T', 'Ţ'=>'T', 'Ť'=>'T',
        'ŧ'=>'t', 'ţ'=>'t', 'ť'=>'t',

        'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ũ'=>'U', 'Ū'=>'U', 'Ŭ'=>'U', 'Ů'=>'U', 'Ű'=>'U', 'Ų'=>'U',
        'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ũ'=>'u', 'ū'=>'u', 'ŭ'=>'u', 'ů'=>'u', 'ű'=>'u', 'ų'=>'u',

        'Ŵ'=>'W', 'Ẁ'=>'W', 'Ẃ'=>'W', 'Ẅ'=>'W',
        'ŵ'=>'w', 'ẁ'=>'w', 'ẃ'=>'w', 'ẅ'=>'w',

        'Ý'=>'Y', 'Ÿ'=>'Y', 'Ŷ'=>'Y',
        'ý'=>'y', 'ÿ'=>'y', 'ŷ'=>'y',

        'Ž'=>'Z', 'Ź'=>'Z', 'Ż'=>'Z', 'Ž'=>'Z',
        'ž'=>'z', 'ź'=>'z', 'ż'=>'z', 'ž'=>'z',

        '“'=>'"', '”'=>'"', '‘'=>"'", '’'=>"'", '•'=>'-', '…'=>'...', '—'=>'-', '–'=>'-', '¿'=>'?', '¡'=>'!', '°'=>' degrees ',
        '¼'=>' 1/4 ', '½'=>' 1/2 ', '¾'=>' 3/4 ', '⅓'=>' 1/3 ', '⅔'=>' 2/3 ', '⅛'=>' 1/8 ', '⅜'=>' 3/8 ', '⅝'=>' 5/8 ', '⅞'=>' 7/8 ',
        '÷'=>' divided by ', '×'=>' times ', '±'=>' plus-minus ', '√'=>' square root ', '∞'=>' infinity ',
        '≈'=>' almost equal to ', '≠'=>' not equal to ', '≡'=>' identical to ', '≤'=>' less than or equal to ', '≥'=>' greater than or equal to ',
        '←'=>' left ', '→'=>' right ', '↑'=>' up ', '↓'=>' down ', '↔'=>' left and right ', '↕'=>' up and down ',
        '℅'=>' care of ', '℮' => ' estimated ',
        'Ω'=>' ohm ',
        '♀'=>' female ', '♂'=>' male ',
        '©'=>' Copyright ', '®'=>' Registered ', '™' =>' Trademark ',
    );

    $string = strtr($string, $table);
    // Currency symbols: £¤¥€  - we dont bother with them for now
    $string = preg_replace("/[^\x9\xA\xD\x20-\x7F]/u", "", $string);

    return $string;
}

require_once("images.php");
require_once("imageResize.php");

	class addProducts {
		function __construct($params) {
			$self = $this;
			if (isset($_SESSION['logged']) && $_SESSION['logged'] == true ) {

				require_once("modules/connect.php");

				$connection = @new mysqli($host, $db_user, $db_password, $db_name);

				@$connection->query(sprintf("set names 'utf8'"));
				@$connection->query(sprintf("SET CHARACTER_SET 'utf8_general_ci'"));
		
				if ($connection->connect_errno!=0)
				{
					$self->status = true;
					$self->result = null;
					$self->error = "Błąd połączenia z bazą danych";
				}
				else
				{
					$title = $params['title'];
					$slug = $params['slug'];
					$category = $params['category'];
					$short = $params['short'];
					$subtitle = $params['subtitle'];
					$category = $params['category'];
					$description = str_replace('&quot;', '"', $params['description']);
					$additional = str_replace('&quot;', '"', $params['additional']);
					$image = imageUpload('file');

					if (!$slug) {
						$slug = convertAccentsAndSpecialToNormal(str_replace(" ", "-", strtolower($title)));
						$slug = str_replace('&quot;', '"', $slug);
					}

					if ($image['error'] == NULL) {
						$img = htmlspecialchars($image['photo'], ENT_QUOTES,'UTF-8');

						if ($result = @$connection->query(
						sprintf("INSERT INTO `products` (`id`, `title`, `slug`, `category`, `short`, `subtitle`, `description`, `additional`, `image`) VALUES ('','%s','%s','%s','%s','%s','%s','%s','%s')",
						mysqli_real_escape_string($connection,$title),
						mysqli_real_escape_string($connection,$slug),
						mysqli_real_escape_string($connection,$category),
						mysqli_real_escape_string($connection,$short),
						mysqli_real_escape_string($connection,$subtitle),
						mysqli_real_escape_string($connection,$description),
						mysqli_real_escape_string($connection,$additional),
						mysqli_real_escape_string($connection,$img))))
						{
							$last_id = $connection->insert_id;
							$res = @$connection->query(sprintf("UPDATE `products` SET `ord` = '".$last_id."' WHERE `id` ='".$last_id."';"));
							$self->result = null;
							$self->status = true;
							$self->error = null;
						} else {
							$self->status = true;
							$self->result = null;
							$self->error = "Nie udało sie dodać";
						}
							
						$connection->close();
					} else {

						$img = "";

						if ($result = $connection->query(
						sprintf("INSERT INTO `products` (`id`, `title`, `slug`, `category`, `short`, `subtitle`, `description`, `additional`, `image`) VALUES ('','%s','%s','%s','%s','%s','%s','%s','%s')",
						mysqli_real_escape_string($connection,$title),
						mysqli_real_escape_string($connection,$slug),
						mysqli_real_escape_string($connection,$category),
						mysqli_real_escape_string($connection,$short),
						mysqli_real_escape_string($connection,$subtitle),
						mysqli_real_escape_string($connection,$description),
						mysqli_real_escape_string($connection,$additional),
						mysqli_real_escape_string($connection,$img))))
						{
							$last_id = $connection->insert_id;
							$res = @$connection->query(sprintf("UPDATE `products` SET `ord` = '".$last_id."' WHERE `id` ='".$last_id."';"));
							$self->result = null;
							$self->status = true;
							$self->error = null;
						} else {
							$self->status = true;
							$self->result = null;
							$self->error = "Nie udało sie dodać";
						}
							
						$connection->close();
					}
				}
			} else {
				$_SESSION['logged'] = false;
				$this->status = false;
				$self->result = null;
				$this->error = "Zaloguj się!";
			}
	    }
	}
?>