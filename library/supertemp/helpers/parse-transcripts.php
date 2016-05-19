<?php

  if (!function_exists('supertemp_parse_transcripts')) :

    function supertemp_parse_transcripts($transcripts, $interviewee='', $interviewer='') {

      $x_by_p = explode("\r", $transcripts);

      echo '<dl class="transcripts">';
      
      for ($i = 0; $i < count($x_by_p); $i++) {

        $p = $x_by_p[$i];
        $x_by_tab = explode("\t", $p);
        $cite = trim( isset($x_by_tab[0]) ? $x_by_tab[0] : '');
        $q = trim( isset($x_by_tab[1]) ? $x_by_tab[1] : '');

        if ($cite) {

          // Close previous def item
          echo '</dd>';

          $replace = strtolower($cite);
          $replace = str_replace('interviewer', $interviewer, $replace);
          $replace = str_replace('interviewee', $interviewee, $replace);

          // Open new def item
          echo '<dt>'.($replace ? $replace : $cite).'</dt>';

          echo "<dd>";
        }

        echo '<p>'.$q.'</p>';

      }

      echo '</dd>';
      echo '</dl>';

    }

  endif;
  
?>