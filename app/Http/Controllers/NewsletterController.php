<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate email input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            // Get user's IP address
            $visitorIP = $this->getClientIP();

            // Get user's country based on IP
            $country = $this->getCountryFromIP($visitorIP);

            // Save subscription to database
            Newsletter::create([
                'email' => $request->email,
                'country' => $country
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Subscribed successfully!',
                'country' => $country
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function getClientIP()
    {
        return request()->ip();
    }

    private function getCountryFromIP($ip)
    {
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