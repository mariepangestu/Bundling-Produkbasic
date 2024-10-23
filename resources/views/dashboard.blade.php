@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="column">
        <!-- Approach -->
        <div class="col-xl-12 mb-3">
        <div class="card shadow mb-2">
            <div class="card-body">
                <p>Peringatan!</p>
                <p>Perhatikan Segala Jenis Bentuk Perubahan Data</p>
            </div>
        </div>
    </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Produk Basic</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 mb-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Histori Peramalan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="card shadow mb-4">
            </div>

            <div class="col-lg-12 mb-4">
                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sistem Prediksi Paket Bundling Produk Basic Menggunakan Algoritma FP-Growth</h6>
                    </div>
                    <div class="card-body">
                        <p>lorenipsum</p>
                    </div>
                </div>
            </div>  
            <div class="col-lg-12 mb-4">
                
            </div> 
        </div>
    @endsection