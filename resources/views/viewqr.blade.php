
{{$imgurl}}



<a href="{{url('/downloadqrpdf/'. base64_encode($imgurl))}}">Download as PDF</a><br>

<a  href="#" id="download_png" >Download as PNG</button><br>
<a href="#" id="download_jpg"  download>Download as JPG</a><b></b>

<a href="https://t.me/share/url?url={{base64_decode($imgurl)}}">Share on Telegram</a>

<a target="_blank" href="https://www.instagram.com/blaustern_fotografie/">
 <img src="instagram.png">
</a>


<script>
var svg = document.querySelector( "svg" );
//var svg= document.getElementById("svg");
var svgData = new XMLSerializer().serializeToString( svg );

var canvas = document.createElement( "canvas" );
var ctx = canvas.getContext( "2d" );

var img = document.createElement( "img" );
img.setAttribute( "src", "data:image/svg+xml;base64," + btoa( svgData ) );

img.onload = function() {
    ctx.drawImage( img, 0, 0 );
    
    // Now is done
    console.log( canvas.toDataURL( "image/png" ) );
    var imgsrc = canvas.toDataURL( "image/png" );
	var a = document.getElementById("download_png");
	a.download = "myqr.png"
    a.href = imgsrc;

    var imgjpg = canvas.toDataURL( "image/jpg" );
	var a = document.getElementById("download_jpg");
	a.download = "myqr.jpg"
    a.href = imgjpg;



}
    

</script>