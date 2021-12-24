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
        <div>Update Role
          <div class="page-title-subheading">Update Role
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card main-card mb-3">
        <div class="card-body">
          <div class="card-title">Edit Role</div>
          <x-form :action="route('admin.role.edit.patch', $role->id)">
            @method('PATCH')
            <x-form-input name="name" required label="Role Name" :default="$role->name" />
            <hr>
            <x-form-label label="Permission" class="font-weight-bold" />
            @forelse ($permissions as $key => $permission)
            @if (count($permission) > 0)
            <div class="mt-3">
              <x-form-label :label="$key"></x-form-label>
              @foreach ($permission as $item)
                  <x-form-checkbox name="permissions[]" :label="$item->name" :value="$item->name" :checked="in_array($item->name, $rolePermissions)" />
              @endforeach
            </div>
            @endif
            @empty
            <div class="text-secondary">No Permission Exist</div>
            @endforelse
            <br>
            <x-form-submit>Submit</x-form-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection