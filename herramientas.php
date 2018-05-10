<?php 

php artisan infyom:scaffold $MODEL_NAME --fromTable --tableName=$TABLE_NAME -> lo genera desde las migration

php artisan infyom:scaffold $MODEL_NAME --datatables=true

integer:unsigned:foreign,table_name,id

$users = User::pluck('name','id')

php artisan infyom:rollback $MODEL_NAME scaffold 

php artisan infyom:scaffold $MODEL_NAME --tableName=custom_table_name -> lo genera desde la consola



 ?>