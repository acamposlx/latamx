<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consignatario;
use Carbon\Carbon;
use DateTime;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class ConsignatarioController extends Controller
{
    //

    public function index(){
        return view('reportes.index');
    }

    public function filtrado(Request $request){
    	$startTime   = strtotime($request->fechainicio);
        $data = date('Y-m-d',$startTime);
   	$endTime   = strtotime($request->fechafin);
        $data2 = date('Y-m-d',$endTime);

        $datos = Consignatario::where('fecharegistro', '>', $data) 
		->where('fecharegistro', '<=', $data2) 
		->whereNotNull('cedula')
		->where('cedula', '<>', '')
		->get();

 	Excel::create('Filename', function($excel) use($datos) {
        $excel->sheet('Sheetname', function($sheet) use($datos) {
        $sheet->fromArray($datos);
        });
        })->export('xls');


        return view('reportes.index')
        ->with('datos', $datos);
    }
    
    
    public function consignatario_uso(){
        $consignatarios = DB::table('consignatario')
        ->whereNotNull('consignatario.apellido')
        ->where('consignatario.apellido', '<>', '')
        ->Join('receipts', 'receipts.consigneeid', '=', 'consignatario.ConsigneeCode')
        ->select('consignatario.Name', 'consignatario.ConsigneeCode', 'consignatario.Email', 'consignatario.apellido', 'receipts.receipt', 'receipts.date')
        ->orderBy('consignatario.Name', 'ASC')
        ->get();
        
        return view('reportes.uso')
        ->with('consignatarios', $consignatarios);
        
    }
}
