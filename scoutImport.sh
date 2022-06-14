php artisan scout:import "App\Models\Student"
php artisan scout:import "App\Models\Program"
php artisan scout:import "App\Models\ProgramType"
php artisan scout:import "App\Models\ProgramRunType"

curl   -X POST 'http://localhost:7700/indexes/students/settings/searchable-attributes'   -H 'Content-type:application/json'   --data-binary '[
        "cert_no"
  ]'
curl   -X POST 'http://localhost:7700/indexes/students/settings/filterable-attributes'   -H 'Content-type:application/json'   --data-binary '[
        "cert_no",
        "program_id"
  ]'
