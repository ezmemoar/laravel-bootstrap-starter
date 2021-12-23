@extends('layouts.admin-layout')

@section('content')
<div class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
          </i>
        </div>
        <div>Create Admin
          <div class="page-title-subheading">Create new Admin
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card main-card mb-3">
        <div class="card-body">
          <div class="card-title">Create Admin</div>
          <x-form :action="route('admin.admin.create.post')">
            <x-form-input name="name" required label="Name" />
            <x-form-input name="username" required label="Username" />
            <x-form-select name="role" required label="Role" placeholder="Select Role" :options="$roles" />
            <x-form-select name="status" required label="Status" :options="['inactive', 'active']" default="1" />
            <hr>
            <x-form-input type="password" name="password" required label="Password" />
            <x-form-input type="password" name="password_confirmation" required label="Enter Again Your Password" />
            <x-form-submit>Submit</x-form-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection