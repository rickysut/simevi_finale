<?php

namespace App\Http\Controllers\Traits;

use \SpreadsheetReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait CsvImportTrait
{
    public function processCsvImport(Request $request)
    {
        try {
            $filename = $request->input('filename', false);
            $path     = storage_path('app/csv_import/' . $filename);

            $hasHeader = $request->input('hasHeader', false);

            $fields = $request->input('fields', false);
            $fields = array_flip(array_filter($fields));
            
            $modelName = $request->input('modelName', false);
            $model     = 'App\\Models\\' . $modelName;

            $reader = new SpreadsheetReader($path);
            $insert = [];

            foreach ($reader as $key => $row) {
                if ($hasHeader && $key == 0) {
                    continue;
                }

                $tmp = [];
                foreach ($fields as $header => $k) {
                    if (isset($row[$k])) {
                        $tmp[$header] = $row[$k];
                    }
                    
                }

                if (count($tmp) > 0) {
                    $insert[] = $tmp;
                }
            }

            $delfirst = ($model::delFirst ?? false);

            if ($delfirst) {
                $primarykey = $model::getPrimary();
                $for_insert = array_chunk($insert, 1);
                $insert_item = $for_insert[0];
                    $matches = array();
                    foreach($insert_item as $k=>$v) {
                        $i = -1;
                        $i = array_search($primarykey,array_keys($v));
                        if ($i != -1){
                            $matches = [array_keys($v)[$i] => array_values($v)[$i]];
                            $model::where($primarykey,$matches)->forceDelete();
                        }
                    }
                //}
            }
            //dd('after delete');
            //$for_insert = array_chunk($insert, 100);
            $for_insert = array_chunk($insert, 100);
            //$index = 0;
            foreach ($for_insert as $insert_item ) {
                $primarykey = $model::getPrimary();
                if ($delfirst) {
                    $model::insert($insert_item);
                } else {
                    //dd($insert_item);
                    //$index++;
                    $matches = array();
                    foreach($insert_item as $k=>$v) {
                        
                        $i = -1;
                        $i = array_search($primarykey,array_keys($v));
                        if ($i != -1){
                        //if(preg_match("/\b$primarykey\b/i", $v)) {
                            $matches = [array_keys($v)[$i] => array_values($v)[$i]];
                            //dd($matches);
                            unset($v[$primarykey]);
                            $model::updateOrInsert($matches, $v);
                            //break;
                            //dd('insert');
                        }
                    }
                }
                //dd($matches,$v);
                
            }

            $rows  = count($insert);
            $table = Str::plural($modelName);

            File::delete($path);

            session()->flash('message', trans('global.app_imported_rows_to_table', ['rows' => $rows, 'table' => $table]));

            return redirect($request->input('redirect'));
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function parseCsvImport(Request $request)
    {
        $file = $request->file('csv_file');
        $request->validate([
            'csv_file' => 'mimes:csv,txt',
        ]);

        $path      = $file->path();
        $hasHeader = $request->input('header', false) ? true : false;

        $reader  = new SpreadsheetReader($path);
        $headers = $reader->current();
        $lines   = [];

        $i = 0;
        while ($reader->next() !== false && $i < 5) {
            $lines[] = $reader->current();
            ++$i;
        }

        $filename = Str::random(10) . '.csv';
        $file->storeAs('csv_import', $filename);

        $modelName     = $request->input('model', false);
        $fullModelName = 'App\\Models\\' . $modelName;

        $model     = new $fullModelName();
        $fillables = $model->getFillable();

        $redirect = url()->previous();

        $routeName = 'admin.' . strtolower(Str::plural(Str::kebab($modelName))) . '.processCsvImport';

        return view('csvImport.parseInput', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));
    }
}
