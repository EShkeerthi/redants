<div>

    <script>
        function change_pwd(){
            var vals = {
                "old_pwd":document.forms['changepwd']['old_pwd'].value,
                "new_pwd":document.forms['changepwd']['new_pwd'].value,
                "retype_new_pwd":document.forms['changepwd']['retype_new_pwd'].value
                
            };

            $.ajax({
                type:"POST",
                url:'php/content/content19/change_pwd.php',
                data: vals,
                error: function(msg){
                    console.log(msg);
                },
                success: function(msg){
                    $('#temp').html(msg);
                }
            });

        }
    
    </script>

    <form name="changepwd" onsubmit="change_pwd()">
    
    <input name="old_pwd" type="password" placeholder="*******"/>
    <input name="new_pwd" type="password" placeholder="*******"/>
    <input name="retype_new_pwd" type="password" placeholder="*******"/>
    <button type="submit">SUBMIT</button>
    </form>

</div>