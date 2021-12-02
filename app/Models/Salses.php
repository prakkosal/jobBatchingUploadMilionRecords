<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salses extends Model
{
    use HasFactory;
    protected $table = 'salses';
    protected $fillable = ['Region', 'Country', 'Item_Type', 'Sales_Channel', 'Order_Priority', 'Order_Date', 'Order_ID', 'Ship_Date', 'Units_Sold', 'Unit_Price', 'Unit_Cost', 'Total_Revenue', 'Total_Cost', 'Total_Profit']; 
}
