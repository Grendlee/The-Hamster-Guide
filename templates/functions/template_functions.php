<?php

// Output articles to HTML
function the_articlesTemp() {
  global $articles;

  echo "<div class='articles'>
                <h2>Guides</h2>";


  foreach($articles as $row)
  {
    $articleText = $row['articleText'];

    //replace all caps tp  format with <h3> tags
    $articleText = preg_replace('/\b([A-Z]+)\b/', '<h3>$1</h3>', $articleText);

    //displlay article text with p tags
    $articleText = "<p>" . $articleText . "</p>";


    ?>
        <div class="guide">
            <div class="Name">
                Author Name: <?php echo $row['name']; ?>
            </div>

            <div class="date">
                Posted on: <?php echo $row['date']; ?>
            </div>

            <div class="articleText">
                <?php echo $articleText; ?>
            </div>
        </div>
      <?php
  }
 
  echo "</div>";
}

