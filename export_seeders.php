<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

$tables = ['users', 'news', 'menu_links'];

foreach ($tables as $table) {
    if (!Schema::hasTable($table)) continue;
    
    $rows = DB::table($table)->get()->map(function($row) {
        return (array) $row;
    })->toArray();
    
    $className = str_replace(' ', '', ucwords(str_replace('_', ' ', $table))) . 'TableSeeder';
    
    $export = "<?php\n\nnamespace Database\Seeders;\n\nuse Illuminate\Database\Seeder;\nuse Illuminate\Support\Facades\DB;\n\nclass {$className} extends Seeder\n{\n    public function run()\n    {\n        DB::table('{$table}')->delete();\n        \n        \$data = " . var_export($rows, true) . ";\n        \n        DB::table('{$table}')->insert(\$data);\n    }\n}\n";
    
    // Fix var_export generating stdClass or ugly arrays
    $export = str_replace("stdClass::__set_state(array(\n", "[\n", $export);
    $export = preg_replace('/\]\)$/', ']', $export);
    $export = str_replace("array (", "[", $export);
    $export = str_replace(")", "]", $export);
    
    file_put_contents(__DIR__."/database/seeders/{$className}.php", $export);
    echo "Generated {$className}.php\n";
}
