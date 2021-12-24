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
        <div>Create Permission Group
          <div class="page-title-subheading">Create New Permission Group
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card main-card mb-3">
        <div class="card-body">
          <div class="card-title">Create Permission Group</div>
          <x-form :action="route('admin.permission-group.create.post')">
            <x-form-input name="name" required label="Permission Group Name" />
            <x-form-submit>Submit</x-form-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection