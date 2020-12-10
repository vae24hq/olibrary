<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../script/jquery/jquerylib.js" type="text/javascript"></script>

<script type="text/javascript">
$.fn.followTo = function ( pos ) {
    var $this = this,
        $window = $(windw);
    
    $window.scroll(function(e){
        if ($window.scrollTop() > pos) {
            $this.css({
                position: 'absolute',
                top: pos
            });
        } else {
            $this.css({
                position: 'fixed',
                top: 0
            });
        }
    });
};

$('#f').followTo(250);
</script>


<style type="text/css">
#f {
    background:#ace;
    padding:20px;
    width:200px;
    position:fixed; top:0; left:0;
}
</style>
</head>

<body>

<div id="f">
    I'm going to follow you only so far...
</div>
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />
Lorem ipsum etc etc<br />


</body>
</html>