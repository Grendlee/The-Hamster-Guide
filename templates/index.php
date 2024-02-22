<?php
  // error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Import functions
  require_once('validation.php');
//   include 'validation.php';

  // Validate form submission
  validate();
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>The Hamster Guide</title>
    <link rel="icon" href="photos/20211110_162920.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>


  



    <script type="text/javascript" src="myscript.js"></script>
</head>
<body>
    <div id="wrapper">

        <div id="theme-toggle">
          <span class="material-symbols-outlined">
            Light
          </span>
        </div>
        <header>
            <h1>The Hamster Guide</h1>
        </header>
        
        <nav>
            <ul>
                <li><a href="index.php">Community Guides</a></li>

                <li><a href="grants.php">Grants Guide</a></li>

                <li><a href="gallery.php">Gallery</a></li>

                <li><a href="documentation.php">Documentation</a></li>
            </ul>    
        </nav>

        <main>
            
            <div class="pageSpecificContent">
            <h2>Post A Hamster Article</h2>

                <form action="index.php" method="post">
                <div id="sprite1"></div>
                <div id="sprite2"></div>
                <div id="sprite3"></div>
                <div id="sprite4"></div>
                    <label>
                        Name: 
                        
                        <input type="text" name="name" id="name">
                        <?php the_validation_message('name'); ?>
                    </label>
                    <br>
                    <br>
                    <label>
                        Date:
                        <input type="date" name="date">
                    </label>
                    <br>
                    <label>
                        Enter Your Article:
                        
                        <textarea name="articleText" id="articleText"></textarea>
                        <?php the_validation_message('articleText'); ?>
                    </label>
                    <br>
                    <label>
                        *Use ALLCAPS to represent a heading. If the title is "Hamsters", input, HAMSTERS.
                    </label>
                    <button type="submit" name="button">Post Article</button>

                </form>
                
                <?php the_articles() ?>

      </div> 
                
            </div>    
        </main>

        <footer>
                Copyright &copy; The Hamster Guide <br>
                <a href="mailto:TheHamsterGuide@sniff.com">TheHamsterGuide@sniff.com</a>
        </footer>
    </div>

    
</body>
</html>
