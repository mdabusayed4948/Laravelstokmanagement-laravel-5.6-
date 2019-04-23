{{-- \resources\views\errors\401.blade.php --}}
@extends('layouts.backend.app')

@section('content')

 <section class="content-header">
      <h1>
        401 Error Page
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">401 error</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="error-page">
        <h2 class="headline text-red">401</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

          <p>
            Hello User you have not permitted in this section, you may <a href="{{ route('dashboard') }}">return to dashboard</a>.
          </p>

          
        </div>
      </div>
      <!-- /.error-page -->

    </section>

   

@endsection
