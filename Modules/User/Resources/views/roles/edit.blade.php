@extends('setting::layouts.master')

@section('title', 'Edit Role')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('style')
    <style>
        .custom-control-label {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Role <i class="bi bi-check"></i>
                                </button>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Role Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" required
                                            value="{{ $role->name }}">
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label for="permissions">
                                            Permissions <span class="text-danger">*</span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="select-all">
                                            <label class="custom-control-label" for="select-all">Give All
                                                Permissions</label>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <!-- User Management Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    User Mangement
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_user_management" name="permissions[]"
                                                                    value="access_user_management"
                                                                    {{ $role->hasPermissionTo('access_user_management') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_user_management">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_own_profile" name="permissions[]"
                                                                    value="edit_own_profile"
                                                                    {{ $role->hasPermissionTo('edit_own_profile') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_own_profile">Own Profile</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Settings -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Settings
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_settings" name="permissions[]"
                                                                    value="access_settings"
                                                                    {{ $role->hasPermissionTo('access_settings') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_settings">Access</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Contact Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Contact
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_contact" name="permissions[]"
                                                                    value="access_contact"
                                                                    {{ $role->hasPermissionTo('access_contact') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_contact">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_contact" name="permissions[]"
                                                                    value="show_contact"
                                                                    {{ $role->hasPermissionTo('show_contact') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_contact">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_contact" name="permissions[]"
                                                                    value="delete_contact"
                                                                    {{ $role->hasPermissionTo('delete_contact') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_contact">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Subscription Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Subscription
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_subscriptions" name="permissions[]"
                                                                    value="access_subscriptions"
                                                                    {{ $role->hasPermissionTo('access_subscriptions') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_subscriptions">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_subscriptions" name="permissions[]"
                                                                    value="show_subscriptions"
                                                                    {{ $role->hasPermissionTo('show_subscriptions') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_subscriptions">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_subscriptions" name="permissions[]"
                                                                    value="delete_subscriptions"
                                                                    {{ $role->hasPermissionTo('delete_subscriptions') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_subscriptions">Delete</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="send_mail" name="permissions[]"
                                                                    value="send_mail"
                                                                    {{ $role->hasPermissionTo('send_mail') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="send_mail">Send Mail</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Sliders Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Sliders
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_sliders" name="permissions[]"
                                                                    value="access_sliders"
                                                                    {{ $role->hasPermissionTo('access_sliders') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_sliders">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_sliders" name="permissions[]"
                                                                    value="show_sliders"
                                                                    {{ $role->hasPermissionTo('show_sliders') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_sliders">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_sliders" name="permissions[]"
                                                                    value="create_sliders"
                                                                    {{ $role->hasPermissionTo('create_sliders') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_sliders">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_sliders" name="permissions[]"
                                                                    value="edit_sliders"
                                                                    {{ $role->hasPermissionTo('edit_sliders') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_sliders">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_sliders" name="permissions[]"
                                                                    value="delete_sliders"
                                                                    {{ $role->hasPermissionTo('delete_sliders') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_sliders">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Packages Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Packages
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_packages" name="permissions[]"
                                                                    value="access_packages"
                                                                    {{ $role->hasPermissionTo('access_packages') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_packages">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_packages" name="permissions[]"
                                                                    value="show_packages"
                                                                    {{ $role->hasPermissionTo('show_packages') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_packages">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_packages" name="permissions[]"
                                                                    value="create_packages"
                                                                    {{ $role->hasPermissionTo('create_packages') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_packages">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_packages" name="permissions[]"
                                                                    value="edit_packages"
                                                                    {{ $role->hasPermissionTo('edit_packages') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_packages">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_packages" name="permissions[]"
                                                                    value="delete_packages"
                                                                    {{ $role->hasPermissionTo('delete_packages') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_packages">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Blogs Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Blogs
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_blogs" name="permissions[]"
                                                                    value="access_blogs"
                                                                    {{ $role->hasPermissionTo('access_blogs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_blogs">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_blogs" name="permissions[]"
                                                                    value="show_blogs"
                                                                    {{ $role->hasPermissionTo('show_blogs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_blogs">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_blogs" name="permissions[]"
                                                                    value="create_blogs"
                                                                    {{ $role->hasPermissionTo('create_blogs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_blogs">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_blogs" name="permissions[]"
                                                                    value="edit_blogs"
                                                                    {{ $role->hasPermissionTo('edit_blogs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_blogs">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_blogs" name="permissions[]"
                                                                    value="delete_blogs"
                                                                    {{ $role->hasPermissionTo('delete_blogs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_blogs">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Gallery Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Gallery
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_gallery" name="permissions[]"
                                                                    value="access_gallery"
                                                                    {{ $role->hasPermissionTo('access_gallery') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_gallery">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_gallery" name="permissions[]"
                                                                    value="show_gallery"
                                                                    {{ $role->hasPermissionTo('show_gallery') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_gallery">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_gallery" name="permissions[]"
                                                                    value="create_gallery"
                                                                    {{ $role->hasPermissionTo('create_gallery') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_gallery">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_gallery" name="permissions[]"
                                                                    value="edit_gallery"
                                                                    {{ $role->hasPermissionTo('edit_gallery') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_gallery">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_gallery" name="permissions[]"
                                                                    value="delete_gallery"
                                                                    {{ $role->hasPermissionTo('delete_gallery') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_gallery">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Company Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Company
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_company" name="permissions[]"
                                                                    value="access_company"
                                                                    {{ $role->hasPermissionTo('access_company') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_company">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_company" name="permissions[]"
                                                                    value="show_company"
                                                                    {{ $role->hasPermissionTo('show_company') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_company">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_company" name="permissions[]"
                                                                    value="create_company"
                                                                    {{ $role->hasPermissionTo('create_company') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_company">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_company" name="permissions[]"
                                                                    value="edit_company"
                                                                    {{ $role->hasPermissionTo('edit_company') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_company">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_company" name="permissions[]"
                                                                    value="delete_company"
                                                                    {{ $role->hasPermissionTo('delete_company') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_company">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Advertisements Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Advertisements
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_advertisements" name="permissions[]"
                                                                    value="access_advertisements"
                                                                    {{ $role->hasPermissionTo('access_advertisements') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_advertisements">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_advertisements" name="permissions[]"
                                                                    value="show_advertisements"
                                                                    {{ $role->hasPermissionTo('show_advertisements') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_advertisements">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_advertisements" name="permissions[]"
                                                                    value="create_advertisements"
                                                                    {{ $role->hasPermissionTo('create_advertisements') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_advertisements">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_advertisements" name="permissions[]"
                                                                    value="edit_advertisements"
                                                                    {{ $role->hasPermissionTo('edit_advertisements') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_advertisements">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_advertisements" name="permissions[]"
                                                                    value="delete_advertisements"
                                                                    {{ $role->hasPermissionTo('delete_advertisements') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_advertisements">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Teams Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Teams
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_teams" name="permissions[]"
                                                                    value="access_teams"
                                                                    {{ $role->hasPermissionTo('access_teams') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_teams">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_teams" name="permissions[]"
                                                                    value="show_teams"
                                                                    {{ $role->hasPermissionTo('show_teams') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_teams">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_teams" name="permissions[]"
                                                                    value="create_teams"
                                                                    {{ $role->hasPermissionTo('create_teams') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_teams">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_teams" name="permissions[]"
                                                                    value="edit_teams"
                                                                    {{ $role->hasPermissionTo('edit_teams') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_teams">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_teams" name="permissions[]"
                                                                    value="delete_teams"
                                                                    {{ $role->hasPermissionTo('delete_teams') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_teams">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Faqs Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Faqs
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_faqs" name="permissions[]"
                                                                    value="access_faqs"
                                                                    {{ $role->hasPermissionTo('access_faqs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_faqs">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_faqs" name="permissions[]"
                                                                    value="show_faqs"
                                                                    {{ $role->hasPermissionTo('show_faqs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_faqs">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_faqs" name="permissions[]"
                                                                    value="create_faqs"
                                                                    {{ $role->hasPermissionTo('create_faqs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_faqs">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_faqs" name="permissions[]"
                                                                    value="edit_faqs"
                                                                    {{ $role->hasPermissionTo('edit_faqs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_faqs">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_faqs" name="permissions[]"
                                                                    value="delete_faqs"
                                                                    {{ $role->hasPermissionTo('delete_faqs') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_faqs">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Testimonials Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Testimonials
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_testimonials" name="permissions[]"
                                                                    value="access_testimonials"
                                                                    {{ $role->hasPermissionTo('access_testimonials') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_testimonials">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_testimonials" name="permissions[]"
                                                                    value="show_testimonials"
                                                                    {{ $role->hasPermissionTo('show_testimonials') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_testimonials">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_testimonials" name="permissions[]"
                                                                    value="create_testimonials"
                                                                    {{ $role->hasPermissionTo('create_testimonials') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_testimonials">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_testimonials" name="permissions[]"
                                                                    value="edit_testimonials"
                                                                    {{ $role->hasPermissionTo('edit_testimonials') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_testimonials">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_testimonials" name="permissions[]"
                                                                    value="delete_testimonials"
                                                                    {{ $role->hasPermissionTo('delete_testimonials') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_testimonials">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Vacancies Permission -->
                                        <div class="col-lg-4 col-md-6 mb-3">
                                            <div class="card h-100 border-0 shadow">
                                                <div class="card-header">
                                                    Vacancy
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="access_vacancies" name="permissions[]"
                                                                    value="access_vacancies"
                                                                    {{ $role->hasPermissionTo('access_vacancies') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="access_vacancies">Access</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="show_vacancies" name="permissions[]"
                                                                    value="show_vacancies"
                                                                    {{ $role->hasPermissionTo('show_vacancies') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="show_vacancies">View</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="create_vacancies" name="permissions[]"
                                                                    value="create_vacancies"
                                                                    {{ $role->hasPermissionTo('create_vacancies') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="create_vacancies">Create</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="edit_vacancies" name="permissions[]"
                                                                    value="edit_vacancies"
                                                                    {{ $role->hasPermissionTo('edit_vacancies') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="edit_vacancies">Edit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="delete_vacancies" name="permissions[]"
                                                                    value="delete_vacancies"
                                                                    {{ $role->hasPermissionTo('delete_vacancies') ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="delete_vacancies">Delete</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#select-all').click(function() {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function() {
                    this.checked = checked;
                });
            })
        });
    </script>
@endsection
