@include('header.head_admin')
<body>    
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="td-superior"><img src="{{asset('storage/images/img-top.jpg')}}" width="985" height="165" />
    </td>
  </tr>
  <tr>
    <td class="td-centrado"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td class="td-centrado">
        
 <form action="{{ route('login-verify')}}" method="post">
              @csrf
              <table width="100%" border="00" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="2">Por favor ingrese sus datos para el sistema</td>
                </tr>
                <tr>
                  <td>Usuario</td>
                  <td><input value="" type="text" id="text-input" name="usuario" placeholder="usuario"  minlength="3" maxlength="150" required /></td>
                </tr>
                <tr>
                  <td>password</td>
                  <td><input type="password" name="password" size="20" /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><input type="submit" value="ingresar al sistema"  /></td>
                      <td><input type="reset" value="Borrar" /></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </form>        
        
        
        </td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
</body>

</html>
