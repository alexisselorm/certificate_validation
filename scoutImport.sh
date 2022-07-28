#!/usr/bin/bash

#php artisan scout:flush "App\Models\Student"
# php artisan scout:flush "App\Models\Program"
# php artisan scout:flush "App\Models\ProgramType"
# php artisan scout:flush "App\Models\ProgramRunType"


 php artisan scout:import "App\Models\Student"
# php artisan scout:import "App\Models\Program"
# php artisan scout:import "App\Models\ProgramType"
# php artisan scout:import "App\Models\ProgramRunType"

# curl -H 'X-Meili-API-Key: masterKey' -X GET 'http://localhost:7700/indexes/students_db/settings'

# curl -H 'X-Meili-API-Key: masterKey' -X POST 'http://localhost:7700/indexes/students_db/settings/searchable-attributes' --data '["cert_no","regno"]'

#  curl   -X POST 'http://localhost:7700/indexes/students_db/settings/filterable-attributes'   -H 'Content-type:application/json'   --data-binary '[
#          "cert_no",
#          "program_id",
#          "regno"
#    ]'
