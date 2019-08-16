<?php $title = 'Tous les Chapitres'; ?>

<?php ob_start(); ?>
<div style="background-color: #216583; height: 200px;">
    <h1 class="text-center m-5 text-white"> Tous les Chapitres </h1>
  </div>
<div class="container-fluide">
<?php
 // print_r($countPost);


?>
      <div class="col-md-12 mt-3"  data-aos="">
        <nav class="col-md-1 col-xs-12 col-sm-12 mx-auto" aria-label="Page navigation example">
            <ul class="pagination">

      <?php

      $nbArt = $countPost['nbArt'];
      $nbPage = ceil($nbArt/$_SESSION['perPage']);
      $_SESSION['nbPage'] = $nbPage;
      $_SESSION['nbArt'] = $nbArt;
      // $_SESSION['nbArt'];

      if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <=  $_SESSION['nbPage']) {
        $_SESSION['cPage'] = $_GET['page'];
        $_SESSION['cPage'] = $_SESSION['cPage'];
      } else {
        $_SESSION['cPage'] = 1;
        $_SESSION['cPage'] = $_SESSION['cPage'];
      }
      for($i=1; $i<=$nbPage;$i++) {
           echo '<li class="page-item"><a class="page-link" href="index.php?action=pagination'. '&amp;' . 'page' . '=' . $i .'">' . $i . '</a></li>';
      }

               ?>
            </ul>
          </nav>
        </div>
        </div>
        <?php
        while ($dbAllPosts = $allPosts->fetch())
        {
        ?>
            <div class="card-body col-md-12" data-aos="fade-up">
                  <div class="card m-5">
                    <div class="card-header">
                      <span class="font-weight-bold"> <?= $dbAllPosts['title'] . ", "; ?></span>
                      <span class="font-weight-lighter font-italic">publié le <?= $dbAllPosts['creation_date_fr'] ?></span>
                      <a style="text-decoration: none; color:#ff8a5c;" class="btn-read_link m-3" href="index.php?action=post&amp;postId=<?= $dbAllPosts['id'] ?>"><i id="iconRead" style="animation-duration: 3s;" class="fab fa-readme fa-2x animated infinite rubberBand" title="Lire ce chapitre"></i></a>
                    </div>
                  <div class="m-5">
                <article class="card-text m-3 content-post">
                    <?= $dbAllPosts['extractContent']  . '<strong> [...] </strong>'; ?>
                </article>
              </div>
            </div>
          </div>
        <?php
        }
        $allPosts->closeCursor();
        ?>
        <?php $content = ob_get_clean(); ?>
        <?php require('View/frontend/template.php'); ?>