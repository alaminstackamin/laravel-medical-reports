@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Total Patients</h5>
                <p>{{ $total_patient ?? 0 }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Total Doctors</h5>
                <p>{{ $total_doctor ?? 0 }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Total Designations</h5>
                <p>{{ $total_designation ?? 0 }}</p>
            </div>
        </div>
    </div>
</div>

<h4 class="my-5">Today Appoitment List</h4>

<div class="row">
<div class="col-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Doctor</th>
                <th>Patient</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($today_appoitments as $appoitment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $appoitment->date->format('d-m-Y H:i') }}</td>
                <td>{{ $appoitment->doctor->name ?? null }}</td>
                <td>{{ $appoitment->patient->name ?? null }}</td>
                <td>{{ $appoitment->reason }}</td>
                <td>{{ $appoitment->status }}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
</div>
@endsection
