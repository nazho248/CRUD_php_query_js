<?php include ("db.php");?>
<?php include ("includes/header.php");?>


<img src="https://cdn.pixabay.com/photo/2016/10/20/18/35/earth-1756274__480.jpg" class="img-fluid" alt="Responsive image">

<div id="iframeDisplay"></div>

<button class="btn btn-warning" id="print-button" onclick="displayIframe()">presionalo</button>




<script>



function displayIframe() {
        document.getElementById("iframeDisplay").innerHTML = `<iframe name='myiframe' id='myiframe' src='prueba.php' 
 style='position:absolute; top:0%; left:0%; width:100%; height:100%; 
        z-index:999; background-color: rgba(0,0,0,0.5)' onload='sendParams();' frameborder='0' allowtransparency='true' >
</iframe>` ;};
</script>
<?php include ("includes/footer.php")?>