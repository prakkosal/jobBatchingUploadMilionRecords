<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salses', function (Blueprint $table) {
            $table->id();
            $table->string("Region");
            $table->string("Country");
            $table->string("Item_Type");
            $table->string("Sales_Channel");
            $table->string("Order_Priority");
            $table->string("Order_Date");
            $table->string("Order_ID");
            $table->string("Ship_Date");
            $table->string("Units_Sold");
            $table->string("Unit_Price");
            $table->string("Unit_Cost");
            $table->string("Total_Revenue");
            $table->string("Total_Cost");
            $table->string("Total_Profit");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salses');
    }
}
