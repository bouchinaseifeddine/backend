<?php

use App\Models\Instance;
use App\Services\ServiceFunctions;
use Illuminate\Foundation\Inspiring;
use App\Services\DirMigartionsTables;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command("test",function(){
    $cols = ServiceFunctions::createColumns([
        ["type" => "softDeletes"],
        ["type"=> "string", "value"=>"inscription_number", "unique"=> true, 'null'=> false, "size"=> 200 ],
        ["type"=> "integer", "value"=> "numero_label", "unique"=> true, 'null'=> false, "unsigned"=> true, 'autoIncrement'=> false ]
    ]);
    $this->info($cols);
});

Artisan::command("test1",function(){
    // $this->info(file_get_contents(ServiceFunctions::$controllerStubPath));
});

Artisan::command("test2",function(){
    $this->info(ServiceFunctions::addRelation("student", "belongsTo" ,"Student"));
});

Artisan::command("test3",function(){
    $namespace =  "\database\migrations\\noraml_migrations\\"."V1\\Profiles" ;
    $SourceFilePath = base_path($namespace) .'\\' .ServiceFunctions::generateTimestamp()."_create_".ServiceFunctions::getPluralClassName("doctor"). '_table.php';
    $this->info($SourceFilePath);
    DirMigartionsTables::makeDirectory(dirname($SourceFilePath));

});


Artisan::command("makeForeignKey" , function(){
    $instances = Instance::first();
    $migrations = $instances->migrations ;
    $models = $instances->models ;
    $instances = $instances->instances ;
    foreach ($models  as $key => $model) {
        $cols = "\n\n".createColumns($model["relations"]["belongsTo"]);
        $tableName =  $instances[$key]["instanceName"] ;
        $namespace =  "\database\migrations" ;
        $SourceFilePath =base_path($namespace) .'\\' ."2_".'_add_foreign_keys_to_'.ServiceFunctions::getPluralClassName($instances[$key]["instanceName"]).'_table.php' ;
        $stubVariables = [
            "NAME" => ServiceFunctions::getPluralClassName($tableName),
            "COLUMNS" => $cols,
        ];
        $path = $SourceFilePath;
        DirMigartionsTables::makeDirectory(dirname($path));
        $content = DirMigartionsTables::getSourceFile($stubVariables);
        $files = new Filesystem();

        if (!$files->exists($path)) {
            $files->put($path , $content);
        } else {
            dd("File : {$path} already exits");
        }
    }
    $this->info("donne");
});


function createColumns($columns){
    $cols = "";
    foreach ($columns as $column) {
        $cols = $cols.createColumn($column)."\n";
    }
    $cols = $cols."\n";
    return $cols;
}
function createColumn($column):string{
    $instances = Instance::first()->instances;
    $instanceName = ServiceFunctions::getPluralClassName($instances[$column]["instanceName"]);
    $foreignKey = $instances[$column]["instanceName"]."_id";
    $col = "\t\t\t\$table->"."foreignId"."(";
    $col = $col."\"".$foreignKey."\" )";
    $col = $col."->nullable()";
    $col = $col."->constrained( ";
    $col = $col."\"".$instanceName."\" )";
    $col = $col."->onDeleteCascade() ;";
    return $col;
}
