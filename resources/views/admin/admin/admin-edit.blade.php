@extends('layouts.admin-layout')

@push('start-scripts')
    <script src="{{ asset('js/admin.js') }}"></script>

    <script>
      let alpineData = {
        test: "test"
      };
    </script>
@endpush

@section('content')
<div x-data="{ test: 'test' }" class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
          </i>
        </div>
        <div>Edit Admin
          <div class="page-title-subheading">Edit Admin <span x-text="test"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card main-card mb-3">
        <div class="card-body">
          <div class="card-title">Edit Admin</div>
          <x-form :action="route('admin.admin.edit.patch', $admin->id)">
            @bind($admin)
            <x-form-input name="name" required label="Name" />
            <x-form-input name="username" required label="Username" />
            <x-form-select name="role" required label="Role" placeholder="Select Role" :options="$roles" :default="$admin->getMainRole()" />
            <x-form-select name="status" required label="Status" :options="['inactive', 'active']" default="1" />
            @endbind
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