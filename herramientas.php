<?php 

php artisan infyom:scaffold $MODEL_NAME --fromTable --tableName=$TABLE_NAME -> lo genera desde las migration

php artisan infyom:scaffold $MODEL_NAME --datatables=true

integer:unsigned:foreign,table_name,id select

$users = User::pluck('name','id')

php artisan infyom:rollback $MODEL_NAME scaffold 

php artisan infyom:scaffold $MODEL_NAME --tableName=custom_table_name -> lo genera desde la consola


/*RELACIONES!!!*/
Gasto    
public function tipoDeGasto(){

        return $this->hasOne('App\Models\TipoDeGasto', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/

    public function user(){

        return $this->hasOne('App\User', 'id');
    }

Tipo de Gasto
    public function user(){

        return $this->hasOne('App\User', 'id');
    }

     public function gasto()
    {
        return $this->hasMany('App\Models\Gasto');
    }

User
      public function tipoDeGastos()
    {
        return $this->hasMany('App\Models\TipoDeGasto');
    }

        public function gasto()
    {
        return $this->hasMany('App\Models\Gasto');
    }

Here is what this means,
name - name of the field (snake_case recommended)
db_type - database type. e.g.
string - $table->string('field_name')
string,25 - $table->string('field_name', 25)
text - $table->text('field_name')
integer,false,true - $table->integer('field_name',false,true)
string:unique - $table->string('field_name')->unique()
For foreign keys,
integer:unsigned:foreign,table_name,id
$table->foreign('field_name')->references('id')->on('table_name')
html_type - html field type for forms. e.g.
text
textarea
password
Here is the full guide for field inputs

options - Options to prevent field from being searchable, fillable, display in form & index
Here are all options by which you can prevent it, these all fields should be passed by comma separated string.

e.g. s,f,if,ii

s - specify to make field non-searchable
f - specify to make field non-fillable
if - to skip field from being asked in form
ii - to skip field from being displayed in index view

 ?>