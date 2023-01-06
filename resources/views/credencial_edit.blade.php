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
        <form action="{{route('editar',['id'=>Crypt::encrypt($id_cred)])}}" method="post" enctype="multipart/form-data">
        @csrf
        <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>Nombre</td>                       
            <td><input name="nombre" type="text" value="{{$nombre}}" size="50" placeholder="Nombre" /></td>
          </tr>
          <tr>
            <td>Apellido</td>
            <td><input name="apellido" type="text" value="{{$apellido}}" size="50" placeholder="Apellido" /></td>
          </tr>
          <tr>
            <td>Carnet de Identidad</td>
            <td><input name="ci" type="text" value="{{$carnet}}" size="50" placeholder="C.I." /></td>
          </tr>        
          <tr>
            <td>Grado</td>
            <td><input name="grado" type="text" value="{{$grado}}" size="50" placeholder="Grado Institucional" /></td>
          </tr>  
          <tr>
            <td>Celular</td>
            <td><input name="celular" type="text" value="{{$celular}}" size="50" placeholder="Nro. de Celular" /></td>
          </tr>        
          <tr>
            <td>Grupo Sanguíneo</td>
            <td><input name="sangre" type="text" value="{{$sangre}}" size="50" placeholder="Tipo de Sangre" /></td>
          </tr>                                   
          <tr>
            <td>Género</td>
            <td>
            <select name="genero">
              <?php if($genero == 'Hombre'){
                ?>
                <option selected value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <?php
              }else{
                ?>
                <option selected value="Mujer">Mujer</option>
                <option value="Hombre">Hombre</option>
                <?php
              }
              ?>                
            </select>
            </td>
          </tr>
          <tr>
            <td>Estado</td>
            <td>
            <select name="estado">
              <?php if($estado == 'activo'){
                ?>
                <option selected value="activo">Activo</option>
                <option value="pasivo">Pasivo</option>
                <?php
              }else{
                ?>
                <option selected value="pasivo">Pasivo</option>
                <option value="activo">Activo</option>
                <?php
              }
              ?>                
            </select>
            </td>
          </tr>        
          <tr>
            <td>Fecha de Nacimiento</td>
            <td><input name="fecha_nacimiento" type="date" value="{{$fecha_nacimiento}}" size="50" placeholder="dd/mm/aaaa" /></td>
          </tr>                            
          <tr>
            <td>&nbsp;</td>
            <td>
              <input  type="submit" value="Editar Credencial" />
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