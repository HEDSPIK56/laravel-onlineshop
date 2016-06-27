<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Validator;

class Task extends Model
{

    protected $table = 'tasks';
    protected $fillable = ['name'];
    private $errors;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected $rule_create = array(
        'name' => 'required|max:255'
    );

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 
     * @param type $data
     * @return boolean
     */
    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rule_create);

        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }

    /**
     * 
     * @return type
     */
    public function getErrors()
    {
        return $this->errors;
    }

}
