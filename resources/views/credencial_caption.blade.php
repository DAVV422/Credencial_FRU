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
        <td colspan="2" class="td-centrado">
        @include('menu.menu')
        </td>
      </tr>
      <tr>
        <td>
        <form action="{{route('crear_credencial')}}" method="post" enctype="multipart/form-data">
        @csrf
        <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>Nombre</td>                       
            <td><input name="nombre" type="text" value="" size="50" placeholder="Nombre" /></td>
          </tr>
          <tr>
            <td>Apellido</td>
            <td><input name="apellido" type="text" value="" size="50" placeholder="Apellido" /></td>
          </tr>
          <tr>
            <td>Carnet de Identidad</td>
            <td><input name="ci" type="text" value="" size="50" placeholder="C.I." /></td>
          </tr>        
          <tr>
            <td>Grado</td>
            <td><input name="grado" type="text" value="" size="50" placeholder="Grado Institucional" /></td>
          </tr>  
          <tr>
            <td>Celular</td>
            <td><input name="celular" type="text" value="" size="50" placeholder="Nro. de Celular" /></td>
          </tr>        
          <tr>
            <td>Grupo Sanguíneo</td>
            <td><input name="sangre" type="text" value="" size="50" placeholder="Tipo de Sangre" /></td>
          </tr>                                   
          <tr>
            <td>Género</td>
            <td>
            <select name="genero">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
            </td>
          </tr>          
          <tr>
            <td>Fecha de Nacimiento</td>
            <td><input name="fecha_nacimiento" type="date" value="" size="50" placeholder="dd/mm/aaaa" /></td>
          </tr>                  
          <tr>
            <td>Foto</td>
            <td>
                <input type="file" name="file" id="exampleInputFile" placeholder="archivo" class="form-control-file" required accept=".jpg">                    
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <input  type="submit" value="Crear Credencial" />
              </td>
          </tr>
        </table>
        </form>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>

</html>