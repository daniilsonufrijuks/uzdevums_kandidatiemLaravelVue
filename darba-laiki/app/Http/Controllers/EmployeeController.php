<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class EmployeeController extends Controller
{

    public function getemployees(Request $request): \Illuminate\Http\JsonResponse
    {

        $employees = Employee::select('id', 'username')->get();
        return response()->json($employees);

    }

//
//    public function show($id)
//    {
//        $employee = Employee::findOrFail($id);
//
//        $attendance = DB::table('Attendance')
//            ->select('date', DB::raw('SUM(hours_worked) as total_hours'))
//            ->where('employee_id', $id)
//            ->groupBy('date')
//            ->orderByDesc('date')
//            ->get();
//
//        return Inertia::render('Show', [
//            'employee' => $employee,
//            'attendance' => $attendance,
//        ]);
//    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $attendance = DB::table('Attendance')
            ->select('date', DB::raw('SUM(hours_worked) as total_hours'))
            ->where('employee_id', $id)
            ->groupBy('date')
            ->orderByDesc('date')
            ->get();

        return response()->json([
            'employee' => $employee,
            'attendance' => $attendance,
        ]);
    }
}
