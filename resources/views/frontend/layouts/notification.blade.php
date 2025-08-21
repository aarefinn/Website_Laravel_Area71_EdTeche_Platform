@if(session('success'))
    <div class="alert alert-success alert-dismissable fade show text-center" style="margin: 10px; padding: 15px; border-radius: 5px; background-color: #d4edda; border: 1px solid #c3e6cb; color: #155724;">
        <button class="close" data-dismiss="alert" aria-label="Close" style="float: right; font-size: 20px; font-weight: bold; background: none; border: none; cursor: pointer;">×</button>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissable fade show text-center" style="margin: 10px; padding: 15px; border-radius: 5px; background-color: #f8d7da; border: 1px solid #f5c6cb; color: #721c24;">
        <button class="close" data-dismiss="alert" aria-label="Close" style="float: right; font-size: 20px; font-weight: bold; background: none; border: none; cursor: pointer;">×</button>
        {{session('error')}}
    </div>
@endif