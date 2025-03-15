<?php  


use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

class CreatePaymentsTable extends Migration  
{  
    public function up()  
    {  
        Schema::create('payments', function (Blueprint $table) {  
            $table->id(); 
            $table->string('method')->nullable(); 
            $table->string('status'); 
            $table->timestamps();  
        });  
    }  

    public function down()  
    {  
        Schema::dropIfExists('payments');  
    }  
}