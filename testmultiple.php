<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Multiple image upload</title>
  </head>
  <body>
 <form method="post" action="testmultipleform.php" enctype="multipart/form-data">
 <input type="file" name="image[]" multiple="multiple" >
 <p style="align:center"><button type="submit" class="btn btn-warning" id="butsave">Submit<span class="glyphicon glyphicon-send"></span></button></p>
 </form>
 </body>
 </html>