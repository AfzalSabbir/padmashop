<?php
namespace App\Helpers;

use DB;

class QueryHelper
{
  /**
   * Eloquent Model query start from here
   */


  /**
  * Simple paginate data retrieve from table using model
  */
  public static function paginateRead($model, $items, $conditions = array(), $orderColumn='id', $order='desc', $status=1)
  {
    $model = 'App\Models\\'.$model;
    $result = $model::orderBy($orderColumn, $order)->where('status', $status);

    foreach($conditions as $column => $condition){
      $result = $result->where($column, $condition);
    }

    $result = $result->paginate($items);
    return $result;
  }
  /**
  * Simple paginate and Search data retrieve from table using model
  */
  public static function simplePaginateSearch($model, $conditions = array(), $items, $orderColumn, $order='asc', $status=1)
  {

    $model = 'App\Models\\'.$model;
    $result = $model::orderBy($orderColumn, $order)->where('status', $status);

    foreach($conditions as $column => $condition){
      $result = $result->where($column, 'LIKE', '%'.$condition.'%');
    }

    //dd($result);
    $result = $result->paginate($items);
    return $result;
  }

  /**
  * Simple all data retrieve from table using model
  */
  public static function simpleRead($model, $orderColumn='id', $order='desc', $status=1)
  {
    $model = 'App\Models\\'.$model;
    $results = $model::orderBy($orderColumn, $order)->where('status', $status)->get();
    return $results;
  }


  /**
  * Retrieve all data from table through multiple where condition
  */
  public static function complexRead($model, $conditions = array(), $status=1, $orderBy="id", $sort="desc")
  {
    $model = 'App\Models\\'.$model;
    $model = $model::orderBy($orderBy, $sort);
    $model = $model->where('status', $status);

    foreach($conditions as $column => $condition){
      $model = $model->where($column, $condition);
    }

    $results = $model->get();

    return $results;
  }


    /**
     * Retrieve all data from table through multiple where condition
     */
    public static function allReadFromModel($model, $conditions = array(), $orderBy="id", $sort="desc")
    {
      $model = 'App\Models\\'.$model;
      $model = $model::orderBy($orderBy, $sort);

      foreach($conditions as $column => $condition){
        $model = $model->where($column, $condition);
      }

      $results = $model->get();

      return $results;
    }

  /**
  * Retrieve single row data from table using slug attribute
  */
  public static function simpleSingleRead($model, $condition, $status=1)
  {
    $model = 'App\Models\\'.$model;
    
    $result = $model::where('status', $status)
    ->where('slug', $condition)
    ->first();
    
    return $result;
  }

  /**
  * Retrieve single row data from table using multiple where conditon
  */
  public static function complexSingleRead($model, $conditions = array(), $status=1)
  {
    $model = 'App\Models\\'.$model;
    $model = $model::where('status', $status);

    foreach($conditions as $column => $condition){
      $model = $model->where($column, $condition);
    }

    $result = $model->first();

    return $result;
  }


  public static function singleModelRead($model, $conditions = array(), $status=0)
  {
    $model = 'App\Models\\'.$model;

    foreach($conditions as $column => $condition){
      $model = $model->where($column, $condition);
    }

    $result = $model->first();

    return $result;
  }

  /**
  * Insert into table using model and return the inserted id of the row
  */
  public static function simpleInsert($model, $data = array())
  {
    $model = 'App\Models\\'.$model;
    $result = $model::create($data);
    return $result->id;
  }

  /**
  * Retrieve single row through multiple condition and update the row of table
  */
  public static function simpleUpdate($model, $data = array(), $conditions = array(), $status=1)
  {
    $model = 'App\Models\\'.$model;
    $model = $model::where('status', $status);

    foreach($conditions as $column => $condition){
      $model = $model->where($column, $condition);
    }

    $model->update($data);
  }
  
  
  /**
   * Retrieve last inserted id using eloquent model
  */
  public static function getModelLastInsert($model, $column, $status=1)
  {
    $model = 'App\Models\\'.$model;
    $result = $model::orderBy($column, 'desc')->where('status', $status)->first();
    return $result;
  }
  
  
  /**
   * Retrieve with And-or consition using eloquent model 
  */
  public static function getModelAllResults($model, $wheres=array(), $orWheres=array(), $status=1)
  {
    $model = 'App\Models\\'.$model;
    $results = $model::where('status', $status);
    
    foreach($wheres as $where_column => $where){
      $results = $results->where($where_column, $where);
    }
    
    foreach($orWheres as $or_where_column => $or_where){
      $results = $results->orWhere($or_where_column, $or_where);
    }
    
    $results = $results->get();
    
    return $results;
  }
  
  
  /**
   * Retrieve single row with And-or consition using eloquent model 
  */
  public static function getModelSingleResults($model, $wheres=array(), $orWheres=array(), $status=1)
  {
    $model = 'App\Models\\'.$model;
    $results = $model::where('status', $status);
    
    foreach($wheres as $where_column => $where){
      $results = $results->where($where_column, $where);
    }
    
    foreach($orWheres as $or_where_column => $or_where){
      $results = $results->orWhere($or_where_column, $or_where);
    }
    
    $results = $results->first();
    
    return $results;
  }
  
  
  /**
   * Read distinct value of a column using eloquent model
  */
  public static function modelDistinct($model, $column, $conditions=array(), $status=1)
  {
    $model = 'App\Models\\'.$model;
    $results = $model::select($column)->where('status', $status);
    
    foreach($conditions as $columns => $condition){
      $results = $results->where($columns, $condition);
    }
    
    $results = $results->distinct()->get();
    
    return $results;
  }


  /**
  * Retrieve single row through multiple condition and delete the row of table
  */
  public static function delete($model, $conditions = array())
  {
    $model = 'App\Models\\'.$model;

    foreach($conditions as $column => $condition){
      $model = $model::where($column, $condition);
    }

    $model->delete();
  }


    /**
     * Retrieve single row through multiple condition and set status = 0 of the row of table
     */
    public static function remove($model, $conditions = array())
    {
      $model = 'App\Models\\'.$model;

      foreach($conditions as $column => $condition){
        $model = $model::where($column, $condition);
      }

      $model->update(['status' => 0]);
    }

  /**
   * Eloquent Model query end here
   */



  /**
   * DB query start here
   */

  /**
   * Retrieve all data from single table using db query with multiple condiiton
   */
  public static function dbSingleTable($table, $conditions = array(), $orderColumn='id', $order='desc', $status=1)
  {
    $results = DB::table($table)->where('status', $status);
    
    foreach ($conditions as $column => $condition) {
      $results->where($column, $condition);
    }

    return $results->get();
  }
  
  /**
   * Insert into table and return id of the inserted row using db query
  */
  public static function dbInsert($table, $data)
  {
    $result = DB::table($table)->insertGetId($data);
    return $result;
  }
  
  
  /**
   * Update row of the table using db query
  */
  public static function dbUpdate($table, $data, $conditions=array(), $status=1)
  {
    $result = DB::table($table)->where('status', $status);
    
    foreach($conditions as $column => $condition){
      $result = $result->where($column, $condition);
    }
    $result = $result->update($data);
    
    return $result;
  }


    /**
     * Retrieve single row through multiple condition and set status = 0 of the row of table
     */
    public static function dbRemove($table, $conditions = array(), $status = 1)
    {
      $result = DB::table($table)->where('status', $status);

      foreach($conditions as $column => $condition){
        $result = $result->where($column, $condition);
      }

      $result->update(['status' => 9]);

      return $result;
    }


  /**
  * Delete using db query
  */
  public static function dbDelete($table, $conditions = array(), $status=1)
  {
    $result = DB::table($table)->where('status', $status);
    
    foreach($conditions as $column => $condition){
      $result = $result->where($column, $condition);
    }
    $result = $result->delete();
    
    return $result;
  }
  
  
  /**
   * Retrieve from multiple table using db query
  */
  public static function multipleRead($table, $joinTables=array(), $joinColumns=array(), $conditions=array(), $status=1)
  {
    $results = DB::table($table)->where('status', $status);
    
    foreach($joinTables as $table_key => $join_table){
      $results = $results->join($join_table, $join_table.'.'.'id', '=', $table.'.'.$joinColumns[$table_key]);
    }
    
    foreach($conditions as $column => $condition){
      $results = $results->where($column, $condition);
    }
    
    $results = $results->get();
    
    return $results;
  }
  
  
  /**
   * Retrieve last inserted id using db query
  */
  public static function getLastInsert($table, $column, $status=1)
  {
    $result = DB::table($table)->where('status', $status)->orderBy($column, 'desc')->first();
    return $result;
  }
  
  
  /**
   * Retrieve all data with And-or consition using db query
  */
  public static function getDbAllResults($table, $wheres=array(), $orWheres=array(), $status=1)
  {
    $results = DB::table($table)->where('status', $status);
    
    foreach($wheres as $where_column => $where){
      $results = $results->where($where_column, $where);
    }
    
    foreach($orWheres as $or_where_column => $or_where){
      $results = $results->orWhere($or_where_column, $or_where);
    }
    
    $results = $results->get();
    
    return $results;
  }
  
  
  /**
   * Retrieve single row with And-or consition using db query 
  */
  public static function getDbSingleResults($table, $wheres=array(), $orWheres=array(), $status=1)
  {
    $results = DB::table($table);
    
    foreach($wheres as $where_column => $where){
      $results = $results->where($where_column, $where);
    }
    
    foreach($orWheres as $or_where_column => $or_where){
      $results = $results->orWhere($or_where_column, $or_where);
    }
    
    $results = $results->first();
    
    return $results;
  }
  
  
  /**
   * Read distinct value of a column using db query
  */
  public static function dbDistinct($table, $column, $conditions=array(), $status=1)
  {
    // $results = DB::table($table)->select($column)->where('status', $status);
    $results = DB::table($table)->select($column)->where('status', $status);
    
    foreach($conditions as $columns => $condition){
      $results = $results->where($columns, $condition);
    }
    
    $results = $results->groupBy($column)->get();
    
    return $results;
  }

   /**
    * DB query end here
    */

   public static function loginInfo($model, $data)
   {
    $model = 'App\Models\\'.$model;
    $result = $model::create($data);
  }
}
