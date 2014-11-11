<!DOCTYPE html>
<head lang="en">
    <meta charset="UTF-8">
      <title>IsItOutYet - Result</title>
          <style>
              body
              {
              background-color:#d0e4fe;
              }
          </style>
</head>
     <body>
     <h1>Welcome to the page</h1>
     <br/>
    <?php
        if(isset($_POST['submit']))
        {
           getTitle();
        }
    function getTitle(){
        $html = "";
        $searchName = $_POST["GameSearchBoxText"];
        $searchPlatform = $_POST["platform"];
        $url = "http://thegamesdb.net/api/GetGame.php?name=".$searchName."&platform=".$searchPlatform;
        $xml = simplexml_load_file($url);
        for($i = 0; $i < 1; $i++) {
             $title = $xml->Game[$i];
             if($title){
              $title = $title->GameTitle;
              $releaseDate = $xml->Game[$i]->ReleaseDate;
              $html .= "<p><h2>$title</h2></p><br/>";
              if($releaseDate){
                $isOut = checkIfOut($releaseDate);
              }
              else{
                $isOut = false;
              }
              $currDate = date('m/d/Y');
                  if($isOut){
                        $html .= "<h3> Yes its already out! Released on $releaseDate";
                  }
                  else{
                        if($releaseDate){
                            $html .= "<h3> No, Release Date is $releaseDate.";
                        }
                        else{
                            $html .= "<h3> No, Current Release date is unknown.";
                        }

                  }
              }
             else{
                echo "List found: $i";
                break;
             }
        }
        echo $html;
    }
    function checkIfOut($rlsDate){
            $currDate = date('m/d/Y');

            if($currDate < $rlsDate)
            {
                //echo "Game not out yet";
                return false;
            }
            else{
                //echo "Game already out";
                return true;
            }
    }
    ?>

    </body>
</html>
