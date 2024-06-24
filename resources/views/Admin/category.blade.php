@extends('Admin/layout')
@section('heading')
<h1>Category</h1>
<br>
<a href="manage_category"><button type="button" class="btn btn-success">Manage Category</button></a>
<br><br>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>date</th>
                        <th>type</th>
                        <th>description</th>
                        <th>status</th>
                        <th>price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2018-09-29 05:57</td>
                        <td>Mobile</td>
                        <td>iPhone X 64Gb Grey</td>
                        <td class="process">Processed</td>
                        <td>$999.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-28 01:22</td>
                        <td>Mobile</td>
                        <td>Samsung S8 Black</td>
                        <td class="process">Processed</td>
                        <td>$756.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-27 02:12</td>
                        <td>Game</td>
                        <td>Game Console Controller</td>
                        <td class="denied">Denied</td>
                        <td>$22.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-26 23:06</td>
                        <td>Mobile</td>
                        <td>iPhone X 256Gb Black</td>
                        <td class="denied">Denied</td>
                        <td>$1199.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-25 19:03</td>
                        <td>Accessories</td>
                        <td>USB 3.0 Cable</td>
                        <td class="process">Processed</td>
                        <td>$10.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-29 05:57</td>
                        <td>Accesories</td>
                        <td>Smartwatch 4.0 LTE Wifi</td>
                        <td class="denied">Denied</td>
                        <td>$199.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-24 19:10</td>
                        <td>Camera</td>
                        <td>Camera C430W 4k</td>
                        <td class="process">Processed</td>
                        <td>$699.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-22 00:43</td>
                        <td>Computer</td>
                        <td>Macbook Pro Retina 2017</td>
                        <td class="process">Processed</td>
                        <td>$10.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection