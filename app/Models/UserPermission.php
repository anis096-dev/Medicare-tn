<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    protected $fillable = ['role', 'route_name'];

    /**
     * The list of routes when authenticated
     *
     * @return void
     */
    public static function routeNameList()
    {
        return [
            'dashboard',
            'pages',
            'navigation-menus',
            'users',
            'roles',
            'user-permissions',
            'Specialties',
            'treatments',
            'sub-treatments',
            'user-experience',
            'user-education',
            'user-time-settings',
            'all-appointments',
            'e-health-appointments',
            'patient-appointments',
            'contacts-from-website',
            'treatments-prices',
            'ensure-identity',
            'register-step2',
            'user.show',
            'add-phone',
            'store-phone',
            'admin-faqs',
        ];
    }

    /**
     * Checks if the current user role has access
     *
     * @param  mixed $userRole
     * @param  mixed $routeName
     * @return void
     */
    public static function isRoleHasRightToAccess($userRole, $routeName)
    {
        try {
            $model = static::where('role', $userRole)
                ->where('route_name', $routeName)
                ->first();

            return $model ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('role', 'like', '%'.$query.'%')
            ->orwhere('route_name', 'like', '%'.$query.'%');
    }
}