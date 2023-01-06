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
            <img src="{{asset($foto)}}" width="250" height="250" alt="" srcset="" />
        </td>
      </tr>
      <tr>
        <td>Foto Actual</td>
      </tr>
      <tr>
        <td>
        <form action="{{route('editar-foto',['id'=>Crypt::encrypt($id_cred)])}}" method="post" enctype="multipart/form-data">
        @csrf
        <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">                       
          <tr>            
            <td>
                <input type="file" name="file" id="exampleInputFile" placeholder="archivo" class="form-control-file" required accept=".jpg">                    
            </td>
          </tr>
          <tr>                        
            <td align="center">
              <input  type="submit" value="Actualizar Foto" />
            </td>
          </tr>
          <tr>                        
            <td align="center">
                <a style="text-decoration-line: none" href="{{route('admin')}}"><input type="button" value="Cancelar" /></a>
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