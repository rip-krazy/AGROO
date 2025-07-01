<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Data dummy, nanti bisa diganti dengan data dari database
        $data = [
            'totalUsers' => 24,
            'adminCount' => 5,
            'staffCount' => 19,
            'totalItems' => 156,
            'categoryCount' => 12,
            'totalRooms' => 85,
            'roomTypes' => 4,
            'recentActivities' => [
                [
                    'icon' => 'fas fa-user-plus',
                    'bg' => 'bg-blue-100',
                    'color' => 'text-blue-600',
                    'message' => 'Admin menambahkan pengguna baru',
                    'time' => '10 menit yang lalu',
                ],
                [
                    'icon' => 'fas fa-box',
                    'bg' => 'bg-green-100',
                    'color' => 'text-green-600',
                    'message' => 'Stok handuk diperbarui (120 → 95)',
                    'time' => '1 jam yang lalu',
                ],
                [
                    'icon' => 'fas fa-bell',
                    'bg' => 'bg-yellow-100',
                    'color' => 'text-yellow-600',
                    'message' => 'Peringatan: Stok sabun hampir habis',
                    'time' => '3 jam yang lalu',
                ],
            ]
        ];

        return view('admin.dashboard', $data);
    }
}

