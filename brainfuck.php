<?php
# Brainfuck command-line Interface

if(@$argv[1]) {
  require_once("brainfuck.class.php");
  $bf = new brainfuck();
  echo $bf->parse($argv[1]);
} else echo <<<HELP
Usage: php $argv[0] "<code>"
HELP;
?>