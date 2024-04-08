<div class="affichage-titre">
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var title = document.title;
    var div = document.querySelector(".affichage-titre");
    div.innerHTML = "<h1>" + title + "</h1>" ;
});
</script>