<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Project extends Model
{
    use HasFactory;
    
    // All fields fillable
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Project::class);
    }

     /**
    * Search itens
    */
    public static function search($ids = NULL,  $search = '', $filterStatus = '' , $itemsPerPage = 10){
        
        dump($filterStatus);
        dump($search);

        // Filters list
        $list = Project::where("owner", "=", Auth::user()->id);


        // Filter by search terms
		if (!empty($search)) {
			$list = $list->where(function ($query) use ($search) {
				$query->where("name", "LIKE", "%" . $search . "%")
						->orWhere("id", "LIKE", "%" . $search . "%")
						->orWhere("description", "LIKE", "%" . $search . "%");
			});
		}

        //Filter by status
		if (!empty($filterStatus)) {
			$list = $list->where('status', $filterStatus);
			
		}

        // Filter by id
        if(count($ids) > 0){
            $list = $list->whereIn('id', $ids);
        }

        // Order
        $list = $list->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")->orderBy("end_date", 'ASC');
            
        // Paginate
        $list = $list->paginate($itemsPerPage);

        // Returns items
        return $list;
       
    }
}
