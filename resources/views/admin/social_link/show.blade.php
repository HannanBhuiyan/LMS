@extends('admin.admin_master')
@section('title', 'Courses')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"> 
                    <a href="{{ route('social_links.index') }}">Back</a>
                </li>
            </ol>
          </nav>
        <div class="card p-3 mt-4">
            <div class="category_title my-3 d-flex justify-content-between">
               <div class="left">
                    <h3>Contact</h3>
               </div> 
            </div>
       
            <div class="table-responsive">
                <table class="table text-center table-bordered text-nowrap border-bottom" id="basic-datatable">
                
                    <tr>
                        <th scope="col">Facebook</th>
                        <td>{{  $social_link->facebook  }}</td>
                    </tr>

                    <tr>
                        <th scope="col">Twitter</th>
                        <td>{{ $social_link->twitter }}</td>
                    </tr>

                    <tr>
                        <th scope="col">Linkedin</th>
                        <td>{{  $social_link->linkedin }}</td>
                    </tr>

                    <tr>
                        <th scope="col">YouTube</th>
                        <td>{{ $social_link->youtube }}</td>
                    </tr>

                    <tr>
                        <th scope="col">Instagram</th>
                        <td>{{ $social_link->instragram }}</td>
                    </tr>

                    <tr>
                        <th scope="col">Telegram</th>
                        <td>{{ $social_link->telegram }}</td>
                    </tr> 
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
