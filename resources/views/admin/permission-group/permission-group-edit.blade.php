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
        <div>Edit Permission Group
          <div class="page-title-subheading">Edit Permission Group
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card main-card mb-3">
        <div class="card-body">
          <div class="card-title">Edit Permission Group</div>
          <x-form :action="route('admin.permission-group.edit.patch', $permissionGroup->id)">
            @method('PATCH')
            <x-form-input name="name" required label="Permission Name" :default="$permissionGroup->name" />
            <x-form-submit>Submit</x-form-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection