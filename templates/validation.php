<?php
// Global result of form validation
$valid = false;
// Global array of validation messages. For valid fields, message is ""
$val_messages = Array();

// Output the results if all fields are valid.
//bug, this version prints all articles even if invalid
function the_articles() {
  global $articles;

  echo "<div class='articles'>
                <h2>Guides</h2>";


  foreach($articles as $row)
  {
    $articleText = $row['articleText'];

    //replace =title= format with <h4> tags
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

//validation form submissions to atleast contain 1 or 2 characters
//date is not validated because it automaticlly selects current date if not applied
function validate()
{
    global $valid;
    global $val_messages;

    if($_SERVER['REQUEST_METHOD']== 'POST')
    {

      if(isset($_POST["name"]) && isset($_POST["articleText"]))
      {
        foreach($_POST as $type => $value)
        {
          if($type == "name")
          {
            if(is_string($value) && strlen($value) >= 1 && ctype_upper(substr($value, 0)))
            {
              $val_messages[$type] = "";
              $valid = true;
            }
            else
            {
              $val_messages[$type] = "Please enter a valid name where the first character is capital and there are more than or equal to 1 characters";
              $valid = false;
            }
          }
          else if($type == "articleText")
          {
            if(is_string($value) && strlen($value) >= 2)
            {
              $val_messages[$type] = "";
              $valid = true;
            }
            else
            {
              $val_messages[$type] = "Please enter a valid article where there are more than 1 characters";
              $valid = false;
            }
          }
      
        }
      }
      
      if($valid == false)
      {

      }
      else
      {
        $valid = true;
        return;
      }
      
    }
}



// Display error message if field not valid. Displays nothing if the field is valid.
function the_validation_message($type) {

  global $val_messages;

  if($_SERVER['REQUEST_METHOD']== 'POST')
  { 
    if (isset($val_messages[$type])) 
    {
      echo '<p class="failure-message">' . $val_messages[$type] . '</p>';
    }
  }
}
