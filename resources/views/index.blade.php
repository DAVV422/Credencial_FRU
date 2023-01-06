@include('header.head_admin_session')
<body>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td class="td-superior"><img src="{{asset('storage/images/img-top.jpg')}}" width="985" height="165" />
        </td>
      </tr>
      <tr>
        <td class="td-centrado"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="td-centrado">Bienvenido <img src="{{asset('storage/images/ico-user.jpg')}}" width="27" height="27" align="absmiddle" /><?php echo $user; ?></td>
          </tr>
          <tr>
            <td class="td-centrado">
            @include('menu.menu')
            </td>
          </tr>          
          <tr>
            <td>
    @foreach ($credenciales as $cred)
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="65%"><h4><?php echo $cred->apellido; ?> </h4></td>
          <td width="33%" colspan="2">&nbsp;</td>
        </tr>
    </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="detalle"><?php echo $cred->nombre; ?></td>
          <td><a href="{{route('edit-foto', ['id' =>Crypt::encrypt($cred->id_credencial)])}}"><?php echo "Cambiar Foto";?></a></td>
          <td><a href="{{route('edit', ['id' =>Crypt::encrypt($cred->id_credencial)])}}"><?php echo "Editar Credencial";?></a></td>
          <td><a href="{{route('credencials', ['id' =>Crypt::encrypt($cred->id_credencial)])}}" target="_blank" rel="noopener noreferrer"><?php echo "Ver Credencial";?></a></td>          
        </tr>
      </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="3">&nbsp;<HR /></td>          
        </tr>
      </table>
    @endforeach                                            
            </td>
          </tr>
        </table></td>
      </tr>
    </table>
    </body>
    
    </html>
    