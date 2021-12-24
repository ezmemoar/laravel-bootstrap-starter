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
        <div>Permission Group List
          <div class="page-title-subheading">List of All Permission Groups
          </div>
        </div>
      </div>
      <div class="page-title-actions">
        <div class="d-inline-block dropdown">
          <a href="{{ route('admin.permission-group.create') }}" type="button" aria-haspopup="true" aria-expanded="false" class="btn-shadow btn btn-info">
            <span class="btn-icon-wrapper pr-2 opacity-7">
              <i class="fa fa-pencil-alt fa-w-20"></i>
            </span>
            Create
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="main-card mb-3 card">
        <div class="card-body">
          <table class="mb-0 table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Permission Group Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($permissionGroups as $permissionGroup)
              <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $permissionGroup->name }}</td>
                <td>
                  <a href="{{ route('admin.permission-group.edit', $permissionGroup->id) }}" class="btn btn-primary">edit</a>
                  <x-form :action="route('admin.permission-group.delete', $permissionGroup->id)" class="d-inline">
                    @method('DELETE')
                    <button class="btn btn-danger">delete</button>
                  </x-form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection