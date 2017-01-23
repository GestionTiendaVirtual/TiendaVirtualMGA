<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Muro de opciones</title>
    </head>
        <body>
        <h1>Tipos de muro</h1>
         <form name="form1"> 
            <select name="select1" onchange="redirect(this.value)"> 
                <option> -- select option -- </option>
                <option value="p0">Muro general</option> 
                <option value="p1">Muro de computadoras</option> 
                <option value="p2">Muro de celulares</option> 
            </select> 
        </form> 
    	
        </body>
    <script type="text/javascript">
        function redirect(page)
        {
            if (page == 'p1')
            {
                window.location = 'computerWall.php';
            }
            else if (page == 'p2')
            {
            window.location = 'CelphoneWall.php';
            }
            else{
                window.location = 'GeneralWall.php';
            }
        }
    </script>
</html>
