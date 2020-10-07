<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Document</title>
</head>
<body>
    <button id="boton">Iniciar</button>
    <br>
    <br>
    <table border="1" id="tabla">
        <thead>
            <th>Ci Primero</th>
            <th>Ci último</th>
            <th>Offset</th>
            <th>Length</th>
        </thead>
        <tbody id="tabla_celdas"></tbody>
    </table>
    <script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("#boton").click(()=>{
            sendInfo(0);
        });

        const sendInfo = (offset)=>{
            $.ajax({
                    url: '{{ url("/saveData") }}',
                    method: 'POST',
                    dataType: 'json',
                    cache:false,
                    data: {
                        offset,
                    },
                    success: function (resp) {
                        console.log(resp)
                        addTable(resp);
                        (resp.reload) ? reiniciar(parseInt(resp.offset)+parseInt(resp.length)) : alert("listo!");
                    },
                    error: function(msj) 
                    {
                        alert("EROOOR");
                        console.log(msj);
                        
                    }

                })

        }

        const reiniciar = (offset)=>{
            setTimeout(function(){ sendInfo(offset); }, 5000);
        }

        const addTable = (obj)=>{
            var htmlTags = `
                <tr>
                    <td>${obj.first}</td>
                    <td>${obj.last}</td>
                    <td>${obj.offset}</td>
                    <td>${obj.length}</td>
                </tr>
            `;
      
            $('#tabla tbody').append(htmlTags);

        }
    </script>
</body>
</html>