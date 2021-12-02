<?php
 
$univ = array
  (
  array("name"=>"Universiti Putra Malaysia","abb"=>"UPM"),
  array("name"=>"Universiti Kebangsaan Malaysia","abb"=>"UKM"),
  array("name"=>"Universiti Malaya","abb"=>"UM"),
  array("name"=>"Universiti Sains Malaysia","abb"=>"USM"),
  array("name"=>"Universiti Teknologi Malaysia","abb"=>"UTM")
  );
 
 ?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Biodata</title>
<style type="text/css">
    body {
        font: 100% Lucida Sans, Verdana;       
    }
    .wrapper {
      position: relative;
      overflow: auto;
    }

    label {
      font-weight: bold;
    }

    input {
        width: 100%;
        padding: 12px 20px;
        margin: 10px 0px 10px 0px;
        box-sizing: border-box;
        font: 100% Lucida Sans, Verdana;
    }

    textarea {
        width: 100%;
        padding: 12px 20px;
        margin: 10px 0px 10px 0px;
        box-sizing: border-box;
        font: 100% Lucida Sans, Verdana;
    }

    select {
        width: 100%;
        padding: 12px 20px;
        margin: 10px 0px 10px 0px;
        box-sizing: border-box;
        font: 100% Lucida Sans, Verdana;
    }

    .button {
      background-color:#00F;
      border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
       
    }


</style>
</head>
<body>
<h1>Biodata Form</h1>
<hr>
<form action="validate_biodata.php" method="post">
     
<label for="idname">Name:</label>
<input type="text" name="name" id="idname" placeholder="Insert your name" autofocus><br>
     
<label for="idage">Age:</label>
<input type="number" name="age" id="idage" min="0" max="100" step="1"><br>
     
<label for="idsex">Sex:</label><br>
<input type="radio" style="height:1em; width:45px;" name="sex" id="idsex" value="male">Male<br>
<input type="radio" style="height:1em; width:45px;" name="sex" id="idsex" value="female">Female<br>
       
<label for="idaddress">Address:</label>
<textarea name="address" id="idaddress" cols="50" rows="5" placeholder="Insert your address"></textarea><br>
     
<label for="idemail">Email:</label>
<input type="email" id="idemail" name="email" placeholder="Insert your email"><br>
     
<label for="iddob">Date of Birth:</label>
<input type="date" id="iddob" name="dob"><br>
     
<label for="idheight">Height:</label><br>
<input type="range" style="width:350px" name="height" id="heightId" min = "100" max = "200" oninput="outputId.value = heightId.value">
<output id="outputId">150</output>cm<br>
     
<label for="idtel">Tel:</label>
<input type="tel" name="phone" id="idtel" pattern="\+60\d{2}-\d{7}" placeholder="+60##-#######"><br>
     
<label for="idcolor">My Favorite Color:</label><br>
<input type="color" style="width:350px" name="color" id="idcolor"><br>
     
<label for="idfbtwig">Fb/TW/IG:</label>
<input type="url" name="fbtwig" id="idfbtwig" placeholder="Insert the URL"><br>
     
<label for="iduniv">My University:</label>
<select name="university" id="iduniv">
  <option value="" selected>Select</option>
  <?php
  foreach ($univ as $u) {
    echo "<option value=".$u['abb'].">".$u['name']."</option>";
  }
  ?>
</select><br>
 
<input type="hidden" class="button" name="matricnum" value="a123456">
<input type="submit" class="button" name="biodata_form" value="Submit My Biodata">
<input type="reset" class="button">
</form>
 
</body>
</html>