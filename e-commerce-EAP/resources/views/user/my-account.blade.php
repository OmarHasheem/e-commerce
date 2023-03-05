<x-home-master :categories=$categories>
@section('content')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" rel="nofollow">Home</a>                    
                    <span></span> My Account
                </div>
            </div>
        </div>
        @if(session('user-updated-message'))
            <div class="alert alert-success">{{session('user-updated-message')}}</div>
        @endif
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello Rosie! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Your Orders</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($orders as $order)
                                                                <tr>
                                                                    <td>#{{$order->id}}</td>
                                                                    <td>{{$order->created_at}}</td>

                                                                    @if($order->status())
                                                                        <td>Completed</td>
                                                                    @else 
                                                                        <td>Processing</td>
                                                                    @endif
                                                                    <td>${{$order->total_price}} for {{$order->items()}} item</td>
                                                                    <td><a href="{{route('productsOfOrder', $order->id)}}" class="btn-small d-block">View</a></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card mb-3 mb-lg-0">
                                                    <div class="card-header">
                                                        <h5 class="mb-0">Billing Address</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <address>
                                                           <pre><label style="color: #F15412;" > Country: </label>{{$address->country}} </pre>
                                                           <pre><label style="color: #F15412;" > City: </label>{{$address->city}} </pre>
                                                           <pre><label style="color: #F15412;" > Region: </label>{{$address->region}} </pre>
                                                           <pre><label style="color: #F15412;" > Street: </label>{{$address->street}} </pre>
                                                           <pre><label style="color: #F15412;" > Building-Number: </label>{{$address->building_number}} </pre>
                                                           <pre><label style="color: #F15412;" > Floor: </label>{{$address->floor}} </pre>
                                                           <pre><label style="color: #F15412;" > Apartment-Number: </label>{{$address->apartment_number}} </pre>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="{{route('user.edit')}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="utype" value="{{$user->utype}}">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label>Name</label>
                                                            <input required="" class="form-control square" name="name" type="text" value="{{$user->name}}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Username</label>
                                                            <input required="" class="form-control square" name="username" type="text" value="{{$user->username}}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address</label>
                                                            <input required="" class="form-control square" name="email" type="email" value="{{$user->email}}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Phone Number</label>
                                                            <input required="" class="form-control square" name="phone_number" type="number" value="{{$user->phone_number}}"> 
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>New Password</label>
                                                            <input class="form-control square" name="password" type="password">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <form id="logout-form" method="post" action="{{route('logout')}}">
        @csrf                                               
    </form>

@endsection
</x-home-master>