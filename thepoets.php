<?php
  include_once("itproclasses.php");
  include_once("frontheader.php");
?>

<!-- Page Container -->
<div class="container">
  
    <h2 class="my-4">The Poets</h2>

    <?php 
    // CONSUMING API USING CURL-GET REQUEST
    // USING A CURL LIBRARY instead of using POSTMAN (We want to create our own API)
    $url = "https://naijapoetry.com/api/poetsapi";

    // step 1: Initialize curl (client url library) and url means()
    $curlsession = curl_init();


    // step 2: you need to set curl options
    curl_setopt($curlsession, CURLOPT_URL, $url);
    curl_setopt($curlsession, CURLOPT_RETURNTRANSFER, true); //return a string instead of printing the result on a string
    curl_setopt($curlsession, CURLOPT_SSL_VERIFYPEER, false); //we used this to ignore SSL certificate since our site is on local host. But for live projects, enable "true"
    curl_setopt($curlsession, CURLOPT_HEADER, false); //we don't need all the information on the POSTMAN header like expires, version, date we accessed, length of data. Just give us response because by default it will give you header information


    // step 3: Execute Curl Session (just like clicking SEND on postman)
    $response = curl_exec($curlsession); //the variable "response" is used to store the execution

    // then it is always advisable to validate incase of error
    if (curl_error($curlsession)) {
      echo curl_error($curlsession);
    }


    // step 4: close curl session
    curl_close($curlsession);


    // step 5: Do whatever you want to do with the response
    $result = json_decode($response);

    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";

    // we want to loop over the class:mybox
    if (count($result) > 0) {
      foreach ($result as $key => $value) {
        
     
    ?>

    <div class="mybox clearfix">
    
      <?php 
        if (empty($value->PoetImageUrl)) {

      ?>
      <img src="images/logo2.png" class="myimg">
    <?php  
    }
    else {
      $baseurl = "https://naijapoetry.com";
      $imageurl = $baseurl.$value->PoetImageUrl;
   ?>
   <img src="<?php echo $imageurl; ?>" class="myimg">
   <?php 
    }
   ?>
   <div>
     <?php 
      echo $value->Firstname." ".$value->Surname;
     ?>
   </div>
    </div>

    <?php  
     }
    }

    ?>
</div>



<?php 
  include_once("frontfooter.php");
?>