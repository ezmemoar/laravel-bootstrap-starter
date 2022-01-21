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
        <div>Create Permission
          <div class="page-title-subheading">Create New Permission
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card main-card mb-3">
        <div class="card-body">
          <div class="card-title">Create Permission</div>
          <x-form :action="route('admin.permission.create.post')">
            <x-form-input name="name" required label="Permission Name" />
            <x-form-select name="group" label="Permission Group" :options="$permissionGroups">
              @slot('help')
              <div class="text-secondary" style="font-size: 13px">Permission Group intended for grouping in role permission selection</div>
              @endslot
            </x-form-select>
            <x-form-submit>Submit</x-form-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
