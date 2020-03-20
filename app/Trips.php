<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * @property \Carbon\Carbon $departure_date
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property array|null|string country_name
 * @property array|null|string user_id
 * @property \Carbon\Carbon $deleted_at
 */
class Trips extends Model
{
    use SoftDeletes;

    protected $table='trips';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'country_name', 'departure_date',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'departure_date' => 'date',
    ];

    public function getDepartureDate()
    {
        $temp = $this->departure_date;
        if( ! $temp instanceof Carbon){
            $temp = Carbon::parse($temp);
        }
        return $temp->format('Y/m/d');
    }


    public static function getUserIncomingTrips( $userId, int $limit=0){
         $builder = self::select('id','departure_date','country_name')
            ->where('user_id', $userId)
            ->where('departure_date' , '>=', NOW())
            ->orderBy('departure_date', 'desc')
         ;

         if(!empty($limit)){
             $builder->take($limit);
         }

         return $builder->get();
    }

    /**
     * @param int $userId
     * @param int $tripId
     * @param int $number_day_cancel_limit
     * @return bool
     */
    public static function deleteIsAllowed($userId, $tripId, $number_day_cancel_limit){
        return self::
            where('id',  $tripId)
            ->where('user_id',  $userId)
            ->where('departure_date' , '>=', Carbon::now()->addDays($number_day_cancel_limit)->format('Y-m-d H:i:s'))
            ->exists()
            ;
    }

    /**
     * @desc only the closer trip for each user
     * @return array
     */
    public static function getUsersIncomingTrips(){
        $sql = '
                SELECT 	    t.id as tripId,
                            t.country_name,
                            t.departure_date,
                            u.name as userName,
                            date(u.created_at) as userRegistrationDate,
                            (
                              SELECT COUNT(*) 
                              FROM trips
                              WHERE  trips.user_id=u.id
                              GROUP BY trips.user_id
                            ) as totalTrips
                FROM users AS u
                JOIN (
                        SELECT sub.*
                        FROM (
                            SELECT tt.*
                            FROM trips AS tt
                            WHERE tt.deleted_at IS NULL
                                AND
                                tt.departure_date > CURRENT_DATE
                            ORDER BY tt.departure_date ASC
                        ) sub
                        GROUP BY sub.user_id
                ) t ON  t.user_id=u.id
                WHERE 1
                ORDER BY t.departure_date ASC        
        ';

        return DB::select($sql);

    }

    /**
     * @return array
     */
    public static function getUpcomingUsersTrips(){
        return DB::table('trips')
            ->join('users', 'users.id', '=', 'trips.user_id')
            ->select('trips.*', 'users.name as userName')
            ->where('trips.departure_date' , '>=', NOW())
            ->whereNull('trips.deleted_at')
            ->orderBy('trips.departure_date', 'desc')
            ->get()
        ;
    }
}
