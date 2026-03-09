@extends('layout.main')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-10">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold">Total Orders</h2>
                <p class="text-2xl font-bold mt-2">120</p>
            </div>

            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold">Customers</h2>
                <p class="text-2xl font-bold mt-2">80</p>
            </div>

            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold">Revenue</h2>
                <p class="text-2xl font-bold mt-2">Rp 3.200.000</p>
            </div>

        </div>

    </div>
@endsection
