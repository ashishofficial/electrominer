@extends('admin.app')
@section('title')
    Dashboard
@endsection
@section('css-hooks')
    <link rel="stylesheet" href="{{ asset('backend/css/dashboard.css') }}">
@endsection
@section('content')
<div class="col-md-9 dashboard-right">
        <div class="col-md-4">
                <h3>MY DASHBOARD</h3>
                <h3 class="balance">0.000000  BTC</h3>
                <h3 class="balance"> $ 1,000.00  USD</h3>
            </div>
        <div class="col-md-3">
            <h3>ALGORITHM</h3>
            <h3 class="balance">SHA-256</h3>
        </div>
        <div class="col-md-12 mining-table">
            <table class="table table-class" >
            <thead>
                <tr>
                    <th>Coin</th>
                    <th>Mining</th>
                    <th>Speed</th>
                    <th>Limit</th>
                    <th>Reward</th>
                    <th>Rio</th>
                    <th>Balance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bitcoin</td>
                    <td width="200px">
                        <div class="progress progress2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;"></div>
                        </div></td>
                    <td>0.1088</td>
                    <td>24h</td>
                    <td>0.0864</td>
                    <td>101%</td>
                    <td>0.15345454 BTC</td>
                    <td><i class="fa fa-pencil"></i></td>
                </tr>
                <tr class="table-active">
                    <td>Bitcoin</td>
                    <td>
                        <div class="progress progress2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;">           
                            </div>
                        </div></td>
                    <td>0.1088</td>
                    <td>24h</td>
                    <td>0.0864</td>
                    <td>101%</td>
                    <td>0.15345454 BTC</td>
                    <td><i class="fa fa-pencil"></i></td>
                </tr>
                <tr>
                    <td>Bitcoin</td>
                    <td><div class="progress progress2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;">           
                            </div>
                        </div></td>
                    <td>0.1088</td>
                    <td>24h</td>
                    <td>0.0864</td>
                    <td>101%</td>
                    <td>0.15345454 BTC</td>
                    <td><i class="fa fa-pencil"></i></td>
                </tr>
                <tr>
                    <td>Bitcoin</td>
                    <td><div class="progress progress2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;">           
                            </div>
                        </div></td>
                    <td>0.1088</td>
                    <td>24h</td>
                    <td>0.0864</td>
                    <td>101%</td>
                    <td>0.15345454 BTC</td>
                    <td><i class="fa fa-pencil"></i></td>
                </tr>
            </tbody>
            </table>
            <h4 class="text-right"><a class="add_coin" href="">ADD COIN <i class="fa fa-plus"></i></a></h4>
        </div>
@endsection