<?php

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * @Target this file to make function to help for all system
 * @note can call it in all system
 */
/**
 * user login
 */
function user()
{
    if (Auth::guard('web')->check()) {
        return Auth::guard('web')->user();
    } elseif (Auth::guard('admins')->check()) {
        return Auth::guard('admins')->user();
    }
}

function checkView($view)
{
    return view()->exists($view) ? $view : '500';
}

/**
 * to execution time for web
 */
function executionTime()
{
    ini_set('max_execution_time', 120000);
    ini_set('post_max_size', 120000);
    ini_set('upload_max_filesize', 100000);
}

function permissionShow($name): int
{
    return \Illuminate\Support\Facades\DB::table('permissions')
        ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
        ->where('permission_role.role_id', user()->role->role_id ?? 0)
        ->where('permissions.name', $name)
        ->count();
}


if (!function_exists('can')) {
    function can($permission): bool
    {
        if (!Auth::guard('web')->user()->can($permission)) {
            abort(401);
        }
        return true;
    }
}


if (!function_exists('prefixHoverShow')) {
    function prefixHoverShow($prefixName): string
    {
        $routeName = explode(".", request()->route()->getName());
        return $routeName[1] == $prefixName ? 'hover show' : '';
    }
}


if (!function_exists('prefixShow')) {
    function prefixShow($prefixName): string
    {
        return request()->routeIs($prefixName) ? 'active' : '';
    }
}

if (!function_exists('setActiveLink')) {
    function prefixActive($prefixName): string
    {
        return (request()->segment(2) == 'dashboard' && request()->segment(3) == $prefixName) ? 'active' : '';
    }
}

if (!function_exists('settings')) {
    function settings()
    {

        return Cache::remember('settings', 99999999, function () {
            return DB::table('settings')->pluck('value_' . app()->getLocale(), 'key')->toArray();
        });
    }
}

if (!function_exists('user')) {
    function user()
    {
        return User::findOrFail(auth()->user()->id);
    }
}

if (!function_exists('shortenNumber')) {
    function shortenNumber($number)
    {
        $suffixes = ['', 'k', 'M', 'B', 'T']; // Suffixes for thousands, millions, billions, etc.
        $suffixIndex = 0;

        while ($number >= 1000) {
            $number /= 1000;
            $suffixIndex++;
        }

        // Format the number with up to 2 decimal places
        $formattedNumber = number_format($number, 2);

        // Remove trailing zeros after the decimal point
        $formattedNumber = rtrim($formattedNumber, '0');
        $formattedNumber = rtrim($formattedNumber, '.');

        $shortened = $formattedNumber . $suffixes[$suffixIndex];
        return $shortened;
    }


    function sendNotification($title, $body, $token = null, $event = null)
    {
        $firebaseToken = [$token];
        if (!$token) {
            $firebaseToken = Employee::whereNotNull('device_token')->get()->pluck('device_token');
        }


        $SERVER_API_KEY = 'AIzaSyDznKCzwITPbiCK4oO6zFFjOchmfpqsaGg';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
                "event_id" => $event
            ],
            "data" => [
                "title" => $title,
                "body" => $body,
                "event_id" => $event,
                "click_action" => "FISH_ACTION"

            ],
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];



        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);


    }


}

if (!function_exists('contactUsStatus')) {
    function contactUsStatus($status)
    {

        $className = 'notAnswer';
        
        if($status == 'solved'){
            $className = 'finished';
        }
        return $className;
    }
}
