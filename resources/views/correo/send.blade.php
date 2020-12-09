<h3>@Bienvenido</h3>
<table border="1px">
    <tr>
        
        <td>Correo</td>
        <td>Password</td>
       
    </tr>

    @if($usuarios)
        <tr>
            <td>{{$usuarios->email}}</td>
            <td>{{$usuarios->password}}</td>
           
        
        
        </tr>

    @endif

</table>