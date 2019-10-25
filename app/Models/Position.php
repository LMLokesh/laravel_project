<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Position extends Model  {



    /**
     * The database table used by the model.
     *
     * @var string
     */
    use SoftDeletes;
    protected $table = 'position';
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'id', 'orgId', 'name', 'createdBy', 'created_at', 'updatedBy', 'updated_at', 'deletedBy', 'deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * @Function name : selectFromPosition
     * @Purpose : Select from Position data based on where array
     * @Added by : Sathish
     * @Added Date : Jul 13, 2018
     */
    public static function selectFromPosition($whereArray) {
        $query = Position::where($whereArray);
        return $query;
    }

    /**
     * @Function name : updatePosition
     * @Purpose : Update Position data based on where array
     * @Added by : Sathish
     * @Added Date : Jul 13, 2018
     */
    public static function updatePosition($update_details, $whereArray) {
        Position::where($whereArray)->update($update_details);
    }

    /**
     * @Function name : deletePosition
     * @Purpose : delete Position data based on  where array
     * @Added by : Sathish
     * @Added Date : Jul 13, 2018
     */
    public static function deletePosition($whereArray) {
        Position::where($whereArray)->delete();
    }
     
    
    /**
    * @Function name : crudPosition
    * @Purpose : crud account heads based on  array
    * @Added by : Sathish
    * @Added Date : Nov 07, 2018
    */
    public static function crudPosition($whereArray=null,$whereInArray=null,$whereNotInArray=null,$whereNotNullArray=null,$whereNullArray=null,$update_details=null,$delete=null,$select=null) {
        $query = Position::query();
        if($whereArray){
            $query->where($whereArray);
        }
        if($whereInArray){
            foreach($whereInArray as $key=>$value){
                $whereInFiltered = array_filter($value);
                $query->whereIn($key,$whereInFiltered);
            }
        }
        if($whereNotInArray){
            foreach($whereNotInArray as $key=>$value){
                $whereNotInFiltered = array_filter($value);
                $query->whereNotIn($key,$whereNotInFiltered);
            }
        }
        if($whereNotNullArray){
            foreach($whereNotNullArray as $value){
                $query->whereNotNull($value);
            }            
        }
        if($whereNullArray){
            foreach($whereNullArray as $value){
                $query->whereNull($value);
            }            
        }
        
        if($update_details){
            $query->update($update_details);
        }elseif($delete){
            $query->delete();
        }elseif($select){
            return $query;
        }
    }

    /**
    * @Function name : selectPositionDetail
    * @Purpose : crud account heads based on  array
    * @Added by : Sathish
    * @Added Date : Nov 07, 2018
    */
    public static function selectPositionDetail($whereArray=null,$whereInArray=null,$whereNotInArray=null,$whereNotNullArray=null,$whereNullArray=null,$data=null) {
        $query = Position::select('position.id','position.orgId', 'position.name');

        if($whereArray){
            $query->where($whereArray);
        }
        if($whereInArray){
            foreach($whereInArray as $key=>$value){
                $whereInFiltered = array_filter($value);
                $query->whereIn($key,$whereInFiltered);
            }
        }
        if($whereNotInArray){
            foreach($whereNotInArray as $key=>$value){
                $whereNotInFiltered = array_filter($value);
                $query->whereNotIn($key,$whereNotInFiltered);
            }
        }
        if($whereNotNullArray){
            foreach($whereNotNullArray as $value){
                $query->whereNotNull($value);
            }
        }
        if($whereNullArray){
            foreach($whereNullArray as $value){
                $query->whereNull($value);
            }
        }
 
        return $query;
    }
}