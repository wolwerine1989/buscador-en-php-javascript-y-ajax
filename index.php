<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de busqueda</title>
    <style>
        table,th,td{
            border: 1px solid;
        }
        table{
            width: 80%;
            border-collapse: collapse ;
        }

    </style>
</head>
<body>
    
    <h2>Empleados</h2>

    <form action="" method="post">

        <label for="campo">Buscar:</label>
        <input type="text" name="campo" id="campo">
    </form>

    <p></p>
    <table>
        <thead>

            <th>Num. Empleados</th>
            <th>Nombre</th>
            <th>Codigo Pais</th>
            <th>Distrito</th>
            <th>Poblacion</th>
            <th>Editar | Eliminar</th>
        </thead>

        <tbody id="content">

        </tbody>



    </table>
        
<!-- https://www.youtube.com/watch?v=IP2Ye2KKfoc&t=160s -->
        <script>
            getData()

            document.getElementById("campo").addEventListener("keyup",getData)

            function getData(){
                let input = document.getElementById("campo").value
                let content = document.getElementById("content")
                let url = "load.php";
                let formData = new FormData()
                formData.append('campo',input)
                
                fetch(url, {
                    method:"POST",
                    body:formData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
            }

         </script>

</body>
</html>