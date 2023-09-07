<?php

namespace App\Policies;

use App\Models\ErpUser;
use App\Models\Proveedor;
use Illuminate\Auth\Access\Response;

class ProveedorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(ErpUser $erpUser): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(ErpUser $erpUser, Proveedor $proveedor): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(ErpUser $erpUser): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(ErpUser $erpUser, Proveedor $proveedor): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(ErpUser $erpUser, Proveedor $proveedor): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(ErpUser $erpUser, Proveedor $proveedor): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(ErpUser $erpUser, Proveedor $proveedor): bool
    {
        //
    }
}
