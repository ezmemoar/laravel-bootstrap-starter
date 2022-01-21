@extends('layouts.admin-layout')

@push('end-scripts')
<script src="{{ asset('js/admin.js') }}" defer init></script>

<script>
  let vueData = {
  isChangePassword: '{{ old('is_change_password') != '' ? old('is_change_password') : 'no' }}'
};
</script>
@endpush

@section('content')
<div v-scope="vueData" class="app-main__inner">
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
          </i>
        </div>
        <div>Edit Admin
          <div class="page-title-subheading">Edit Admin
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
            @method('PATCH')
            @bind($admin)
            <x-form-input name="name" required label="Name" />
            <x-form-input name="username" required label="Username" />
            <x-form-select name="role" required label="Role" placeholder="Select Role" :options="$roles"
              :default="$admin->getMainRole()" />
            <x-form-select name="status" required label="Status" :options="['inactive', 'active']" default="1" />
            @endbind
            <hr>
            <x-form-select name="is_change_password" label="Is Change Password?"
              :options="['no' => 'no', 'yes' => 'yes']" v-model="isChangePassword" />

            <hr>

            <template v-if="isChangePassword == 'no'">
              <x-form-input type="password" name="password" required placeholder="Enter your password to update data"
                label="Confirm Password" v-bind:required="isChangePassword == 'no'"
                v-bind:disabled="isChangePassword == 'yes'" />
            </template>

            <template v-else-if="isChangePassword == 'yes'">
              <x-form-input type="password" name="old_password" v-bind:required="isChangePassword == 'yes'"
                placeholder="Enter your old password" label="Old Password" v-bind:disabled="isChangePassword == 'no'" />
              <x-form-input type="password" name="new_password" v-bind:required="isChangePassword == 'yes'"
                placeholder="Enter your password" label="New Password" v-bind:disabled="isChangePassword == 'no'" />
              <x-form-input type="password" name="new_password_confirmation" required
                v-bind:disabled="isChangePassword == 'no'" v-bind:required="isChangePassword == 'yes'"
                placeholder="Enter again your New password" label="Enter Again Your New Password" />
            </template>

            <x-form-submit>Submit</x-form-submit>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
