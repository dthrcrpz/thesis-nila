@extends('layouts.master')

@section ('content')
        <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Dashboard
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $thesesCount }}</h3>
                        <p>Total Theses</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars    "></i>
                    </div>
                    <a href="/theses" class="small-box-footer">See All <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @if (auth()->user()->role == 0)
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $usersCount }}</h3>
                        <p>Registered Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/users" class="small-box-footer">See All <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            @endif
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection