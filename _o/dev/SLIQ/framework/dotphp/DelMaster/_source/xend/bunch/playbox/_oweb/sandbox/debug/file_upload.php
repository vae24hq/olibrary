<!DOCTYPE HTML>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>File Upload Preview Test</title>
    <script type="text/javascript">
    if (window.FileReader) {
    
      var reader = new FileReader(), rFilter = /^(image\/bmp|image\/cis-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x-cmu-raster|image\/x-cmx|image\/x-icon|image\/x-portable-anymap|image\/x-portable-bitmap|image\/x-portable-graymap|image\/x-portable-pixmap|image\/x-rgb|image\/x-xbitmap|image\/x-xpixmap|image\/x-xwindowdump)$/i; 
      
      reader.onload = function (oFREvent) { 
        preview = document.getElementById("uploadPreview")
        preview.src = oFREvent.target.result;  
        preview.style.display = "block";
      };  
  
      function doTest() {
        if (document.getElementById("myfile").files.length === 0) { return; }
        var file = document.getElementById("myfile").files[0];  
        if (!rFilter.test(file.type)) { alert("You must select a valid image file!"); return;}
        reader.readAsDataURL(file); 
      }
  } else {
    alert("FileReader object not found :( \nTry using Chrome, Firefox or WebKit");
  }

	function ShowPic(type) {
  document.uploader.imgPic.src=document.getElementById("userfile").files[0].name;
		// document.uploader.imgPic.src=window.uploader.userfile.value
	}

    </script>
  </head>
  <body>
      <p>For recent browsers<br><input type="file" id="myfile" name="myfile" size="30" onchange="doTest()"></p>
      <img id="uploadPreview" src="" width="100" style="display:none" />
      <hr>
      <p>For older browsers<br><input name="userfile" type="file" id="userfile" onchange="ShowPic('p')" size="30"><br><img id="imgPic" alt="Passport Preview" width="120" border="1" /></p>
  </body>
</html>