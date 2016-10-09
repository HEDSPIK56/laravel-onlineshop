<?php

/**
 * If you are listening for many events on a given model, 
 * you may use observers to group all of your listeners into a single class. 
 * Observers classes have method names which reflect the Eloquent events you wish to listen for. 
 * Each of these methods receives the model as their only argument. 
 * Laravel does not include a default directory for observers, 
 * so you may create any directory you like to house your observer classes:
 * https://laravel.com/docs/5.3/eloquent
 */

namespace App\Observers;
use App\Category;
use Illuminate\Support\Facades\Auth;

/**
 * Description of AdminCategoryObserver
 *
 * @author nthanh
 */
class AdminCategoryObserver
{
    /**
     * Listen to the User creating event
     * @param Category $cat
     * @return void
     */
    public function creating(Category $cat){
        $cat->created_by = Auth::user()->profile->getFullName();
    }
}
