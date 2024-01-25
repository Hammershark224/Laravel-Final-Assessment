<?php
// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21133
// Student Name: CHONG XUE LIANG
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class checkApplicationValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rules = [
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'required|string|max:255',
            
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Return a JSON response with validation errors and a 422 status code
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return $next($request);
    }
}
