<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'country'];

    /**
     * Subscribe a user to the newsletter.
     *
     * @param string $email
     * @return array
     */
    public static function subscribe($email)
    {
        // Validate email input
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email|unique:newsletters,email'
        ]);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'message' => $validator->errors()->first()
            ];
        }

        try {
            // Get user's IP address
            $visitorIP = request()->ip();

            // Get user's country based on IP
            $country = self::getCountryFromIP($visitorIP);

            // Save subscription to database
            self::create([
                'email' => $email,
                'country' => $country
            ]);

            return [
                'status' => 'success',
                'message' => 'Subscribed successfully!',
                'country' => $country
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Get country based on IP.
     *
     * @param string $ip
     * @return string
     */
    private static function getCountryFromIP($ip)
    {
        if ($ip === '127.0.0.1' || $ip === '::1') {
            $ip = '116.90.120.105'; // Replace with your actual public IP for testing
        }
        try {
            $response = Http::get("http://ip-api.com/json/{$ip}");

            if ($response->successful() && isset($response->json()['country'])) {

                return $response->json()['country'];
            }
        } catch (\Exception $e) {
            return 'Unknown';
        }

        return 'Unknown';
    }
}