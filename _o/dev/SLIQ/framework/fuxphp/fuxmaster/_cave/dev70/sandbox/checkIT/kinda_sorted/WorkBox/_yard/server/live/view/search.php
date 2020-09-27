<div class="search">
    <form action="" method="post" name="searchForm" id="searchForm">
      <span id="spryq">
      <input type="text" name="q" id="q">
      <span class="textfieldRequiredMsg"></span></span>
      <input type="submit" name="SearchBtn" id="SearchBtn" value="Product Finder">
    </form>
  </div>
 
 <script src="../plugin/_spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../plugin/_spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
 
  <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryq", "none", {validateOn:["blur", "change"]});
</script> 