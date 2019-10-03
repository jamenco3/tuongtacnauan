<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Slide;
use App\Category;
use App\Dish;
use App\User;
use App\Recipes;

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
        $recipes = Recipes::where('status',1)->paginate(8,['*'],'page10');
        $master = User::where('role',3)->paginate(10,['*'],'page9');
    	$category = Category::where('status',1)->paginate(6,['*'],'page0');
    	$dish = Dish::where('status',1)->paginate(9,['*'],'page1');
    	$dish_start = Dish::where('id_category','2')->paginate(6,['*'],'page2');
    	$dish_breakfast = Dish::where('id_category','1')->paginate(6,['*'],'page3');
    	$dish_appetizer = Dish::where('id_category','3')->paginate(6,['*'],'page4');
    	$dish_main = Dish::where('id_category','5')->paginate(6,['*'],'page5');
    	$dish_snack = Dish::where('id_category','2')->paginate(6,['*'],'page6');
    	$dish_drink = Dish::where('id_category','6')->paginate(6,['*'],'page7');
    	$dish_salad = Dish::where('id_category','7')->paginate(6,['*'],'page8');

    	return view('page.trangchu',compact('slide','category','dish_start','dish_breakfast','dish','dish_appetizer','dish_main','dish_snack','dish_drink','dish_salad','master','recipes'));   	
    }
}
