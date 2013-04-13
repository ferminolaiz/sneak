<?php
    function asc2hex($str) {
      return chunk_split(bin2hex($str), 2, " ");
    }
?>