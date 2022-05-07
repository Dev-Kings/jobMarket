<?php 
namespace App\Models;

class Job{
    public static function all(){
        return [
            [
                'id' => 1,
                'title' => 'First Job',
                'description' => 'This is a first job.'
            ],
            [
                'id' => 2,
                'title' => 'Second Job',
                'description' => 'This is a second job.'
            ]
        ];
    }

    public static function find($id){
        $jobs = self::all();
        
        foreach($jobs as $job){
            if($job['id'] == $id){
                return $job;
            }
        }
    }
}