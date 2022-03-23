</div>
<!-- Bootstrap & font awesone -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/594bc3b560.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>




<script>
var mini = true;

function toggleSidebar() {
    if (mini) {
        //console.log("opening sidebar");
        document.querySelectorAll("span.icon-text").forEach(texto =>{
            texto.classList.remove("invisible")
            texto.classList.add("visible");
        });
        document.querySelectorAll("span .icon-text")
        document.getElementById("fullsidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        this.mini = false;
    } else {
        //console.log("closing sidebar");
        document.querySelectorAll("span.icon-text").forEach(texto =>{
            texto.classList.add("invisible");
            texto.classList.remove("visible")
        });
        document.getElementById("fullsidebar").style.width = "85px";
        document.getElementById("main").style.marginLeft = "85px";
        this.mini = true;
    }
}


</script>

</body>

</html>