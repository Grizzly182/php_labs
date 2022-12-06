<?php
require_once 'CanNotReadHtmlFileException.php';
require_once 'FileNotFoundException.php';

function ConnectFile(string $pathToFile): void
{
  if (!file_exists($pathToFile)) {
    throw new FileNotFoundException("Файл не найден.");
  }
  if (strpos($pathToFile, '.html') !== false) {
    throw new CanNotReadHtmlFileException("Невозможно прочитать html файл.");
  }
}

try {
  ConnectFile('tet.php');
} catch (Exception $e) {
  echo $e->getMessage();
}
