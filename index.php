<?php
// ===== 言語設定 =====
$browser_language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok($_SERVER['HTTP_ACCEPT_LANGUAGE'], ',') : '';
$language = isset($_GET['language']) ? $_GET['language'] : $browser_language;
$language = substr($language, 0, 2);
$language = in_array($language, ['de','en']) ? $language : 'en';

// ===== 言語切替リンク =====
$available_languages = [
    ['name'=>'English','token'=>'en'],
    ['name'=>'Deutsch','token'=>'de']
];
$switch_language = '';
foreach ($available_languages as $lang) {
    if ($lang['token'] !== $language) {
        $switch_language .= '<a href="?language='.$lang['token'].'">'.$lang['name'].'</a> | ';
    }
}
$switch_language = rtrim($switch_language, ' | ');
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
  <meta charset="UTF-8">
  <title>My MAMP Site</title>
  <style>
    body { font-family: Arial, sans-serif; padding:20px; }
    a { color: blue; text-decoration: none; }
    a:hover { text-decoration: underline; }
  </style>
</head>
<body>
<?php if($language==='de'): ?>
  <h1>Willkommen bei MAMP</h1>
  <p>Server: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
  <p>Document Root: <?php echo $_SERVER['DOCUMENT_ROOT']; ?></p>
  <hr>
  <p>Diese Seite auf: <?php echo $switch_language; ?></p>
<?php else: ?>
  <h1>Welcome to MAMP</h1>
  <p>Server: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
  <p>Document Root: <?php echo $_SERVER['DOCUMENT_ROOT']; ?></p>
  <hr>
  <p>This page in: <?php echo $switch_language; ?></p>
<?php endif; ?>
</body>
</html>
