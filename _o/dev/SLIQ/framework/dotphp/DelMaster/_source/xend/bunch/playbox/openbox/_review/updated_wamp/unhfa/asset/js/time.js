<!--
var weekdaystxt=["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]

function showLocalTime(container, servermode, offsetMinutes, displayversion){
if (!document.getElementById || !document.getElementById(container)) return
this.container=document.getElementById(container)
this.displayversion=displayversion
var servertimestring=(servermode=="server-php")? '<? print date("F d, Y H:i:s", time())?>' : (servermode=="server-ssi")? 'March 21, 2016 06:04:37' : '<%= Now() %>'
this.localtime=this.serverdate=new Date(servertimestring)
this.localtime.setTime(this.serverdate.getTime()+offsetMinutes*60*1000)
this.updateTime()
this.updateContainer()
}

showLocalTime.prototype.updateTime=function(){
var thisobj=this
this.localtime.setSeconds(this.localtime.getSeconds()+1)
setTimeout(function(){thisobj.updateTime()}, 1000)
}

showLocalTime.prototype.updateContainer=function(){
var thisobj=this
if (this.displayversion=="long")
this.container.innerHTML=this.localtime.toLocaleString()
else{
var hour=this.localtime.getHours()
var minutes=this.localtime.getMinutes()
var seconds=this.localtime.getSeconds()
/*var ampm=(hour>=12)? "PM" : "AM"*/
var dayofweek=weekdaystxt[this.localtime.getDay()]
this.container.innerHTML="<strong>Mission time:</strong> "+formatField(hour, 1)+":"+formatField(minutes)+":"+formatField(seconds)+", "+dayofweek
}
setTimeout(function(){thisobj.updateContainer()}, 1000)
}

function formatField(num, isHour){
if (typeof isHour!="undefined"){
var hour=(num>24)? num-24 : num
return (hour==0)? 24 : hour
}
return (num<=9)? "0"+num : num
}

var delay=480
-->