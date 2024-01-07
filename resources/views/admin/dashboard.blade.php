@extends('admin.app')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Dashboard</a></li>
    </ul>

    <div class="row-fluid">
        <div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
            <div class="number">{{$totalUser}}</div>
            <div class="title">Total Users</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>
        <div class="span3 statbox green" onTablet="span6" onDesktop="span3">
            <div class="number">{{$totalPost}}</div>
            <div class="title">Total Post</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>
        <div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
            <div class="number">{{$totalPage}}</div>
            <div class="title">Total Page</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>
        <div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
            <div class="number">{{$totalGroup}}<i class="icon-arrow-down"></i></div>
            <div class="title">Total Group</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>
    </div>
@endsection
