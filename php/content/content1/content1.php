<div>
<style>

    .view_prof{
        font-size:20px;
        border:2px solid cyan;
        color:green;
    }
</style>

    <div id="fname" class="view_prof"></div>
    <div id="lname"class="view_prof"></div>
    <div id="mobile"class="view_prof"></div>
    <div id="email"class="view_prof"></div>
    <div id="branch"class="view_prof"></div>


    <script>
        $(function(){

            $.ajax({
                type:'POST',
                url:'php/content/content1/profile.php',
                error: function(msg){
                    console.log(msg);
                },
                success: function(msg){
                    $('#temp').html(msg);
                    console.log(msg);
                }
            });

        });
    
</script>

</div>