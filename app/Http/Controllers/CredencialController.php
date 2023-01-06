<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Credencial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Crypt;

class CredencialController extends Controller
{
    public function show($id)
    {
        $id_cred = Crypt::decrypt($id);        
        $cred = Credencial::find($id_cred);
        $nombre = $cred->nombre;
        $carnet_identidad = $cred->carnet_identidad;
        $celular = $cred->celular;
        $apellido = $cred->apellido;
        $fecha_nacimiento = $cred->fecha_nacimiento;
        $genero = $cred->genero;
        $foto = $cred->foto;
        $grado = $cred->grado;
        $sangre = $cred->grupo_sanguineo;
        $nombre_completo = $nombre.' '.$apellido;
        return view('credencial', ['nombre'=>$nombre_completo,'carnet' => $carnet_identidad,'celular'=>$celular,
                                    'fecha_nacimiento'=>$fecha_nacimiento,'genero'=>$genero,'foto'=>$foto,
                                    'sangre'=>$sangre,'grado'=>$grado]);
    }

    public function credenciales()
    {
        //
    }    

    public function verify(Request $request){
        $email = $request->input('usuario');
        $password = $request->input('password');
        $sesion = DB::table('users')->select('name')->where('email','=',$email)->where('password','=',$password)->get();                                
        if($sesion->count() > 0){
            session_start();
            $_SESSION['login']=true;              
            $_SESSION['user'] = $sesion[0]->name;
            return redirect()->route('admin');
        }else{
            return redirect()->route('inicio');
        }
    }

    public function index()
    {
        session_start();   
        $credenciales =  Credencial::all();
        if($_SESSION['login']){
            return view('index', ['user' => $_SESSION['user'], 'credenciales'=>$credenciales]);    
        }else{
            return redirect()->route('inicio');
        }
    }

    public function credencial_nuevo($id)
    {
        session_start();   
        $id_cred = Crypt::decrypt($id);        
        $cred = Credencial::find($id_cred);
        if($_SESSION['login']){
            return view('credencial_creado', ['user' => $_SESSION['user'], 'cred'=>$cred]);    
        }else{
            return redirect()->route('inicio');
        }
    }

    public function administrar()
    {
        session_start();        
        if($_SESSION['login']){
            return view('credencial_caption', ['user' => $_SESSION['user']]);
        }else{
            return redirect()->route('inicio');
        }
        
    }

    public function exit(){
        session_start();
	    $_SESSION['logueado']= FALSE;		
        session_destroy();  
        return redirect()->route('inicio');
    }

    public function new_credencial(Request $request){
        $cred = new Credencial;                
        $cred->nombre = $request->input('nombre');
        $cred->apellido = $request->input('apellido');
        $cred->carnet_identidad = $request->input('ci');
        $cred->grado = $request->input('grado');
        $cred->celular = $request->input('celular');
        $cred->grupo_sanguineo = $request->input('sangre');
        $cred->genero = $request->input('genero');
        $cred->fecha_nacimiento = $request->input('fecha_nacimiento');        
        $cred->estado = 'activo';
        $nombre_file = strtolower($request->input('apellido')).' '.strtolower($request->input('nombre'));
        $nombre_file = str_replace(' ','-', $nombre_file);
        $path = "images/".$nombre_file;
        $file = $request->file('file');
        if(!is_dir($path)){
            mkdir($path, 0777, true);
        }  
        $ruta = $file->storeAs($path, $nombre_file.'.jpg');
        $cred->foto = $ruta;
        $cred->save();
        $id_credencial = Credencial::max('id_credencial');        
        return redirect()->route('credencial-nuevo', Crypt::encrypt($id_credencial));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session_start();        
        if($_SESSION['login']){
            $id_cred = Crypt::decrypt($id);        
            $cred = Credencial::find($id_cred);
            $nombre = $cred->nombre;
            $carnet_identidad = $cred->carnet_identidad;
            $celular = $cred->celular;
            $apellido = $cred->apellido;
            $fecha_nacimiento = $cred->fecha_nacimiento;
            $genero = $cred->genero;
            $foto = $cred->foto;
            $estado = $cred->estado;
            $grado = $cred->grado;
            $sangre = $cred->grupo_sanguineo;            
            return view('credencial_edit', ['user' => $_SESSION['user'],'nombre'=>$nombre,'apellido'=>$apellido,'carnet' => $carnet_identidad,'celular'=>$celular,
                                        'fecha_nacimiento'=>$fecha_nacimiento,'genero'=>$genero,'foto'=>$foto,
                                        'sangre'=>$sangre,'grado'=>$grado,'estado'=>$estado,'id_cred'=>$id_cred]);
        }else{
            return redirect()->route('inicio');
        }        
    }

    public function edit_foto($id)
    {
        session_start();        
        if($_SESSION['login']){
            $id_cred = Crypt::decrypt($id); 
            $cred = Credencial::find($id_cred);
            $foto = $cred->foto;
            return view('foto_edit', ['user' => $_SESSION['user'],'id_cred'=>$id_cred,'foto'=>$foto]);
        }else{
            return redirect()->route('inicio');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $id_cred = Crypt::decrypt($id);        
        $cred = Credencial::find($id_cred);
        $cred->nombre = $request->input('nombre');
        $cred->apellido = $request->input('apellido');
        $cred->carnet_identidad = $request->input('ci');
        $cred->grado = $request->input('grado');
        $cred->celular = $request->input('celular');
        $cred->grupo_sanguineo = $request->input('sangre');
        $cred->genero = $request->input('genero');
        $cred->estado = $request->input('estado');
        $cred->fecha_nacimiento = $request->input('fecha_nacimiento');                                
        $cred->save();              
        return redirect()->route('credencial-nuevo', Crypt::encrypt($id_cred));
    }

    public function update_foto(Request $request, $id)
    {   
        $id_cred = Crypt::decrypt($id);        
        $cred = Credencial::find($id_cred);
        Storage::delete([$cred->foto]);                
        $nombre_file = strtolower($cred->apellido).' '.strtolower($cred->nombre);
        $nombre_file = str_replace(' ','-', $nombre_file);
        $path = "images/".$nombre_file;
        $file = $request->file('file');
        if(!is_dir($path)){
            mkdir($path, 0777, true);
        }
        $ruta = $file->storeAs($path, $nombre_file.'.jpg');
        $cred->foto = $ruta;
        $cred->save();
        return redirect()->route('credencial-nuevo', Crypt::encrypt($id_cred));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
