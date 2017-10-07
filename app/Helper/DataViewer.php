<?php
namespace App\Helper;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
trait DataViewer
{
    protected $operators=[
        'equal' => '=',
        'not_equal' => '<>',
        'less_than' => '<',
        'greater_than' => '>',
        'less_than_or_equal_to' => '<=',
        'greater_than_or_equal_to' => '>=',
        'in'=>'IN',
        'like'=>'LIKE'
    ];
    public function scopeSearchPaginateAndOrder($query)
    {
        $request = request();

        $validator= Validator::make(request()->only(
            [
                'column','direction','per_page','search_column','search_operator','search_input'
            ]),[
            'column' => 'required|apha_dash|in:'.implode(',',self::$columns),
            'direction' => 'required|in:asc,desc',
            'per_page' => 'integer|min:1',
            'search_column'=>'required|apha_dash|in:'.implode(',',self::$columns),
            'search_operator'=>'required|apha_dash|in:'.implode(',',array_keys($this->operators)),
            'search_input' => 'max:255'
            ]);


        return $query
            ->orderBy($request->column,$request->direction)
            ->where(function($query) use ($request) {
                if($request->search_input){
                    if($request->search_operator=='in'){
                        $query->whereIn($request->search_column, explode(',',$request->search_input));
                    } else if($request->search_operator == 'like'){
                        $query->where($request->search_column, 'LIKE', '%'.$request->search_input.'%');
                    }else{
                        $query->where($request->search_column, $this->operators[$request->search_operator], $request->search_input);
                    }
                }
            })
            ->paginate($request->per_page);
    }
}