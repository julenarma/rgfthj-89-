<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use App\Models\Proyectos;



Use Illuminate\Support\Facades\DB;

class ProyectosController extends Controller
{

    public function index()
    {
       
       $data =  DB::table('proyectos')    
       ->select('proyectos.id','proyectos.nombre', 'subproyectos.nombre_subproyecto','registros.fecha_alta', 'usuarios.username')
        ->join('subproyectos', 'proyectos.id', '=', 'subproyectos.id_proyecto')
        ->join('registros', 'proyectos.id', '=', 'registros.id_proyecto')
        ->join('usuarios', 'usuarios.id', '=', 'proyectos.desarrollador_principal')
      
         ->get(); 
         
        return $data;

     //   return Proyectos::all();
    }

    public function show(Proyectos $proyecto)
    {
        $proyecto =  DB::table('proyectos')    
        ->select('proyectos.id','proyectos.nombre', 'subproyectos.nombre_subproyecto','registros.fecha_alta', 'usuarios.username')
        ->join('subproyectos', 'proyectos.id', '=', 'subproyectos.id_proyecto')
        ->join('registros', 'proyectos.id', '=', 'registros.id_proyecto')
        ->join('usuarios', 'usuarios.id', '=', 'proyectos.desarrollador_principal')
        ->where('proyectos.id', $proyecto->id)
         ->get(); 
        
        return $proyecto;
    }

    public function store(Request $request)
    {
        $proyecto = Proyectos::create($request->
    
        DB::table('proyectos')    
        ->select('proyectos.id','proyectos.nombre', 'subproyectos.nombre_subproyecto','registros.fecha_alta', 'usuarios.username')
         ->join('subproyectos', 'proyectos.id', '=', 'subproyectos.id_proyecto')
         ->join('registros', 'proyectos.id', '=', 'registros.id_proyecto')
         ->join('usuarios', 'usuarios.id', '=', 'proyectos.desarrollador_principal')
        ->save()
    
         );

        
        return response()->json($proyecto, 201);
    }

    public function update(Request $request, Proyectos $proyecto)
    {  
        $proyecto =  DB::table('proyectos')    
        ->select('proyectos.id','proyectos.nombre', 'subproyectos.nombre_subproyecto','registros.fecha_alta', 'usuarios.username')
        ->join('subproyectos', 'proyectos.id', '=', 'subproyectos.id_proyecto')
        ->join('registros', 'proyectos.id', '=', 'registros.id_proyecto')
        ->join('usuarios', 'usuarios.id', '=', 'proyectos.desarrollador_principal')
        ->where('proyectos.id', $proyecto->id)
         ->get(); 

        

        //$proyecto->update($request->save());
        $proyecto->update($request->all());

        return response()->json($proyecto, 200);
    }

    public function delete(Proyectos $proyecto)
    {
        $proyecto->delete();

        return response()->json(null, 204);
    }
 
  
}
